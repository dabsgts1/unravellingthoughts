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
		Unravelling Thoughts - Details
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
<link rel="stylesheet" href="web2.css">
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
			
 <div class="details">
 <div class="innerdetails" id="innerdetails">
	<?php
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sqlUSERS="SELECT * FROM users";
		$resultUSERS=$conn->query($sqlUSERS);
		$users=$resultUSERS->num_rows;

		echo "<h2 style='color:#595959; font-size:21px; line-height:42px; position:absolute; margin-left:50px; margin-top:30px;'>";
		
		echo "Total Users: <b style='color:#0048aa; position:absolute; right:0px;'>".$users."</b>";
		echo nl2br(" \n");
		
		$one=1; $zero=0; $two=2; $three=3;
		
		$sqlS="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$zero'";
		$resultS=$conn->query($sqlS);
		$students=$resultS->num_rows;
		echo "Students: <b style='color:#0048aa; position:absolute; right:0px;'>".$students."</b>";
		echo nl2br(" \n");
		
		$sqlV="SELECT * FROM users WHERE stuvol='$one' AND teacher='$zero'";
		$resultV=$conn->query($sqlV);
		$volunteers=$resultV->num_rows;
		echo "Student Volunteers: <b style='color:#0048aa; position:absolute; right:0px;'>".$volunteers."</b>";
		echo nl2br(" \n");
		
		$sqlTC="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$one'";
		$resultTC=$conn->query($sqlTC);
		$teacoun=$resultTC->num_rows;
		echo "Teachers/Counsellors: <b style='color:#0048aa; position:absolute; right:0px;'>".$teacoun."</b>";
		echo nl2br(" \n");
		
		$sqlA="SELECT * FROM users WHERE stuvol='$zero' AND teacher='$two'";
		$resultA=$conn->query($sqlA);
		$admins=$resultA->num_rows;
		echo "Administrators: <b style='color:#0048aa; position:absolute; right:0px;'>".$admins."</b>";
		echo nl2br(" \n");
		
		$sqlNS="SELECT * FROM users WHERE blocked='$zero'";
		$resultNS=$conn->query($sqlNS);
		$nostrikes=$resultNS->num_rows;
		echo "No-Strikes Users: <b style='color:#0048aa; position:absolute; right:0px;'>".$nostrikes."</b>";
		echo nl2br(" \n");
		
		$sqlW="SELECT * FROM users WHERE blocked='$one'";
		$resultW=$conn->query($sqlW);
		$warn=$resultW->num_rows;
		echo "Warned Users: <b style='color:#0048aa; position:absolute; right:0px;'>".$warn."</b>";
		echo nl2br(" \n");
		
		$sqlB="SELECT * FROM users WHERE blocked='$two'";
		$resultB=$conn->query($sqlB);
		$blocked=$resultB->num_rows;
		echo "Blocked Users: <b style='color:#0048aa; position:absolute; right:0px;'>".$blocked."</b>";
		echo nl2br(" \n");
		
		$sqlD="SELECT * FROM users WHERE blocked='$three'";
		$resultD=$conn->query($sqlD);
		$del=$resultD->num_rows;
		echo "Deleted Users: <b style='color:#0048aa; position:absolute; right:0px;'>".$del."</b>";
		echo nl2br(" \n");
		
		echo "Website Creator: <b style='color:#0048aa; position:absolute; display:contents;'>&emsp;&nbsp;Diya Bansal</b>";
		echo nl2br(" \n");
		
	?>
</h2></div>
<div class="innerdetails2" id="innerdetails2">
<?php
		echo "<h2 style='color:#595959; font-size:21px; line-height:42px; position:absolute; margin-left:30px; margin-top:30px;'>";

		$sqlP="SELECT * FROM posts";
		$resultP=$conn->query($sqlP);
		$posts=$resultP->num_rows;
		echo "Total Posts: <b style='color:#0048aa; position:absolute; right:-52px;'>".$posts."</b>";
		echo nl2br(" \n");
		
		$sqlPC="SELECT * FROM posts WHERE censor='$one'";
		$resultPC=$conn->query($sqlPC);
		$postsC=$resultPC->num_rows;
		echo "Censored Posts: <b style='color:#0048aa; position:absolute; right:-52px;'>".$postsC."</b>";
		echo nl2br(" \n");
		
		$sqlC="SELECT * FROM comments";
		$resultC=$conn->query($sqlC);
		$comments=$resultC->num_rows;
		echo "Total Comments: <b style='color:#0048aa; position:absolute; right:-52px;'>".$comments."</b>";
		echo nl2br(" \n");
		
		$sqlCC="SELECT * FROM comments WHERE censor='$one'";
		$resultCC=$conn->query($sqlCC);
		$commentsC=$resultCC->num_rows;
		echo "Censored Comments: <b style='color:#0048aa; position:absolute; right:-52px;'>".$commentsC."</b>";
		echo nl2br(" \n");
		
		$sqlM="SELECT * FROM messages";
		$resultM=$conn->query($sqlM);
		$messages=$resultM->num_rows;
		echo "All Messages (Private): <b style='color:#0048aa; position:absolute; right:-52px;'>".$messages."</b>";
		echo nl2br(" \n");
		
		$sqlCV="SELECT * FROM chatroomvol";
		$resultCV=$conn->query($sqlCV);
		$messagesCV=$resultCV->num_rows;
		echo "Messages (Volunteers Chatroom): <b style='color:#0048aa; position:absolute; margin-left:40px;'>".$messagesCV."</b>";
		echo nl2br(" \n");
		
		$sqlRV="SELECT * FROM review";
		$resultRV=$conn->query($sqlRV);
		$review=$resultRV->num_rows;
		echo "Experiences Submitted: <b style='color:#0048aa; position:absolute; right:-52px;'>".$review."</b>";
		echo nl2br(" \n");
		
		$sqlRQ="SELECT * FROM requests";
		$resultRQ=$conn->query($sqlRQ);
		$requests=$resultRQ->num_rows;
		echo "Requests Sent: <b style='color:#0048aa; position:absolute; right:-52px;'>".$requests."</b>";
		echo nl2br(" \n");
		
		$sqlL="SELECT * FROM views WHERE id='$two'";
		$resultL=$conn->query($sqlL);
		$login=0;
		while($rowL=$resultL->fetch_assoc())
		{
			$login=$rowL['count'];
		}
		echo "Number of Log-ins: <b style='color:#0048aa; position:absolute; right:-52px;'>".$login."</b>";
		echo nl2br(" \n");
		
		$sqlView="SELECT * FROM views WHERE id='$one'";
		$resultView=$conn->query($sqlView);
		$num=0;
		while($rowView=$resultView->fetch_assoc())
		{
			$num=$rowView['count'];
		}
		echo "Number of Views: <b style='color:#0048aa; position:absolute; right:-52px;'>".$num."</b>";
		echo nl2br(" \n");
?></h2>
</div>
</div>
</body>
</html>


