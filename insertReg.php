<html>
<head><title>Unravelling Thoughts - Register</title>
	<link rel="stylesheet" href="questions1.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">

</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER
	$chk=0;
	 $name = $_POST['name'];
	 if(isset($_POST['check1']))
	 {
		$check1 = 1;
	 }
	 else
	 {
		$check1=0;
	 }
	 $password = $_POST['password'];
	 $conpassword = $_POST['conpassword'];
	 $conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	 if(isset($_POST['age']) && $_POST['age']=="12 to 14")
	 {
		$agechk = 1;
	 }
	 else
	 {
		$agechk=0;
	 }
	 			 
	if(empty($password)||empty($conpassword) || empty($name) || !($conpassword==$password) || $check1==0 || !isset($_POST['age']))
		{
			echo "<h2>ERROR</h2>";
							
			if(empty($name))
				echo "&emsp;<b>Name is required.</b> <br />";

			if(empty($password)||empty($conpassword))
				
				echo "&emsp;<b>Password is required.</b><br />";

			if(!($conpassword==$password))
				echo "&emsp;<b>Passwords are not same.</b><br />";
			
			if($check1==0)
				echo "&emsp;<b>Please read Terms and Conditions.</b> <br />";
			
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			if($count!=0)
			{
				echo "&emsp;<b>Name already exists. Please type another name.</b>";
				include ("links2.php");
				die();
			}
			
			if(!isset($_POST['age']))
				echo "&emsp;<b>Age group is required</b> <br />";
			?>
				<br/>
				<div class="links">
				<p><a href="javascript:history.go(-1)">BACK</a> 
				&nbsp;
				<a href="home.php">LOG IN</a> 
			<?php
		}
				  
	else if($name && $password && $conpassword &&$conpassword==$password && $check1==1 && isset($_POST['age']))
		{
			
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			if($count!=0)
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>Name already exists. Please type another name.</b>";
				include ("links2.php");
				die();
			}
			
			$passwordmd5=md5($password);
			if($agechk==1)
				$age="12 to 14";
			else if ($agechk==0)
				$age="15 to 18";
			$rand1=rand(1,22);
			$rand2=$rand3=-1;
			while($rand2==$rand1 || $rand2==-1)
			{ 
				$rand2=rand(1,22);
			}
			while($rand3==$rand2 || $rand3==$rand1 || $rand3==-1)
			{
				$rand3=rand(1,22);
			}
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$conn->set_charset('utf8mb4');
			$sqlR1="SELECT * FROM questions WHERE id='$rand1'";
			$sqlR2="SELECT * FROM questions WHERE id='$rand2'";
			$sqlR3="SELECT * FROM questions WHERE id='$rand3'";
			$resultR1=$conn->query($sqlR1);
			$resultR2=$conn->query($sqlR2);
			$resultR3=$conn->query($sqlR3);
			$q1=$q2=$q3="";
			while($rowR1=$resultR1->fetch_assoc())
			{
				$q1=$rowR1['question'];
			}
			while($rowR2=$resultR2->fetch_assoc())
			{
				$q2=$rowR2['question'];
			}
			while($rowR3=$resultR3->fetch_assoc())
			{
				$q3=$rowR3['question'];
			}
			//$sql="INSERT INTO users(name, password, age) VALUES('$name','$passwordmd5', '$age')";
			
			
			?>
			<head>
			<header>
				<div class="nagbar">
					<nav>
					</nav>
				</div>
			</header></head>
			
			<div class="questions">
				<form method="post" action="newuser.php">
					<h2>Confirm that you are a GMA Student by</br>answering these questions:</h2>
					<input type="text" name="name" value="<?php echo $name;?>" style="display:none;">
					<input type="password" name="password" value="<?php echo $password;?>" style="display:none;">
					<input type="text" name="age" value="<?php echo $age;?>" style="display:none;">
					<input type="text" name="id1" value="<?php echo $rand1;?>" style="display:none;">
					<input type="text" name="id2" value="<?php echo $rand2;?>" style="display:none;">
					<input type="text" name="id3" value="<?php echo $rand3;?>" style="display:none;">
					
					<center><h3 style="font-family:Arial; color:dimgrey; font-weight:normal;font-size:17px; width:550px; ">1. <?php echo $q1; ?></h3></center>
					<input type="text" name="answer1" class="answer" value="<?php if(isset($_POST['answer1'])) echo $_POST['answer1']; ?>" style="margin-top:-5px; margin-botom:10px;">
					
					<center><h3 style="font-family:Arial; color:dimgrey; font-weight:normal;font-size:17px; width:550px; ">2. <?php echo $q2; ?></h3></center>
					<input type="text" name="answer2" class="answer" value="<?php if(isset($_POST['answer2'])) echo $_POST['answer2']; ?>" style="margin-top:-5px; margin-botom:10px;">
					
					<center><h3 style="font-family:Arial; color:dimgrey; font-weight:normal;font-size:17px; width:550px; ">3. <?php echo $q3; ?></h3></center>
					<input type="text" name="answer3" class="answer" value="<?php if(isset($_POST['answer3'])) echo $_POST['answer3']; ?>" style="margin-top:-5px; margin-botom:10px;">
					
					<input type="submit" name="answerquestions">
				</form>
				<br/>
				<div class="links" style="bottom:-4px !important;">
				<p><a href="javascript:history.go(-1)">BACK</a> 
				&nbsp;
				<a href="home.php">LOG IN</a> 
			</div>
			<?php
			/*if ($conn->query($sql) === TRUE) 
			{
				echo "<h3><b><br/>You are now registered.</h3></b><br/>";
				include ("links4.php");
				die();
			}*/
		} 	
$conn->close();
?>