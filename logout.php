<?php
	session_start();
	$name=$_SESSION['name'];
?>
<html>
<head><title>Unravelling Thoughts - Log Out</title>
	<link rel="stylesheet" href="styleErr2.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
</body>
</html>
<div class="tile">
<?php
	if($_SESSION['name'])
	{
		unset($_SESSION['name']);  
		session_destroy();  
	}
	header("location: home.php");	
?>