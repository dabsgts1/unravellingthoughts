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
	if(isset($_GET['cancel'])=="No")
	{
		$receiver_name =$_GET['user'];
		header("location: dashboard.php?user=$receiver_name");
	}
	else if(isset($_GET['send'])=="Yes" && isset($_GET['user']))
	{		
			$sender_name=$_SESSION['name'];
			$receiver_name =$_GET['user'];
			$deleted=1;
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql= "UPDATE messages
				   SET deletedS='$deleted'
				   WHERE sender_name='$sender_name' AND receiver_name='$receiver_name'";
			$result = $conn->query($sql);
			$sql2= "UPDATE messages
				   SET deletedR='$deleted'
				   WHERE receiver_name='$sender_name' AND sender_name='$receiver_name'";
			$result2 = $conn->query($sql2);
				
				header("location: dashboard.php?user=");
	
$conn->close();
	}
?>