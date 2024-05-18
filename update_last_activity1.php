<?php 
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
session_start();
//$name=$_SESSION['name'];
$name=$_GET['name'];
date_default_timezone_set("Asia/Muscat");
$date=date("Y-m-d H:i:s");
$sql="UPDATE users SET lastactivity = '$date' WHERE name='$name'";
$result = $conn->query($sql);


?>