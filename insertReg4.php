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
	 
	 $password = $_POST['password'];
	 $conpassword = $_POST['conpassword'];
	
	 $conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
					 
					 
	if(empty($password)||empty($conpassword) || empty($name) || !($conpassword==$password))
		{
			echo "<h2>ERROR</h2>";
							
			if(empty($name))
				echo "&emsp;<b>Username is required.</b> <br />";
			if(empty($password)||empty($conpassword))
				echo "&emsp;<b>Password is required.</b><br />";
			if(!($conpassword==$password))
				echo "&emsp;<b>Passwords are not same.</b><br />";
			
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$count=$result->num_rows;
			
			if($count!=0)
			{
				echo "&emsp;<b>Username already exists. Please type another name.</b>";
				include ("links2.php");
				die();
			}	
		}
				  
	else if($name && $password && $conpassword &&$conpassword==$password )
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
			$n=2;
			$sql="INSERT INTO users(name, password, teacher) VALUES('$name','$passwordmd5', '$n')";
						
			if ($conn->query($sql) === TRUE) 
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