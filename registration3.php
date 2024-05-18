	<html>
	<head>
	<title>Unravelling Thoughts - Register</title>
	<link rel="icon" type="image/png" href="transparent3.png"/>
<link rel="stylesheet" href="registrationT6.css">
    <link href="font.css" rel="stylesheet">
	<link href="//db.onlinewebfonts.com/c/1fed4454352f201d52b65ca5480afb2d?family=Playlist" rel="stylesheet" type="text/css"/>
	</head>
	
	<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
	<header><div class="nagbar">
	
		<nav>
		
		</nav>
		</header></div>
<h1 style="position: absolute; margin-left: 490px; font-family:Playlist; font-size:40px; font-weight:normal;"><center>Unravelling Thoughts</center></h1></br>

	<?php
	// REGISTERATION CODE
	$name = $password = $conpassword=$rname=$email="";
	
	?>

	
<div class="tile">
	<form method="post" action="insertReg3.php">
		<h2 style="color: #6a6a6a;"><i>Register as a Teacher</i></h2>
	
		<input type="text" placeholder="Username" name="name" value="<?php echo $name;?>"></br>
		<input type="text" placeholder="Your Name" name="rname" value="<?php echo $rname;?>"></br>
		<input type="password" placeholder="Password" name="password" value="<?php echo $password;?>"></br>
		<input type="password" placeholder="Confirm Password" name="conpassword" value="<?php echo $conpassword;?>"></br>
		<input type="text" placeholder="Email" name="email" value="<?php echo $email;?>">
	
	</br>
		<input type="submit" name="submit" value="Register">
		<?php include ("links2.php"); ?>
		<i><h6 style="color: #969595; font-size:13px;">Website created by <b style="color:#0048aa;">Diya Bansal</b></h6></i>
	</form>
	</div>
	</body>
	</html> 