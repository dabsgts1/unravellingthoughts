<?php
session_start();
if(isset($_SESSION['name']))
{
	header("location: logout.php");	
}

$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$zero=0;
$one=1;
$sql1="SELECT * FROM views WHERE id='$one'";
$result1=$conn->query($sql1);
$count=0;
$id=1;
$numrows=$result1->num_rows;
if($numrows==0)
{
	$sql2="INSERT INTO views (id, count) VALUES ('$id', '$id')";
}
else
{
	while($row=$result1->fetch_assoc())
	{
		$count=$row['count'];
	}
	$count++;
	$sql="UPDATE views SET count='$count' WHERE id='$id'";
	$result2=$conn->query($sql);
}
?>
<html >
	<head>
	
		<title>
			Unravelling Thoughts
		</title>
		<link rel="stylesheet" href="stylehome11.css">
		<link href="font.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="transparent3.png"/>
		
		<link href="//db.onlinewebfonts.com/c/1fed4454352f201d52b65ca5480afb2d?family=Playlist" rel="stylesheet" type="text/css"/>
	</head>
	<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
	<header>
		<div class="nagbar">
			<nav></nav>
	</header>
		</div>
	<div class="ourstory">
		<h2 style="color: #0048aa; font-family: Arial; font-size: 30px; font-weight: 700; padding-top: 45px;"><center>Who Are We?</h2></center>
		<h2 style="color: #696969; font-family: Arial; font-size: 17px; font-weight:normal; line-height:25px; padding-left:30px; padding-right:30px !important; text-align: justify;"></br><center>This is a student-led initiative which aims at relieving students of stress, anxiety, or tension through anonymous online conversations with volunteers, counsellors, and other students.</br></br> Our senior volunteers are trained and are here to listen to your issues, worries, or concern. We hope to provide you with a safe space where you can be heard.</h2></center>
	</div>
	
	<div class="logsystem">
		<h1 style="margin-left:-280px; font-family:Playlist; width:500px; font-size:45px; font-weight:normal; margin-top:90px; ">Unravelling thoughts</h1>
		<img draggable="false" src="masks2.png" style="height:90px; width:90px; position:absolute; margin-left:105px; margin-top:-110px;">
				<img draggable="false" src="masks.png" style="height:90px; width:90px; position:absolute; margin-left:-425px; margin-top:-110px;">
		<!--<h2 style="margin-top: -10px; margin-left:0px;"><center><i>Welcome!</center></i></h2>-->
		<div class="tile">
			<form method="post" action="login.php">
				<h2 style="color: #6a6a6a;"><i>Login</i></h2><br/>
				<input type="text"  placeholder="Username" name="name">
				<input type= "password"  placeholder="Password" name="password">
				<input type="submit" name="submit" value="Login">
				<?php 	include ("links.php"); ?>
				<i><h6 style="color: #969595; font-size:13px;">Website created by <b style="color:#0048aa;">Diya Bansal</b></h6></i>
			</form>
		</div>
	</div>
</body>
</html>