	<html>
	<head>
	<title>Unravelling Thoughts - Register</title>
	
<link rel="stylesheet" href="registeringV7.css">
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
	$name = $password = $conpassword=$rname=$email="";
	
	?>
<div class="tile">
	<form method="post" action="insertReg2.php">
		<h2 style="color: #6a6a6a;"><i>Register as a Student Volunteer</i></h2>
	
	<div class="set1">
		<input type="text" placeholder="Username" name="name" value="<?php echo $name;?>"></br>
		<input type="text" placeholder="Your Name" name="rname" value="<?php echo $rname;?>"></br>
		<input type="password" placeholder="Password" name="password" value="<?php echo $password;?>"></br>
		<input type="password" placeholder="Confirm Password" name="conpassword" value="<?php echo $conpassword;?>"></br>
		<input type="text" placeholder="Email" name="email" value="<?php echo $email;?>">
	</div>
	<div class="set2">
		<textarea style="font-size:16px; text-align: left;"  name="tac" readonly>Terms and conditions: Volunteers must remain anonymous. They are not to reveal their identity. Volunteers are to be responsible, mature, sensitive, and empathetic. Care should be taken that appropriate vocabulary and polite tone of language is used when talking to students. Volunteers must immediately report to the counsellors if they think a student needs crucial help from a professional. Volunteers are to lend a listening ear and help students, but they must keep in mind that this is NOT a therapy session. Volunteers are to treat all conversations as confidential information, including any names the students give them. They are, however, obliged to inform counsellors if there are any serious cases and they think the student needs professional help. Volunteers are free to avail of the coaching from school specialist-staff at any point. Volunteers can leave the programme at any time if they cannot fulfil the time requirements and adhere to the commitment. The school knows the real identities of all volunteers and counsellors have access to their accounts.</textarea>
		<input type="checkbox" id="check1" name="check1">
		<label style="font: 400 13.3333px Arial !important; color: #494949; font-size: 10px;" for="check1"> I agree to the terms and conditions</label><br>
	</div>
		</br><input type="submit" name="submit" value="Register">
		<?php include ("links2.php"); ?>
		<i><h6 style="color: #969595; font-size:13px;">Website created by <b style="color:#0048aa;">Diya Bansal</b></h6></i>
	
	</form>
</div>
</body>
</html> 