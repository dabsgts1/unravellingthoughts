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
		Unravelling Thoughts - Messages
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
<link rel="stylesheet" href="viewadmin4.css">
<link href="font.css" rel="stylesheet">

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
				<ul class="navlinks">
					<li><a href="selectpageadmin.php"  				>HOME	</a></li>
					<li><a href="settingsA.php"  				>SETTINGS	</a></li>
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
 <div class="names-list" >
	<div class="title">
		<h3 style="font-size: 1.8rem; font-weight: bolder; text-align: center !important; margin-left:0px;"><b>List of Usernames:</b></h3>
	</div>
	<div class="names-list2" style="overflow-x:hidden; word-break: break-word;">
		<h3 style="font-size: 1.6rem;"><b>Students:</b></h3>
		<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$one=1;
			$zero=0;
			$sql="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$zero'";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc())
			{
				echo "<h2 style='font-size: 1.4rem; color: #ddd; margin-top:-10px; width:200px; '>".$row['name']."</h2>";
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
				echo "<h2 style='font-size: 1.4rem; color: #ddd; width:200px; margin-top:-10px; '>".$row['name']."</h2>";
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
				echo "<h2 style='font-size: 1.4rem; color: #ddd; width:200px; margin-top:-10px; '>".$row['name']."</h2>";
				//echo nl2br(" \n");
			}
			
		?>
		</br>

	</div>
 </div>
 
 <div class="textbox">
		<h3 style="font-size: 1.8rem; font-weight: bolder; color: #616A6B; margin-top:23px; margin-left:25px; "><b>Enter names</br>to see the</br>conversation:</b></h3>
		
		<div class="textbox2">
		<?php
			$username1=$username2=$nomesg="";
		?>
		<form method="post">
			<h2 style="margin-left: 10px;"><input type="text" autocomplete="off" placeholder="Username 1"   value="<?php if(isset($_POST['username1'])) echo $_POST['username1'];?>" name="username1">
			
			&nbsp;<input type="text" autocomplete="off"  placeholder="Username 2"  value="<?php if(isset($_POST['username2'])) echo $_POST['username2'];?>" name="username2"></h2>
			
			<h3 style="font-size: 15px; font-weight: bolder; color: #616A6B; margin-top:15px; margin-left:13px; "><b>Number of messages to load:</b></h3>
			
			<select name="nomesg" id="nomesg"> 
			<option>50</option>
			<option>100</option>
			<option>200</option>
			<option>All</option>
			</select> 
			<script type="text/javascript">
				document.getElementById('nomesg').value = "<?php echo $_POST['nomesg'];?>";
			</script>
			
			<input type="submit" class="submit"  name="submit" value="Enter">
		</form>
		</div>
 </div>
 <div class="chat-message">
 <div class="chat-message-list" id="chat-message-list">
		<script src="jquery.min.js"></script>
		<script>
	var val1 = "<?php if(isset($_POST['username1'])) echo $_POST['username1']; ?>";
	var val2 = "<?php if(isset($_POST['username2'])) echo $_POST['username2']; ?>";
	var val3 = "<?php if(isset($_POST['nomesg'])) echo $_POST['nomesg']; ?>";
	
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: "POST",
                url: "data3.php?user1="+val1+"&user2="+val2+"&user3="+val3,
                success: function(data){
                    $("#chat-message-list").html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  
		// it will refresh your data every 1 sec

    });
		</script>
		</br></br>
		</div></div>
 
	
</body>
</html>

