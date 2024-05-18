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
<title>Unravelling Thoughts - New Comment</title>
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
if(isset($_POST['addcomment']) && isset($_POST['newusercomment']) && $_POST['newusercomment']!="" && trim($_POST['newusercomment'])!="")
{
	$newcomment=$_POST['newusercomment'];
	$idq=$_POST['QuID'];
	$tag=$_POST['tag'];
	$age=$_POST['age'];
	date_default_timezone_set("Asia/Muscat");
	$date=date("Y-m-d H:i:s");
	$censor=0;
	$filterWords=array("fuck", " cunt ", " dick ");
	for($i=0; $i<count($filterWords); $i++)
	{
		if(strpos(strtolower($newcomment), $filterWords[$i]) !== false)
			$censor=1;
	}
	$connx = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$connx->set_charset('utf8mb4');
	$sqlx="INSERT INTO comments (name, idQ, comment, date, censor) VALUES ('$name', '$idq', '$newcomment', '$date', '$censor')";
	$resultx=$connx->query($sqlx);
	
	if($resultx)
	{	
		header("location: askandans.php?tag=$tag&age=$age");
	}
	else
	{
		echo "<h3 style='margin-top:60px; '><b><br/>Submission failed.</br>Unknown error.</h3></b>	<a style='color:#6a6a6a; bottom:-60px; position:relative;' href='javascript:history.go(-1)'>BACK</a>"; 
	}
	$connx->close();
}
else
{
	header("location: javascript:history.go(-1)");
}

?>
<br/>
