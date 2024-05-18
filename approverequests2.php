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
	<title>Unravelling Thoughts - Requests</title>
	
<link rel="stylesheet" href="approverev1.css">
    <link href="font.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="approverev1.png"/>
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
		
		<h2 style="margin-left:590px;"><i>Request:</i></h2>
<?php

$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$id=$_GET['id'];
$sql="SELECT * FROM requests WHERE id='$id'";
$result=$conn->query($sql);
$requestee=$username1=$username2=$status="";
while($row=$result->fetch_assoc())
{
	$requestee=$row['name'];
	$username1=$row['username1'];
	$username2=$row['username2'];
	$status=$row['status'];
	break;
}
?>
<div class="tile">
</br></br>
	<b style='color:dimgrey; font-family:Arial; font-size:20px; line-height:31px;'>Requested By:</br><b style='color:#0048aa; font-size:22px;'><?php echo $requestee; ?></b></br></br>To View Conversation Between:</br><b style='color:#0048aa; font-size:22px;'><?php echo $username1;?></b></br> & </br><b style='color:#0048aa; font-size:22px;'><?php echo $username2; ?></b></b>
	<?php 
	if(isset($_POST['todeny']))
	{
		echo "</br></br></br></br><i><b style='color:#940808; font-size:25px; font-family:Arial;  font-size:22px;'>Request Denied.</b></i>";
		?>
		</br><a style="color:#6a6a6a; bottom:-15px; position:relative; font-weight:bold;" href="approverequests.php">BACK</a>
		<?php
	}
	else if (isset($_POST['toaccept']))
	{
		echo "</br></br></br></br><i><b style='color:#08941A; font-size:25px; font-family:Arial;  font-size:22px;'>Request Accepted.</b></i>";
		?>
		</br><a style="color:#6a6a6a; bottom:-15px; position:relative; font-weight:bold;" href="approverequests.php">BACK</a>
		<?php
	}
	else
	{
		?>
		<form method="post">
			<?php
			if($status=="Accepted")
			{	
				?>
				<input type="submit" value="Deny" name="todeny">
				<?php
			}
			else if($status=="Denied")
			{
				?>
				<input type="submit" value="Accept" name="toaccept">
				<?php
			}
			else
			{
				?>
				<input type="submit" value="Deny" name="todeny">
				<input type="submit" value="Accept" name="toaccept">
				<?php
			}
			?>
		</form>
		</br><a style="color:#6a6a6a; bottom:5px; position:relative; font-weight:bold;" href="approverequests.php">BACK</a> 
		<?php
	}
	?>
</div>


<?php
if(isset($_POST['todeny']))
{
	$id=$_GET['id'];
	$chk="Denied";
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql2="UPDATE requests SET status='$chk' WHERE id='$id'";
	$result2=$conn->query($sql2);
	
}
else if(isset($_POST['toaccept']))
{
	$id=$_GET['id'];
	$chk="Accepted";
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql2="UPDATE requests SET status='$chk' WHERE id='$id'";
	$result2=$conn->query($sql2);
}
?>
	</body>
	</html> 