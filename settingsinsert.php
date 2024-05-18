<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];

?>
<html>
<head><title>Unravelling Thoughts - Settings</title>
	<link rel="stylesheet" href="stylep11.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
<header><div class="nagbar">
	
		<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
				<ul class="navlinks">
					
					<?php
				$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				if($_SESSION["name"])
				{
					$sql ="SELECT * FROM users WHERE name='$name' ";
					$result = $conn->query($sql);
					if($result->num_rows == 1)
					{
						while($row = $result->fetch_assoc())
						{
							$n=1;
							$t=$row["teacher"];
							$s=$row["stuvol"];
							if($n==$t)
							{
								echo "<li><a href='selectpageTeach.php'  				>HOME	</a></li>";
							}
							else if($t==2)
							{
								echo "<li><a href='selectpageadmin.php'  				>HOME	</a></li>";
							}
							else if($s==1 && $t==0)
							{
								echo "<li><a href='selectpageVol.php'  				>HOME	</a></li>";
							}
							else
							{
								echo "<li><a href='selectpageStud.php'  				>HOME	</a></li>";
							}
						}
					}
				}
			?>
			<li><a href="logout.php"  				>LOG OUT	</a></li>
				</ul>
			
		</nav>
		</div></header>
</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER

	 
	 $password = $_POST['password'];
	 $conpassword = $_POST['conpassword'];
	 $newpassword = $_POST['newpassword'];
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
					 
					 
	if(empty($newpassword) || empty($password)||empty($conpassword) || !($conpassword==$newpassword))
		{
			echo "<h2>ERROR</h2>";

			if(empty($password)||empty($conpassword) || empty($newpassword))
				
				echo "&emsp;<b>Password is required.</b><br />";

			else if(!($conpassword==$newpassword))
				echo "&emsp;<b>Passwords are not same.</b><br />";
			
			include("links5.php");
		}
				  
	else if($password && $newpassword && $conpassword &&$conpassword==$newpassword)
		{
			$sql ="SELECT * FROM users WHERE name='$name'";
			$result = $conn->query($sql);
			$check="";
			while($row= $result->fetch_assoc())
			{
				$check=$row['password'];
			}
			$passwordmd5=md5($password);
			$newpasswordmd5=md5($newpassword);
			if($passwordmd5==$check)
			{
				
				$sql="UPDATE users SET password='$newpasswordmd5' WHERE name='$name'";
						
				if ($conn->query($sql) === TRUE) 
				{
					echo "<h3><b><br/>Your password has</br>now been changed.</h3></b><br/>";
				
					die();
				}
			}
			else
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>Incorrect password entered.</b><br />";
				include("links5.php");

			}
		} 	
$conn->close();
?>
<br/>
