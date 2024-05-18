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
	
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">

</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER
	$username=$_POST['username'];
	$block=$_POST['block'];
	$zero=0;
	$one=1;
	$two=2;
	$three=3;
	if(isset($_POST['warn']))//giving a warning
	{
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql= "UPDATE users
			   SET blocked='$one'
			   WHERE name='$username'";
		$result = $conn->query($sql);
		$conn->close();
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
		$mail->Subject='Unravelling Thoughts - User Warned';
		$mail->Body= '<b>'.$username.'</b> was warned by <b>'.$name.'</b>';
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
		$mail->Send();
	}
	else if(isset($_POST['block-unblock']) && $block==2)//unblocking
	{
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql= "UPDATE users
			   SET blocked='$one'
			   WHERE name='$username'";
		$result = $conn->query($sql);
		$conn->close();
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
		$mail->Body= '<b>'.$username.'</b> was unblocked by <b>'.$name.'</b>';
		
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
		$mail->Send();
	}
	else if(isset($_POST['block-unblock']) && $block==1)//unblocking
	{
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql= "UPDATE users
			   SET blocked='$two'
			   WHERE name='$username'";
		$result = $conn->query($sql);
		$conn->close();
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
		$mail->Body= '<b>'.$username.'</b> was blocked by <b>'.$name.'</b>';
	
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
		$mail->Send();
	}
	else if(isset($_POST['delete']) && $block==3)//undelete
	{
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sqlchk="SELECT * FROM users WHERE name='$username'";
		$resultchk=$conn->query($sqlchk);
		$sql="";
		while($rowchk=$resultchk->fetch_assoc())
		{
			if($rowchk['teacher']==0 && $rowchk['stuvol']==0)
			{
				$sql= "UPDATE users
				SET blocked='$one'
				WHERE name='$username'";
			}
			else
			{
				$sql= "UPDATE users
				SET blocked='$zero'
				WHERE name='$username'";
			}
		}
		$result = $conn->query($sql);
		$conn->close();
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
		$mail->Subject='Unravelling Thoughts - User Undeleted';
		$mail->Body= '<b>'.$username.'</b> was undeleted by <b>'.$name.'</b>';
		
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
		$mail->Send();
	}
	else if(isset($_POST['delete']) && $block!=3)//deleting
	{
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql= "UPDATE users
			   SET blocked='$three'
			   WHERE name='$username'";
		$result = $conn->query($sql);
		
		$conn->close();
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
		$mail->Subject='Unravelling Thoughts - User Deleted';
		$mail->Body= '<b>'.$username.'</b> was deleted by <b>'.$name.'</b>';
		
		$mail->AddAddress($email1);
		$mail->AddAddress($email2);
		$mail->AddAddress($email3);
		$mail->AddAddress($email4);
		$mail->AddAddress($email5);
		$mail->Send();
		
		//now sending messaging if deleted user is volunter to all his users
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql="SELECT * FROM users WHERE name='$username'";
		$result=$conn->query($sql);
		$volunteercheck=0;
		
	}
	header("location: manageusers.php?username=$username&submit=Enter");
?>