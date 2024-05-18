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
	$idP=$_GET['idq'];
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql= "DELETE FROM posts
		   WHERE id='$idP'";
	$result = $conn->query($sql);
	$sql2="DELETE FROM comments
			WHERE idQ='$idP'";
	$result2 = $conn->query($sql2);
	$conn->close();
	
	$age=$_GET['age'];
	$tag=$_GET['tag'];
	header("location: askandans.php?tag=$tag&age=$age");
?>