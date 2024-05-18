	<html>
	<head>
	<title>Unravelling Thoughts - Register</title>
	<link rel="icon" type="image/png" href="transparent3.png"/>
<link rel="stylesheet" href="styleadmin3.css">
    <link href="font.css" rel="stylesheet">
	<link href="//db.onlinewebfonts.com/c/1fed4454352f201d52b65ca5480afb2d?family=Playlist" rel="stylesheet" type="text/css"/>
	</head>
	</head>
	
	<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
	<header><div class="nagbar">
	
		<nav>
		
		</nav>
		</header></div>
<h1 style="position: absolute; margin-left: 490px; margin-top:40px; font-family:Playlist; font-size:40px; font-weight:normal;"><center>Unravelling Thoughts</center></h1></br>

	<?php
	// REGISTERATION CODE
	$name = $password = $conpassword="";
	
	?>

	
	<div class="tile">
	<form method="post" action="insertReg4.php">
	<h2 style="color: #6a6a6a;"><i>Register as an Admin:</i></h2>
	
	<input type="text" placeholder="Username" name="name" value="<?php echo $name;?>">
	
	
	
	<input type="password" placeholder="Password" name="password" value="<?php echo $password;?>">
	
	
	
	<input type="password" placeholder="Confirm Password" name="conpassword" value="<?php echo $conpassword;?>">
	
	
	<input type="submit" name="submit" value="Register">
	<?php include ("links2.php"); ?>
	<i><h6 style="color: #969595; font-size:13px;"><b style="color:#0048aa;">Website created by Diya Bansal</b></h6></i>
	
	</form>
	</div>
	</br></br>
	</body>
	</html> 