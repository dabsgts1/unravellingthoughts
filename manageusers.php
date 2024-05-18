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
		if($row['teacher']!=2 && $row['teacher']!=1)
		{
			header("location: logout.php");	
		}
	}
}



?>
<html>
<head>
	<title>
		Unravelling Thoughts - Users
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
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
<link rel="icon" type="image/png" href="transparent2.png"/>
<link rel="stylesheet" href="manage1.css">
<link href="font.css" rel="stylesheet">
<script>
		
			var i = 0;
			
			function move() {
			
				if (i == 0) {
					i = 1;
					var elem = document.getElementById("myBar");
					var width = 1;
					elem.style.visibility='visible';
					var id = setTimeout(function() { setInterval(frame, 10) }, 150);
					var visibility = "visible";

					function frame() {
						if (width >= 1280) {
							clearInterval(id);
							i = 0;
						} else {
							width=width+5;
							elem.style.width = width + "px";
						}
						
						if(width==1 || width>=1280) {
							visibility = "hidden";
							elem.style.visibility = visibility;
						}
						else {
							elem.style.visibility = visibility;
						}
					}
					
					
				}
				
			}
					
			
		
	  </script>
</head>

	<body  onbeforeunload="move()" style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:195px; height:39px;">
				<ul class="navlinks">
					<?php
				$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				if($_SESSION["name"])
				{
					$blocked=2;
					$sql ="SELECT * FROM users WHERE name='$name' ";
					$result = $conn->query($sql);
					if($result->num_rows == 1)
					{
						while($row = $result->fetch_assoc())
						{
							$n=1;
							$s=$row["stuvol"];
							$t=$row["teacher"];
							
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
							if($n!=$s)
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
			
			<div id="myProgress" style="width: 1280px; margin-left:-9px; background-color: none; position:absolute; margin-top:40px;">
			<div id="myBar"  style="width: 1px; height: 4px; background-color: #002c88; visibility:visible "></div>
			</div>
 <div class="names-list" >
	<div class="title">
		<h3 style="font-size: 1.8rem; font-weight: bolder; text-align: center !important; margin-left:0px;"><b>List of Usernames:</b></h3>
	</div>
	<div class="names-list2">
		<h3 style="font-size: 1.6rem; "><b>Students:</b></h3>
		<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$one=1;
			$zero=0;
			$sql="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$zero'";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']."</h2>";
				//echo nl2br(" \n");
			}
		?>
		</br>
		<h3 style="font-size: 1.6rem;"><b>Student Volunteers:</b></h3>
		
		<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$one=1;
			$zero=0;
			$sql="SELECT * FROM users WHERE stuvol='$one' AND teacher='$zero'";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']."</h2>";
				//echo nl2br(" \n");
			}
		?>
		</br>
		<h3 style="font-size: 1.6rem;"><b>Counsellors & Teachers:</b></h3>
		<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$one=1;
			$zero=0;
			$sql="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$one' ";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				if($row['name']==$name)
				{
					echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']." (you)</h2>";
				}
				else
				{
					echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']."</h2>";
					//echo nl2br(" \n");
				}
			}
			
		?>
		</br>
		<h3 style="font-size: 1.6rem;"><b>Admins:</b></h3>
		<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$two=2;
			$sql="SELECT * FROM users WHERE teacher='$two' ";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				if($row['name']==$name)
				{
					echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']." (you)</h2>";
				}
				else
				{
					echo "<h2 style='font-size: 1.4rem; width:195px; color: #ddd; margin-top:-10px; '>".$row['name']."</h2>";
					//echo nl2br(" \n");
				}
			}
			
		?>
		</br>

	</div>
 </div>
 
 <div class="textbox">
		<h3 style="font-size: 1.8rem; font-weight: bolder; color: #616A6B; margin-top:43px; margin-left:35px; "><b>Enter username:</b></h3>
		
		<div class="textbox2">
		<?php
			$username="";
		?>
		<form method="get">
			<h2 style="margin-left: 30px; margin-top:27px;"><input type="text"  placeholder="Username"   value="<?php if(isset($_GET['username'])) echo $_GET['username'];?>" name="username">
			<input style="margin-left:40px;" type="submit" class="submit"  name="submit" value="Enter">
		</form>
		</div>
 </div>
  
 
 <div class="details">
 <div class="innerdetails" id="innerdetails">
	<?php
		$block=0;
		$chk=0;
		$teacher=0;
		if(isset($_GET['submit']))
		{
			$username="";
			if(isset($_GET['username']))
			{
				$username=$_GET['username'];
				$connM = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				$sqlM ="SELECT * FROM users WHERE name='$username' ";
				$resultM = $connM->query($sqlM);
				if($resultM->num_rows == 1)
				{
					while($row=$resultM->fetch_assoc())
					{
						echo "<i><h2 style='color:#393838; font-size:20px; line-height:40px; text-decoration:underline; position:absolute; margin-left:50px; margin-top:5px;'>User Details:</h2></i>";
						echo "<h2 style='color:#595959; font-size:19px; line-height:35px; position:absolute; margin-left:50px; margin-top:55px;'>";
						echo "Username: <b style='color:#0048aa; position:absolute; margin-left:40px;'>".$row['name']."</b>";
						echo nl2br(" \n");
						if($row['rname']!="")
						{
							echo "Real name: <b style='color:#0048aa; position:absolute; margin-left:37px;'>".$row['rname']."</b>";
							echo nl2br(" \n");
						}
						if($row['age']!=0)
						{
							echo "Age group: <b style='color:#0048aa; position:absolute; margin-left:36.5px;'>".$row['age']."</b>";
							echo nl2br(" \n");
						}
						if($row['stuvol']==1 || $row['teacher']==1)
						{
							echo "Email: <b style='color:#0048aa; position:absolute; margin-left:81px;'>".$row['email']."</b>";
							echo nl2br(" \n");
						}
							
						//ROLE
						$teacher=$row['teacher'];
						if($row['stuvol']==0 && $row['teacher']==0)
						{
							echo "Role: <b style='color:#0048aa; position:absolute; margin-left:91px;'>Student</b>";
							echo nl2br(" \n");
						}
						else if($row['stuvol']==1)
						{
							echo "Role: <b style='color:#0048aa; position:absolute; margin-left:91px;'>Student Volunteer</b>";
							echo nl2br(" \n");
						}
						else if($row['teacher']==1)
						{
							echo "Role: <b style='color:#0048aa; position:absolute; margin-left:91px;'>Teacher</b>";
							echo nl2br(" \n");
						}
						else if($row['teacher']==2)
						{
							echo "Role: <b style='color:#0048aa; position:absolute; margin-left:91px;'>Admin</b>";
							echo nl2br(" \n");
						}
						date_default_timezone_set("Asia/Muscat");
						$date=date("M j, Y", strtotime($row['lastactivity']));
						$time=date('h:i a', strtotime($row['lastactivity']));
						echo "Last log in: <b style='color:#0048aa; margin-left:31.5px;'>".$time.", ".$date."</b>";
						echo nl2br(" \n");
						$status=$row['blocked'];
						$block=$status;
						if($status==0)
						{
							echo "Status: <b style='color:#0048aa; position:absolute; margin-left:73.5px;'>No Strikes</b>";
							echo nl2br(" \n");
						}
						else if($status==1)
						{
							echo "Status: <b style='color:#0048aa; position:absolute; margin-left:73.5px;'>Warned</b>";
							echo nl2br(" \n");
						}
						else if($status==2)
						{
							echo "Status: <b style='color:#0048aa; position:absolute; margin-left:73.5px;'>Blocked</b>";
							echo nl2br(" \n");
						}
						if($status==3)
						{
							echo "Status: <b style='color:#0048aa; position:absolute; margin-left:73.5px;'>Deleted</b>";
							echo nl2br(" \n");
						}
						echo "</h2>";
					}
				}
				else if($username=="")
				{
					echo "<b style='font-size: 1.9rem; color: grey; margin-left:213px; margin-top:150px; position:absolute;'>Search for a user</b>";
					$chk=1;
				}
				else
				{
					echo "<b style='font-size: 1.9rem; color: grey; margin-left:230px; margin-top:150px; position:absolute;'>No user found</b>";
					$chk=1;
				}
			}
			else
			{
					echo "<b style='font-size: 1.9rem; color: grey; margin-left:213px; margin-top:150px; position:absolute;'>Search for a user</b>";
					$chk=1;
			}
		}
		else
		{
			echo "<b style='font-size: 1.9rem; color: grey; margin-left:213px; margin-top:150px; position:absolute;'>Search for a user</b>";
			$chk=1;
		}
			
			
	/*		
			DELETE
			BLOCK
			WARN
			
			*/
				
	if(isset($_GET['username']) && isset($_GET['submit']) && $_GET['username']!="" && $chk==0)
	{
		?>
		<div class="user-options" style="margin-top:300px;">
			<form id="form" action="manageusers2.php" method="post">
			<?php
			//echo "<script> move(); </script>";
			if($teacher!=0)
			{
				?>
				<input style="margin-left:95px;  width:140px;" type="submit" class="submit"  name="block-unblock" value="<?php if($block==2) echo "Unblock User"; else echo "Block User";?>">
				<input style="margin-left:105px;  width:140px;" type="submit" class="submit"  name="delete" value="<?php if($block==3) echo "Undelete User"; else echo "Delete User";?>">
				<?php
				
			}
			else
			{
				?>
				<input style="margin-left:30px; width:140px;" type="submit" class="submit"  name="warn" value="Warn User">
				<input style="margin-left:45px;  width:140px;" type="submit" class="submit"  name="block-unblock" value="<?php if($block==2) echo "Unblock User"; else echo "Block User";?>">
				<input style="margin-left:50px;  width:140px;" type="submit" class="submit"  name="delete" value="<?php if($block==3) echo "Undelete User"; else echo "Delete User";?>">
				<?php
			}
				?>
				<input type="text" value="<?php echo $username;?>" name="username" style="display:none;">
				<input type="text" value="<?php echo $block;?>" name="block" style="display:none;">
			</form>
		</div>
		<?php
	}
	?>
</div>
</div>
</body>
</html>

