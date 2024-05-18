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
		if($row['teacher']!=1)
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
	<link rel="stylesheet" href="SelectPageTnew4.css">
<link href="font.css" rel="stylesheet">

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
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
		
		
		
<div class="disp" style="overflow-wrap: break-word;">


	<div class="tilePM">
		<form action="dashboard.php?user=" method="post" >
			<input type="submit" name="submit" value="Private Messages">
		</form>
		<h3 style="margin-left:25px; font-size: 15px;">&nbsp;&nbsp;Speak with</br>&nbsp;&nbsp;volunteers
			</br>and teachers</h3>
		<img draggable="false" src="22.png" style="margin-top: -100px; margin-left:133px; width:75px; height:75px;">
	</div>

	<div class="tileAAA">
		<form action="askandans.php?tag=all&age=all" method="post" >
			<input type="submit" name="submit" value="Ask & Answer">
		</form>
		<h3  style="margin-left:25px; margin-top:30px; font-size: 17px;">A public forum
			<br/>&nbsp;for questions</h3>
		<img draggable="false" src="ask2.png"style="margin-top: -80px; margin-left:152px; width:65px; height:57px;">
	</div>
	
	<div class="tileS">
		<form action="approverequests.php" method="post" >
			<input type="submit" name="submit" value="View Requests">
		</form>
		<h3 style="margin-left:25px; margin-top:30px; font-size: 17px;">View requests
			</br/>by volunteers
		<img draggable="false" src="messagespic.png" style="margin-top: -53px; margin-left:125px; width:65px; height:45px;">
	</div>
	
	<div class="tileTC">
	</br>
		<form action="chatroomvol.php" method="post">
			<input style="margin-left:29px; margin-top:18px; width:170px;" type="submit" name="submit" value="Volunteer's Chat">
		</form>

	<h3 style="margin-left:25px; font-size: 15px;">Meet, talk, and</br>&ensp;interact
			with</br>&emsp;volunteers
		</h3>
		<img draggable="false" src="people.png" style="margin-top: -100px; margin-left:145px; width:65px; height:65px;">
	</div>
	
	
	<div class="tileVR">
	</br>
		<form action="viewreview.php" method="post">
			<input style="margin-left:29px; margin-top:18px; width:170px;" type="submit" name="submit" value="View Reviews">
		</form>
	<h3 style="margin-left:25px; margin-top:30px; font-size: 17px;">View reviews
			</br/>&nbsp;by students
		</h3>
		<img draggable="false" src="review.png" style="margin-top: -85px; margin-left:152px; width:50px; height:70px;">
	</div>
	
	<div class="tileMU">
	</br>
		<form action="manageusers.php" method="post">
			<input style="margin-left:29px; margin-top:18px; width:170px;" type="submit" name="submit" value="Manage Users">
		</form>

	<h3 style="margin-left:30px; margin-top:30px;  font-size: 15px;">&nbsp;Delete and
			</br/>block users
		</h3>
		<img draggable="false" src="people.png" style="margin-top: -85px; margin-left:130px; width:75px; height:75px;">
	</div>
	
	
	
	
		<div class="quotes" style="overflow-wrap: break-word;">
		
			</br>
			<h2 style="color: #0048aa; font-size:20px; font-weight: bold;padding-bottom:20px; padding-top:35px;">Positivity Quotes</h2>
			<img draggable="false" src="blueface2.png" style=" margin-top:-90px; margin-left:220px; height:90px; width:90px;">
			<i><h2 style="color: #696969; font-size: 17px; font-weight:bold;  line-height:25px;  text-align: left; padding-right:20px; margin-top: 0px;">40% of healing happens</br>during venting.</h2>

			<h2 style="color: #696969;  font-size: 15px; font-weight:normal; line-height:25px;  text-align: left; padding-right:20px;">
			</br>It is only in sorrow bad weather masters us; in joy we face the storm and defy it.
			</br></br>Not until we are lost do we begin to understand ourselves.
			</br></br>When everything seems to be going against you, remember that the airplane takes of against the wind, not with it.
			</br></br>You can only find yourself if you lose yourself.</h2></i>
			<h2 style="margin-top:0px; color: #0048aa; font-size:20px; font-weight: bold; padding-right:25px;padding-bottom:20px; padding-top:25px;">Share your experience?</h2>
			<h2 style="width: 300px; color: #696969; font-size: 17px; font-weight:500;  line-height:25px;  text-align: left; padding-right:20px; ">Tell us how our platform helped you.</h2>
			<i><h2 style="font-size: 17px; font-weight:normal; line-height:25px;  text-align: left;"><a class="links" href="submitreview.php" style="text-decoration:underline; color:grey;">Click here</a></h2></i>
			</br></br></br></br>
			<h2 style="color: #0048aa; font-size:20px; font-weight: bold; padding-right:25px;padding-bottom:20px;">Reference Pages</h2>
			
			<h2 style="font-size: 15px; font-weight:normal; line-height:25px;  text-align: left;overflow-wrap:break-word;"><a class="links" href="https://www.sagu.edu/thoughthub/the-psychology-of-venting" target="_blank" style="text-decoration:underline;">The Psychology of Venting</a></h2>
	</br></br>	</div>


</div>
</center>
<br>