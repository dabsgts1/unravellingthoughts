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
		Unravelling Thoughts - Volunteer's Chatroom
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
	<link rel="stylesheet" href="chatroomstyleOne.css">
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
<div id="chat-container">
		<?php $search_user=""; ?>
		<div id="chat-title" style="font-size: 26px;">
			<span><center>Volunteer Chatroom</center></span>
			
		</div>
		<div id="chat-message-list">
		<?php
		if(isset($_POST['submit']) && !empty($_POST['message']))
		{
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$message= $conn -> real_escape_string(trim($_POST['message']));
			//$_POST['message'];
			$sender_name=$_SESSION['name'];
			date_default_timezone_set("Asia/Muscat");
			$date=date("Y-m-d H:i:s");
			$display=date("h:i a");
			
			$conn->set_charset('utf8mb4');
			$message= $conn -> real_escape_string(trim($_POST['message']));
			$sql="INSERT INTO chatroomvol(name, message_text, date_time) VALUES('$sender_name','$message','$date')";
			$result = $conn->query($sql);
			
			
		}
		
		?>
		<div id="display-message">
				
		<script src="jquery.min.js"></script>
		<script>
	var val = "<?php echo $name; ?>";
	var loadmore="<?php if(isset($_GET['loadmore'])) { echo $_GET['loadmore']; } ?>";
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: "POST",
                url: "dataCRAvol.php?name="+val+"&loadmore="+loadmore,
                success: function(data){
                    $("#display-message").html(data);
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
			</div>
			
			
			</br></br>
		</div>
		
		<div id="chat-form">
		
		
		<form method="post" id="theFormID">
			<input type="text" autofocus="autofocus" autocomplete="off" style="width:690px; margin-top:13px; position: relative;" placeholder="type a message" name="message" id="message">
			<input type="submit" value="Enter"  name="submit" id="sendButton">
		</form>
		</div>
		
	</div>
</body>
</html>

