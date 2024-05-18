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
		if($row['stuvol']!=1)
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
	<link rel="stylesheet" href="SelectPageVol9.css">
<link href="font.css" rel="stylesheet">

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
				<ul class="navlinks">
					<li><a href="logout.php"  				>LOG OUT	</a></li>
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
					<b style="color: #8B0000; font-size: 13px; margin-right:-800px; margin-top:-5px;">You have been warned for inappropriate behaviour.</b>
					<?php
				}
			}
		}
		?>		
<div class="disp" style="overflow-wrap: break-word;">

	<div class="tilePM">
	</br>
		<form action="dashboard.php?user=" method="post" >
			<input type="submit" name="submit" value="Private Messages">
		</form>
		<h3 style="margin-left:30px; font-size: 17px;">&nbsp;&nbsp;Speak with volunteers,
			</br>teachers, and counsellors</h3>
		<img draggable="false" src="22.png" style="margin-top: -135px; margin-left:240px; width:105px; height:105px;">
	</div>
	
	<div class="tileAAA">
	</br>
		<form action="askandans.php?tag=all&age=all" method="post" >
			<input type="submit" name="submit" value="Ask & Answer">
		</form>
		<h3 style="margin-left:20px;  font-size: 18px;">&ensp;&nbsp;A public forum to ask
			<br/>&ensp;and answer questions</h3>
		<img draggable="false" src="ask2.png" style="margin-top: -135px; margin-left:245px; width:105px; height:90px;">
	</div>
	
	<div class="tileVC">
		</br>
		<form action="chatroomvol.php" method="post" >
			<input type="submit" name="submit" value="Volunteer Chat">
		</form>
		<h3 style="margin-left:30px; font-size: 18px;">&emsp;Find other student 
		<br/>volunteers to speak to</h3>
		<img draggable="false" src="people.png" style="margin-top: -140px; margin-left:235px; width:105px; height:105px;">
	</div>
	
	<div class="tileSC">
	</br>
		<form action="viewconversations.php" method="post">
			<input type="submit" name="submit" value="My Requests">
		</form>
		<h3 style="margin-left:35px; font-size: 16px; line-height:22px;">&emsp;&emsp;Request to see
			</br/>&nbsp;conversations between
			</br>volunteers and students
		</h3>
		<img draggable="false" src="messagespic.png" style="margin-top: -120px; margin-left:235px; width:110px; height:85px;">
	</div>
	
	</br></br></br></br>
	
		<div class="quotes">
		</br>
			<h2 style="color: #0048aa; font-size:20px; font-weight: bold;padding-bottom:20px; padding-top:35px;">Positivity Quotes</h2>
			<img draggable="false" src="blueface2.png" style="position:absolute; margin-top:-90px; margin-left:220px; height:90px; width:90px;">
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