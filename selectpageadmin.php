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
		if($row['teacher']!=2)
		{
			header("location: logout.php");	
		}
	}
}


?>
<html>
<head>
	<title>
		Unravelling Thoughts - Home
	</title>
	<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
	<script src="jquery-3.3.1.min.js"></script>
<!--<script>
    $(document).ready(function(){
		 $("#div_refresh").load("load.php");
        setInterval(function() {
            $("#display-message").load("load.php");
        }, 1000);
    });
 
</script>-->
<link rel="icon" type="image/png" href="transparent3.png"/>
	<link rel="stylesheet" href="admin1.css">
<link href="font.css" rel="stylesheet">

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
				<ul class="navlinks">
				<li><a href='settingsA.php'  				>SETTINGS	</a></li>
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
<div class="disp" >
	
	<div class="tilePM">
	</br>
		<form action="viewadmin.php" method="post" >
			<input type="submit" name="submit" style="margin-left:35px;" value="Private Messages">
		</form>
		<h3 style="margin-left:35px; margin-top:20px; font-size: 15px;">&nbsp;&nbsp;View private
			</br>conversations</h3>
		<img draggable="false" src="22.png" style="margin-top: -85px; margin-left:150px; width:75px; height:75px;">
	</div>
	
	<div class="tileAAA">
		<form action="askandans.php?tag=all&age=all" method="post" ></br>
			<input type="submit" name="submit" style="margin-left:35px;" value="Ask & Answer">
		</form>
		<h3  style="margin-left:40px; margin-top:20px; font-size: 17px;">A public forum
			<br/>&nbsp;for questions</h3>
		<img draggable="false" src="ask2.png"style="margin-top: -80px; margin-left:167px; width:70px; height:60px;">
	</div>
	
	<div class="tileVR">
	</br>
		<form action="viewreview.php" method="post">
			<input style="margin-left:35px;" type="submit" name="submit" value="View Reviews">
		</form>
	<h3 style="margin-left:40px; margin-top:25px; font-size: 17px;">View reviews
			</br/>&nbsp;by students
		</h3>
		<img draggable="false" src="review.png" style="margin-top: -85px; margin-left:167px; width:50px; height:70px;">
	</div>
	
	<div class="tileVReq">
	</br>
		<form action="approverequests.php" method="post" >
			<input  style="margin-left:35px;" type="submit" name="submit" value="View Requests">
		</form>
		<h3 style="margin-left:40px; margin-top:25px; font-size: 17px;">View requests
			</br/>by volunteers
		<img draggable="false" src="messagespic.png" style="margin-top: -60px; margin-left:125px; width:73px; height:55px;">
	</div>
	
	<div class="tileVC">
	</br>
		<form action="chatroomvolA.php" method="post" >
			<input type="submit" style="margin-left:35px;" name="submit" value="Volunteer Chat">
		</form>
		<h3 style="margin-left:28px; font-size: 15px; margin-top:25px;">Student Volunteer's
		<br/>&emsp;&emsp;group chat</h3>
		<img draggable="false" src="people.png" style="margin-top: -85px; margin-left:168px; width:75px; height:75px;">
	</div>


	<div class="tileWD">
	</br>
		<form action="websitedetails.php" method="post">
			<input type="submit" style="margin-left:35px;" name="submit" value="Website Details">
		</form>
		<h3 style="margin-left:45px; font-size: 15px; margin-top:25px;">&nbsp;View web
			</br/>site details
		</h3>
		<img draggable="false" src="statistics.png" style="margin-top: -80px; margin-left:155px; width:60px; height:60px;">
	</div>
	
	<div class="tileIP">
	</br>
		<!--
		<form action="infopanel.php" method="post" >
			<input type="submit" style="margin-left:35px;" name="submit" value="Info Panel">
		</form>
		<h3 style="margin-left:50px; font-size: 17px; margin-top:25px;">&ensp;Edit info.
		</br>&nbsp;&nbsp;&nbsp;panels
		</h3>
		<img draggable="false" src="panel.png" style="margin-top: -75px; margin-left:155px; width:50px; height:55px;">
		-->
		<form action="settings.php" method="post" >
			<input type="submit" style="margin-left:35px;" name="submit" value="Settings">
		</form>
		<img draggable="false" src="settings.png" style="margin-top: 10px; margin-left:80px; width:100px; height:80px;">
	</div>
	
	
	<div class="tileMU">
	</br>
		<form action="manageusers.php" method="post">
			<input style="margin-left:35px;" type="submit" name="submit" value="Manage Users">
		</form>

	<h3 style="margin-left:40px; margin-top:25px; font-size: 17px;">&nbsp;Delete and
			</br/>block users
		</h3>
		<img draggable="false" src="people.png" style="margin-top: -85px; margin-left:145px; width:75px; height:75px;">
	</div>
	
	</br></br></br></div>
</center>
<br>