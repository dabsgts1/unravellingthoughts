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
		if($row['teacher']!=0 && $row['stuvol']!=0)
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
	<link rel="stylesheet" href="studentpage10.css">
<link href="font.css" rel="stylesheet">
<link href="//db.onlinewebfonts.com/c/1fed4454352f201d52b65ca5480afb2d?family=Playlist" rel="stylesheet" type="text/css"/>

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
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
		
		<?php
		if($_SESSION["name"])//checking if warned then displaying appropriate message
		{
			$sql ="SELECT * FROM users WHERE name='$name' ";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				if($row['blocked']==1)
				{
					?>
					<b style="color: #8B0000; font-size: 13px; margin-right:-850px; margin-top:0px;">You have been warned for inappropriate behaviour.</b>
					<?php
				}
			}
		}
		?>


<div class="disp">
	
	<div class="tileAAA">
		<form action="askandans.php?tag=all&age=all" method="post" >
			<input type="submit" style="font-size: 18px; margin-top:30px;" name="submit" value="Ask & Answer">
		</form>
		</br>
		<h3 style="margin-left:20px; font-size: 18px;">&emsp;A public forum for</br>&ensp;students to ask and</br>&emsp;answer questions</h3>
		<img draggable="false" src="people.png" style="margin-top: -5px; margin-left:60px; width:105px; height:105px;">
	</div>
	
	<div class="reminder">
		<h2 style="margin-top:0px; color: #0048aa; font-size:20px; font-weight: bold; padding:20px; padding-top:55px;">Remember:</h2>
		<h2 style="color: #696969; width: 200px; padding:20px;  font-size: 17px; font-weight:normal; line-height:25px; margin-top:-30px;  text-align: left; word-break:break word;">
			</br><b>Tip:</b> When talking to volunteers or counsellors about your issues, make sure not to reveal the real names of the people involved!</h2>
	</div>
	
	
	
	<div class="tilePM">
		<form action="dashboard.php?user=" method="post" >
			<input type="submit" name="submit" style="font-size: 18px; margin-top:30px;" value="Private Messages">
		</form>
		</br>
		<h3 style="margin-left:25px; font-size: 18px;">&nbsp;Speak with student</br>volunteers, teachers,</br>&emsp;and counsellors</h3>
		<img draggable="false" src="22.png" style="margin-top: 0px; margin-left:60px; width:105px; height:105px;">
	</div>
	
		<!--<img draggable="false" src="info3.png" style="width: 670px; height:640px; padding: 15px;">-->
		
		<div class="quotes">
	
			
			</br></br></br>
			<h2 style="margin-top:0px; color: #0048aa; font-size:20px; font-weight: bold; padding-right:25px;padding-bottom:10px; ">Positivity Quotes</h2>
			<img draggable="false" src="blueface2.png" draggable="false" style="position:absolute; margin-top:-80px; margin-left:220px; height:90px; width:90px;">
			<i><h2 style="width: 300px; color: #696969; font-size: 17px; font-weight:bold;  line-height:25px;  text-align: left; padding-right:20px; margin-top: 0px;">40% of healing happens</br>during venting.</h2>

			<h2 style="color: #696969; width: 300px;  font-size: 15px; font-weight:normal; line-height:25px;  text-align: left; padding-right:20px;">
			</br>It is only in sorrow bad weather masters us; in joy we face the storm and defy it.
			</br></br>Not until we are lost do we begin to understand ourselves.
			</br></br>When everything seems to be going against you, remember that the airplane takes of against the wind, not with it.</h2></i>
			
			</br></br>
			
			
			<h2 style="margin-top:0px; color: #0048aa; font-size:20px; font-weight: bold; padding-right:25px;padding-bottom:10px; ">Share your experience?</h2>
		
		<h2 style="color: #696969; width: 300px;  font-size: 15px; font-weight:normal; line-height:25px;  text-align: left; padding-right:20px;">Tell us how our platform helped you.</h2>
		<i><h2 style="font-size: 15px; font-weight:normal; line-height:25px;  text-align: left;"><a class="links" href="submitreview.php" style="text-decoration:underline; color:grey;">Click here</a></h2></i></br>
		</div>
		</br></br></br>
	
</div>
</center>
<br>