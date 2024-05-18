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
<title>Unravelling Thoughts - New Post</title>
	<link rel="stylesheet" href="stylep11.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
<header><div class="nagbar">
	
		<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img src="logotextblue2.png" style="width:200px; height:39px;">
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
</body>
</html>
<div class="tile">
<?php 
if(isset($_POST['submit']) && isset($_POST['posttitle']) && $_POST['tagselect']!="Tag (required)" && $_POST['posttitle']!="" && trim($_POST['posttitle'])!="")
{
	$question=$_POST['posttitle'];
	$question=str_replace("\\", "\\\\", $question); 
	$question=str_replace("'", "\'", $question); 
	$desc="";
	if (isset($_POST['detail']) && $_POST['detail']!="" )
		$desc=$_POST['detail'];
	$desc=str_replace("\\", "\\\\", $desc); 
	$desc=str_replace("'", "\'", $desc); 
	$tag=$_POST['tagselect'];
	$tag2="";
	if($tag=="Anxiety")
		$tag2="anxiety";
	else if($tag=="Relationships")
		$tag2="relat";
	else if($tag=="Study Skills")
		$tag2="study";
	else if($tag=="Emotions")
		$tag2="emo";
	else if($tag=="Stress")
		$tag2="stress";
	else if($tag=="Sadness/Loneliness")
		$tag2="sad";
	else if($tag=="Self-esteem")
		$tag2="self";
	else if($tag=="Other")
		$tag2="other";
	date_default_timezone_set("Asia/Muscat");
	$date=date("Y-m-d H:i:s");
	$age="";
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql1="SELECT * FROM users WHERE name='$name'";
	$result1=$conn->query($sql1);
	while($row1=$result1->fetch_assoc())
	{
		$age=$row1['age'];
		break;
	}
	$censor=0;
	$filterWords=array("fuck", " cunt ", " dick ");
	for($i=0; $i<count($filterWords); $i++)
	{
		if(strpos(strtolower($question), $filterWords[$i]) !== false || strpos(strtolower($desc), $filterWords[$i]) !== false)
			$censor=1;
	}
	
	
	$connPOST = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$connPOST->set_charset('utf8mb4');
	
	$sql2="INSERT INTO posts (name, question, date, detail, tag, age, censor) VALUES ('$name', '$question', '$date', '$desc', '$tag', '$age', '$censor')";
	$result2=$connPOST->query($sql2);
	if($age=="15 to 18")
		$age="58";
	else if($age=="12 to 14")
		$age="24";
	else if($age=='0')
		$age="all";
	$tagchk=$_POST['tagchk'];
	if($result2)
	{
		
		header("location: askandans.php?tag=$tagchk&age=$age");
	}
	else
	{
		echo "<h3 style='margin-top:60px; '><b><br/>Submission failed.</br>Invalid characters</br>(', \", \)</h3></b>	<a style='color:#6a6a6a; bottom:-30px; position:relative;' href='askandans.php?tag=$tagchk&age=$age'>BACK</a>"; 
	}
	$conn->close();
	
}
else if(isset($_POST['submit']))
{
	$agechk=$_POST['agechk'];
	$tagchk=$_POST['tagchk'];
	$err1=$err2="0";
	$q=$_POST['posttitle'];
	$d=$_POST['detail'];
	$tagselectval=$_POST['tagselect'];
	if($_POST['posttitle']=="" || trim($_POST['posttitle'])=="")
	{
		$err1=1;
	}
	if($_POST['tagselect']=="Tag (required)")
	{
		$err2=1;
	}	
	if($err1!="0" || $err2!="0")
		header("location: askandans.php?tag=$tagchk&age=$agechk&err1=$err1&err2=$err2&q=$q&d=$d&tagselectval=$tagselectval");
	else	
		header("location: javascript:history.go(-1)");
}

?>
<br/>
