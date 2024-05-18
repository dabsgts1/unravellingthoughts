<html>
<head><title>Unravelling Thoughts - Register</title>
	<link rel="stylesheet" href="styleErr2.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">

</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER

	 $name = $_POST['name'];
	 if(isset($_POST['check1']))
	 {
		$check1 = 1;
	 }
	 else
	 {
		$check1=0;
	 }
	 $rname=$_POST['rname'];
	 $password = $_POST['password'];
	 $conpassword = $_POST['conpassword'];
	 $email=$_POST['email'];
	 $conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
					 
					 
	if(empty($password)||empty($conpassword) || empty($rname) || empty($name) || !($conpassword==$password) || $check1==0 || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email))
		{
			echo "<h2>ERROR</h2>";
							
			if(empty($name))
				echo "&emsp;<b>Username is required.</b> <br />";
			if(empty($rname))
				echo "&emsp;<b>Name is required.</b> <br />";
			if(empty($email))
				echo "&emsp;<b>Email is required.</b> <br />";
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				echo "&emsp;<b>Invalid email format.</b> <br />";
			if(empty($password)||empty($conpassword))
				
				echo "&emsp;<b>Password is required.</b><br />";

			if(!($conpassword==$password))
				echo "&emsp;<b>Passwords are not same.</b><br />";
			if(empty($check1))
				echo "&emsp;<b>Please read Terms and Conditions.</b> <br />";
			
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			if($count!=0)
			{
				echo "&emsp;<b>Username already exists. Please type another name.</b>";
				include ("links2.php");
				die();
		}}
				  
	else if($name && $rname && $password && $conpassword &&$conpassword==$password  && $check1==1)
		{
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			if($count!=0)
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>Userame already exists. Please type another name.</b>";
				include ("links2.php");
				die();
			}
			
			$passwordmd5=md5($password);
			$n=1;
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql="INSERT INTO users (name, password, email, rname, stuvol) VALUES('$name', '$passwordmd5', '$email', '$rname', $n )";
			$result=$conn->query($sql);			
			if ($result) 
			{
				echo "<h3><b><br/>You are now registered.</br>Kindly keep your password safe</br>as it cannot be changed.</h3></b>";
				?>
				<a style="bottom:-2px; margin-left:-20px; position:absolute;" href="home.php">LOG IN</a> 
				<?php
				die();
			}
		} 	
$conn->close();
?>
<br/>
<div class="links">
<p><a href="javascript:history.go(-1)">BACK</a> 
&nbsp;
<a href="home.php">LOG IN</a> 