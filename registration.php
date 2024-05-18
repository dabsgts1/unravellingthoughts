	<html>
	<head>
	<title>Unravelling Thoughts - Register</title>
	
<link rel="stylesheet" href="registerstudent4.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
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
	$name = $password = $conpassword="";
	
	?>

	
<div class="tile">
	<form method="post" action="insertReg.php">
		<h2 style="color: #6a6a6a; width:300px; margin-left:-30px;"><i>Register as a Student User</i></h2>
	
	<div class="set1">
		<input type="text" placeholder="Username" name="name" value="<?php echo $name;?>"></br>
		<input type="password" placeholder="Password" name="password" value="<?php echo $password;?>"></br>
		<input type="password" placeholder="Confirm Password" name="conpassword" value="<?php echo $conpassword;?>">
		<p style="font-family: Arial; color:#6a6a6a;font-size: 17px; margin-top: 10px; margin-bottom: 10px; text-align: left; margin-left:180px;margin-bottom:5px;">Age group:</p>
		<input type="radio" id="age1" name="age">
		<label style="font-family: Arial; color:#494949;font-size: 16px;" value="12 to 14" for="age1">12 to 14</label> &emsp;
		<input type="radio" id="age2" name="age" >
		<label style="font-family: Arial; color:#494949;font-size: 16px;" value="15 to 18" for="age2">15 to 18</label></br>
	</div>
	<div class="set2">
		<textarea style="margin-top: 15px; font-size:15px; text-align: left;" name="tac" readonly>Terms and conditions: No sort of abuse or bullying (including offensive and malicious language, hate content, threats, flaming) will be tolerated. The user will be blocked, and the school notified. The identities of all users remain anonymous. However, the school authorities may read conversations and comments if necessary.</textarea>
		
		<input type="checkbox" id="check1" name="check1">
		<label style="font: 400 13.3333px Arial !important; color: #494949; font-size: 10px;" for="check1"> I agree to the terms and conditions</label><br>
	</div>
		</br><input type="submit" name="submit" value="Register">
		<?php include ("links2.php"); ?>
		<div class="reg">
			<a href="accesscode.php"><i><h6 style="color: #0048aa; font-size:13px; width:300px; margin-left:-40px;">Register as a Student Volunteer or Teacher?</h6></i></a>
		</div>
	
	</form>
</div>
</body>
</html> 