<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];

?>
<html>
<head>
<title>Unravelling Thoughts - Experiences</title>
	<link rel="stylesheet" href="stylep11.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
<header><div class="nagbar">
	
		<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img src="logotextblue2.png" style="width:200px; height:39px;">
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
							else
							{
								echo "<li><a href='selectpageStud.php'  				>HOME	</a></li>";
							}
						}
					}
				}
			?>
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
							$t=$row["stuvol"];
							if($n!=$t)
							{
								echo "<li><a href='settings.php'  				>SETTINGS	</a></li>";
							}
						}
					}
				}
			?>
			<li><a href="logout.php"  				>LOG OUT	</a></li>
				</ul>
			
			
			</nav>
		</div></header>
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
</body>
</html>
<div class="tile">
<?php 
$review=$_POST['review'];
if(empty($review))		
{

		echo "<h2>ERROR</h2>";
		echo "&emsp;<b style='margin-left:-10px;'>Text field is empty.</b><br />";
		include("links5.php");
}
else if($review)
{
	date_default_timezone_set("Asia/Muscat");
	$date=date("Y-m-d H:i:s");
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$conn->set_charset('utf8mb4');
	$sql="INSERT INTO review 
		(name, reviews, date) 
		VALUES ('$name', '$review', '$date')";
	$result=$conn->query($sql);
	if($result)
	{
		echo "<h3 style='margin-top:60px; '><b><br/>Your experience</br>was submitted.</h3></b><br/>";
	}
	else
	{
		echo "<h3 style='margin-top:60px; '><b><br/>Submission failed.</br>Message too long.</h3></b>	<a style='color:#6a6a6a; bottom:-60px; position:relative;' href='javascript:history.go(-1)'>BACK</a>"; 
	}
	
	
}
$conn->close();
?>
<br/>
