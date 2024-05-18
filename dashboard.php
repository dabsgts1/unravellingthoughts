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
<style>
.nagbar, li{
	font-size:16px;
	color: #f4f4f4;
}

header{
	background-color: #0048AA;
	height:40px;
	width: 1280px;
	max-width:2000px;
	
}
nav{
	margin-top:-35px;
	display:flex;
	justify-content:space-between;
	align-items:center;
	padding: 30px 10%;
	font-family: "Raleway", sans-serif;
}
.navlinks li{
	display: inline-block;
	padding: 0px 20px;
}
</style>
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
<link rel="stylesheet" href="styledashboard16.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					//, 0);
					var visibility = "visible";

					function frame() {
						if (width >= 1280) {
							clearInterval(id);
							i = 0;
						} else {
							width=width+6;
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

	<body onbeforeunload="move()" style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
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
		<div id="myProgress" style="width: 1280px; margin-left:-9px; background-color: none; position:absolute; margin-top:40px;">
			<div id="myBar"  style="width: 1px; height: 4px; background-color: #002c88; visibility:visible "></div>
			</div>
<div id="chat-container">
		<?php $search_user=""; ?>
		<div id="search-container" class="search">
				<span style="color: #ddd; "class="fa fa-search"></span>
				<input type="text" spellcheck="false" name="search_user" placeholder="Search User" id="search" autocomplete="off" />
		</div>		
		<div onclick="document.getElementById('new-message').style.display='block'" id="new-message-container" >
			<a href="#">+</a>
		<?php require_once("new-message.php");?>



			
		</div>
		<div id="chat-title">
			
			<script src="jquery.min.js"></script>
			<script>
			
			var name = "<?php echo $name; ?>";
			var user="<?php if (isset($_GET['user'])) echo $_GET['user']; else echo "" ?>";
			$(document).ready(function(){
				
				fetch_online();
				update_last_activity();
					
				
				setInterval(function(){
					update_last_activity();
					fetch_online();
				}, 5000);
				
				function fetch_online()
				{
					$.ajax({
						type:"POST",
						url:"fetch_online.php?name="+name+"&user="+user,
						
						success:function(data)
						{
							$("#chat-title").html(data);
						}
					})
				}
				
				function update_last_activity()
				{
					$.ajax({
						type: "POST",
						url: "update_last_activity1.php?name="+name,
						success: function()
						{
							$("#chat-title").html(data);
						}
					})
				}
        
			
			 
			// it will refresh your data every 1 sec
	
			});
			</script>
			
			
		</div>
		<div id="chat-message-list">
		
		<?php
		if(isset($_POST['submit']) && isset($_GET['user']) && $_GET['user']!="" && !empty($_POST['message']))
		{
			
			//$_POST['message'];
			$sender_name=$_SESSION['name'];
			$receiver_name=$_GET['user'];
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$conn->set_charset('utf8mb4');
			$sqlblock="SELECT * FROM users where name='$receiver_name'";
			$resultblock = $conn->query($sqlblock);
			$chkblock=0;
			$checkvol=0;
			while($rowblock=$resultblock->fetch_assoc())
			{
				$checkvol=$row['stuvol'];
				$chkblock=$row['blocked'];
			}
		  if($chkblock!=2)
		  {
			date_default_timezone_set("Asia/Muscat");
			$date1=$date2=date("Y-m-d H:i:s");
			$display=date("h:i a");
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$conn->set_charset('utf8mb4');
			$message= $conn -> real_escape_string(trim($_POST['message']));
			$sql2="SELECT * FROM messages 
			      WHERE (sender_name='$sender_name' AND receiver_name='$receiver_name' OR 
				 receiver_name='$sender_name' AND sender_name='$receiver_name' )  ORDER BY date_time DESC";
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$conn->set_charset('utf8mb4');
			$result2 = $conn->query($sql2);
			$hours=0;
			$int=0;
			if($result2)
			{
				while($row2=$result2->fetch_assoc())
				{
					date_default_timezone_set("Asia/Muscat");
					$newdate2=new DateTime($row2['date_time']);//important
					$newdate1=new DateTime(date("Y-m-d H:i:s"));
					$diff = $newdate1->diff($newdate2);
					$hours=(($diff->format('%a'))*24)+($diff->format('%h'));
					$int=(int)$hours;
					break;
					
				}
			}
					
			
			if($int>=4)
			{
				$sql4 ="SELECT * FROM users WHERE name='$receiver_name'";
				$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			//	$conn->set_charset('utf8mb4');
				$result4 = $conn->query($sql4);
				$teach=$stuvol=0;
				$email="";
				while($row4=$result4->fetch_assoc())
				{
					$teach=$row4["teacher"];
					$email=$row4["email"];
					$stuvol=$row4["stuvol"];
				}
				if($teach==1 || $stuvol==1)
				{
				
					//sending email
					require_once('PHPMailer/PHPMailerAutoload.php');
					$mail= new PHPMailer();
					$mail->isSMTP();
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='ssl';
					$mail->Host= 'smtp.gmail.com';
					$mail->Port='465';
					$mail->isHTML();
					$mail->Username='unravellingthoughtsgma@gmail.com';
					$mail->Password='unravellingthoughts2020';
					$mail->SetFrom('unravellingthoughtsgma@gmail.com');
					$mail->Subject='Unravelling Thoughts - New Message';
					$mail->Body= '<b>'.$name.'</b> is trying to reach you!';
					$mail->AddAddress($email);
			
					$mail->Send();
				}
			}
			$filterWords=array("suicide", "suicidal", "I feel nothing", "I feel empty", "I'm on edge", "I need help", "out of my mind", "I want to kill", "depressed");
			$WordCount=0;
			for($i=0;$i<count($filterWords); $i++)
			{
				
				if(strpos($message, $filterWords[$i]) !== false)
				{
					$sql4 ="SELECT * FROM users WHERE name='$receiver_name'";
					$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				//	$conn->set_charset('utf8mb4');
					$result4 = $conn->query($sql4);
					$teach=$stuvol=0;
					$email="";
					while($row4=$result4->fetch_assoc())
					{
						$teach=$row4["teacher"];
						$email=$row4["email"];
						$stuvol=$row4["stuvol"];
					}
					if($teach==1 || $stuvol==1)
					{
					$message1=str_replace("\'", "'", $message);
					$message1=str_replace("\\\"", "\"", $message);
					//sending email
					require_once('PHPMailer/PHPMailerAutoload.php');
					$mail= new PHPMailer();
					$mail->isSMTP();
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='ssl';
					$mail->Host= 'smtp.gmail.com';
					$mail->Port='465';
					$mail->isHTML();
					$mail->Username='unravellingthoughtsgma@gmail.com';
					$mail->Password='unravellingthoughts2020';
					$mail->SetFrom('unravellingthoughtsgma@gmail.com');
					$mail->Subject='Unravelling Thoughts - Urgent Message';
					$mail->Body= '<b>'.$name.'</b> may need immediate attention. <br><br>Message: <b>'.$message1.'</b>';
					$mail->AddAddress($email);
			
					$mail->Send();
					break;
					}
				}				
			}
			
			$sql="INSERT INTO messages(sender_name, receiver_name, message_text, date_time) VALUES('$sender_name','$receiver_name', '$message','$date1')";
			$result = $conn->query($sql);
			
			$sql_find_delvol="SELECT * FROM users WHERE name='$receiver_name'";
			$result_find_delvol=$conn->query($sql_find_delvol);
			$check_del=$check_vol=0;
			while($row_find_delvol=$result_find_delvol->fetch_assoc())
			{
				$check_del=$row_find_delvol['blocked'];
				$check_vol=$row_find_delvol['stuvol'];
				break;
			}
			if($check_del==3 && $check_vol==1)
			{
				$messagedel="This user has been deleted. Kindly contact another volunteer, counsellor, or teacher to continue the conversation.";
				date_default_timezone_set("Asia/Muscat");
				$date1=date("Y-m-d H:i:s");
				$sqldel="INSERT INTO messages(sender_name, receiver_name, message_text, date_time) VALUES('$receiver_name','$sender_name', '$messagedel','$date1')";
				$resultdel = $conn->query($sqldel);
			}
		  }
		}
		
		?>
		<div id="display-message">
		<script src="jquery.min.js"></script>
		<script>
	var vall = "<?php if(isset($_GET['user'])) { echo $_GET['user']; }  else echo ""?>";
	var val = "<?php echo $name; ?>";
	var loadmore="<?php if(isset($_GET['loadmore'])) { echo $_GET['loadmore']; } ?>";
	var val2=2;
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: "POST",
                url: "data.php?user="+vall+"&name="+val+"&loadmore="+loadmore,
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
		
		<div id="conversation-list">
		<script src="jquery.min.js"></script>
		<script>
	var suser = "<?php if(isset($_POST['search_user'])) { echo $_POST['search_user']; } ?>";
	var nam = "<?php echo $name; ?>";
	var use= "<?php if(isset($_GET['user'])) { echo $_GET['user'];} else echo "" ?>";
    var txt="";
		$("#search").keyup(function(){
			txt=$(this).val();
		});
	
	$(document).ready(function(){
		$("#search").keyup(function(){
			var txt=$(this).val();
		});
        function getData(){
            $.ajax({
				
                type: "POST",
                url: "data2.php?search_user="+suser+"&name="+nam+"&user="+use+"&search_user="+txt,
                success: function(data){
                    $("#conversation-list").html(data);

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
		
		<div id="chat-form">
		
		
		<form method="post" id="theFormID" >
			<input type="text" spellcheck="true" autofocus="autofocus" autocomplete="off" style="width:605px; margin-top:22px; position: relative;" placeholder="type a message" name="message" id="message">
			
			<input type="submit" value="Enter"  name="submit" id="sendButton">
		</form>
		
		
	<!--	<div class="record">	
			<button class="btn btn-primary" style="margin-left:35px;" id="record" type="button">Record</button>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/p5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/addons/p5.sound.js"></script>
		<script src="main.js"></script>
		</div>-->
		</div>
		
	</div>
	
</body>
</html>

