	<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];

?><html>
	<head>
	<title>Unravelling Thoughts - Settings</title>
	<link rel="icon" type="image/png" href="transparent3.png"/>
<link rel="stylesheet" href="settings1.css">
    <link href="font.css" rel="stylesheet">
	
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
							
							if($n==$s)
							{
								echo "<li><a href='selectpageVol.php'  				>HOME	</a></li>";
							}
							else if($n==$t)
							{
								echo "<li><a href='selectpageTeach.php'  				>HOME	</a></li>";
							}
							else if($t==2)
							{
								echo "<li><a href='selectpageadmin.php'  				>HOME	</a></li>";
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

<br/>
<script src="jquery.min.js"></script>
		<script>
			
			var name = "<?php echo $name; ?>";
			$(document).ready(function(){
				
				update_last_activity();
								
				setInterval(function(){
					update_last_activity();
				}, 5000);
				
				function update_last_activity()
				{
					$.ajax({
						type: "POST",
						url: "update_last_activity1.php?name="+name,
					})
				}
			// it will refresh your data every 1 sec
	
			});
			</script>
<h2 style="margin-left:590px;"><i>Settings:</i></h2>
	<?php
	// REGISTERATION CODE
	$password =$newpassword= $conpassword="";
	
	?>

	
	<div class="tile">
	<form method="post" action="settingsinsert.php">
	<h2 style="color: #6a6a6a;"><i>Change your Password:</i></h2>
	
	
	
	
	<input type="password" placeholder="Current Password" name="password" value="<?php echo $password;?>">
	
	<input type="password" placeholder="New Password" name="newpassword" value="<?php echo $newpassword;?>">
	
	<input type="password" placeholder="Confirm Password" name="conpassword" value="<?php echo $conpassword;?>">

	
	<input type="submit" name="submit" value="Change Password" style="font-size:1.1rem;">
	
	
	</form>
	</div>
	</body>
	</html> 