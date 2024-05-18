<?php
session_start();
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
	if(isset($_GET['cancel'])=="No")
	{
		$receiver_name =$_GET['user'];
		header("location: dashboard.php?user=$receiver_name");
	}
	else if(isset($_GET['unblock'])=="Yes" && isset($_GET['user']))
	{		
			$sender_name=$_SESSION['name'];
			$receiver_name =$_GET['user'];
			$num=1;
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql2= "UPDATE users
				   SET blocked='$num'
				   WHERE name='$receiver_name'";
			$result2 = $conn->query($sql2);
				
			
				//sending email
				//$email1="diyabansal2002@gmail.com";
				$email1="kshama.l_mhs@gemsedu.com";
				$email2="annika.b1_mhs@gemsedu.com";
				$email3="maria.a_mhs@gemsedu.com";
				$email4="prabha.h1_mhs@gemsedu.com";
				$email5="apoorva.s1_mhs@gemsedu.com";
		
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
					$mail->SetFrom('unravellingthoughtsgma@gmail.com');
					$mail->Subject='Unravelling Thoughts - User Unblocked';
					$mail->Body= '<b>'.$receiver_name.'</b> was unblocked by <b>'.$name.'</b>';
					
					$mail->AddAddress($email1);
					$mail->AddAddress($email2);
					$mail->AddAddress($email3);
					$mail->AddAddress($email4);
					$mail->AddAddress($email5);
			
					$mail->Send();
					header("location: dashboard.php?user=$receiver_name");
			
			
	}
	else if(isset($_GET['send'])=="Yes" && isset($_GET['user']))
	{		
			$sender_name=$_SESSION['name'];
			$receiver_name =$_GET['user'];
			$num=0;
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql= "SELECT * FROM users WHERE name='$receiver_name'";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				$num=1+$row['blocked'];
			}
			$sql2= "UPDATE users
				   SET blocked='$num'
				   WHERE name='$receiver_name'";
			$result2 = $conn->query($sql2);
				
			if($num==2)
			{
				//sending email
				//$email1="diyabansal2002@gmail.com";
				$email1="kshama.l_mhs@gemsedu.com";
				$email2="annika.b1_mhs@gemsedu.com";
				$email3="maria.a_mhs@gemsedu.com";
				$email4="prabha.h1_mhs@gemsedu.com";
				$email5="apoorva.s1_mhs@gemsedu.com";
		
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
					$mail->SetFrom('unravellingthoughtsgma@gmail.com');
					$mail->Subject='Unravelling Thoughts - User Blocked';
					$mail->Body= '<b>'.$receiver_name.'</b> was blocked by <b>'.$name.'</b>';
				
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
			
					$mail->Send();
					header("location: dashboard.php?user=$receiver_name");
			}
			else if($num==1)
			{
				//sending email
				//$email1="diyabansal2002@gmail.com";
				
					$email1="kshama.l_mhs@gemsedu.com";
		$email2="annika.b1_mhs@gemsedu.com";
		$email3="maria.a_mhs@gemsedu.com";
		$email4="prabha.h1_mhs@gemsedu.com";
		$email5="apoorva.s1_mhs@gemsedu.com";*/
		
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
					$mail->SetFrom('unravellingthoughtsgma@gmail.com');
					$mail->Subject='Unravelling Thoughts - User Warned';
					$mail->Body= '<b>'.$receiver_name.'</b> was given a warning by by <b>'.$name.'</b>';
					
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
			
					$mail->Send();
					header("location: dashboard.php?user=$receiver_name");
			}
			else
			{
					header("location: dashboard.php?user=$receiver_name");
			}
		
	
$conn->close();
	}
?>