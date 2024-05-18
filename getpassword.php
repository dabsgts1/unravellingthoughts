<?php
	session_start();
?>
<html>
<head><title>Unravelling Thoughts - Login</title>
	<link rel="stylesheet" href="styleErr2.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
</body>
</html>
<div class="tile">
<?php
//LOGGING IN
$name=$_GET['name'];
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$conn->set_charset('utf8mb4');
$sql ="SELECT * FROM users WHERE name='$name' ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	$email = $row['email'];
	
}
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
$mail->Subject='Unravelling Thoughts - New Message';
$mail->Body= '<b>'.$name.'</h> is trying to reach you!';
$mail->AddAddress($email);
			
$mail->Send();
	
echo "<h2>Your password has been</br>send to the registered email.</h2><br>";
include ("links4.php");
?>