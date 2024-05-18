<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];
?>
<html>
<head><title>Unravelling Thoughts</title>
	<link rel="stylesheet" href="styleErr1.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">

</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER
	 $sender_name=$name;
	 $receiver_name = $_GET['username'];
	 
	 
	 $conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	 $message= $conn -> real_escape_string(trim($_GET['message']));
	
if(isset($_GET['messageB']))
{
	if(empty($message) && empty($receiver_name))
	{
		echo "<h2>ERROR</h2>";
			echo "&emsp;<b>Name and message are required.</b> <br />";
	}			 
	else if(empty($receiver_name))
		{
			echo "<h2>ERROR</h2>";
			echo "&emsp;<b>Name is required.</b> <br />";

		}
	else if(empty($message))
	{
		echo "<h2>ERROR</h2>";
			echo "&emsp;<b>Message is required.</b> <br />";
	}
	else if($name==$receiver_name)
	{
		echo "<h2>ERROR</h2>";
			echo "&emsp;<b>Please select a valid user</b> <br />";
	}
				  
	else if($receiver_name && $message)
		{
			$no=1;
			
			$block=2;
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql="SELECT * FROM users WHERE name='$name' ";
			$result=$conn->query($sql);
			$teach=0;
			while($row=$result->fetch_assoc())
			{
				$teach=$row['teacher'];
				break;
			}
			if($teach==0)
			{
				//check if student then this sql
				$sql ="SELECT * FROM users WHERE name='$receiver_name' COLLATE Latin1_General_CS
				AND name!='$name' AND (stuvol='$no' OR teacher='$no') ";
			}
			else
			{
				//teacher, then select all names
				$sql ="SELECT * FROM users WHERE name='$receiver_name' COLLATE Latin1_General_CS
				AND name!='$name'";
			}
			
			
			
			
			
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			
			if ($count==0) 
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>User does not exist</b> <br />";
				
			}
			
			if($count==1)
			{
				$nowchk=0;
				while($row=$result->fetch_assoc())
				{
					$nowchk=$row["numchk"];
				
				}
				$sender_name=$_SESSION['name'];
				date_default_timezone_set("Asia/Muscat");
				$date=date("Y-m-d H:i:s");
				$display=date("h:i a");
				$conn2 = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				$conn2->set_charset('utf8mb4');
				$sql2="INSERT INTO messages(sender_name, receiver_name, message_text, date_time) VALUES('$sender_name','$receiver_name', '$message','$date')";			
				$result2 = $conn2->query($sql2);
			
				header("location: dashboard.php?user=$receiver_name");
						
				$nowchk+=1;
				$conn3 = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				$sql3="UPDATE users SET numchk='$nowchk' WHERE name='$receiver_name'";
				$result3=$conn3->query($sql3);
				
				
			$sql ="SELECT * FROM users WHERE name='$receiver_name' COLLATE Latin1_General_CS
			AND name!='$name' AND teacher='$no'";
			$result = $conn->query($sql);
			$teach=0;
			$email="";
			while($row=$result->fetch_assoc())
			{
				$teach=$row["teacher"];
				$email=$row["email"];
			}
			if($teach==$no)
			{
				
				//sending email
				require_once('PHPMailer/PHPMailerAutoload.php');
				$mail= new PHPMailer();
				$mail->isSMTP();
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='ssl';
				$mail->Host= 'smtp.gmail.com';
				$mail->Port='465';
				$mail->isHTML();
				$mail->Username='unravellingthoughtsgma@gmail.com';
				$mail->Password='unravellingthoughts2020';
				$mail->SetFrom('unravellingthoughtsgma@gmail');
				$mail->Subject='Unravelling Thoughts - New Message';
				$mail->Body= '<b>'.$name.'</h> is trying to reach you!';
				$mail->AddAddress($email);
			
				$mail->Send();
				
				
				
			}
			if($count>0) 
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>Undefined Error. Try another user.</b> <br />";
			}
			
			
			
			
			}
		} 	
	}
	else {
		$receiver_name=$_GET['user'];
		header("location: dashboard.php?user=$receiver_name");
	}
$conn->close();
?>
<br/>
<div class="links">
<p><a href="dashboard.php?user=">BACK</a> 