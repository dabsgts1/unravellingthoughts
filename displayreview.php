	<?php
session_start();
$name="";
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
else
{
	$name=$_SESSION['name'];
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql="SELECT * FROM users WHERE name='$name'";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		if($row['teacher']!=1 && $row['teacher']!=2)
		{
			header("location: logout.php");	
		}
	}
}

?><html>
	<head>
	<title>Unravelling Thoughts - Review</title>
	
<link rel="stylesheet" href="displayreview4.css">
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
		</br>
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
		
		<h2 style="margin-left:600px;"><i>Review:</i></h2>
<?php

$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$id=$_GET['id'];
$sql="SELECT * FROM review WHERE id='$id'";
$result=$conn->query($sql);
$subname=$review="";
while($row=$result->fetch_assoc())
{
	$review=$row['reviews'];
	$subname=$row['name'];
	break;
}
?>
<div class="tile">
		<h2 style="color: #6a6a6a;"><i>Submitted by: <b><?php echo $name; ?></b></i></h2>
		<textarea readonly name="review"><?php echo $review; ?></textarea></br>
		<a style="color:#6a6a6a; bottom:-25px; position:relative;" href="viewreview.php">BACK</a> 
	</div>
	</body>
	</html> 