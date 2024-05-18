	<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];

?><html>
	<head>
	<title>Unravelling Thoughts - Requests</title>
	<link rel="icon" type="image/png" href="transparent3.png"/>
<link rel="stylesheet" href="viewconvo7.css">
    <link href="font.css" rel="stylesheet">
	
	</head>
	
	<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
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
			<li><a href="logout.php"  				>LOG OUT	</a></li>
				</ul>
			
		</nav>
		</div></header>

<br/>
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
//VIEWING reviews IN A TABLE
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$zero=0;
$sqlV = "SELECT * from requests WHERE name='$name' ORDER BY id DESC";
$resultV = $conn->query($sqlV);
$count=$resultV->num_rows;
$page=1;
if(isset($_GET['page']))
{
	$page=$_GET['page'];
}
$per_page=20;
$start=($page-1)*$per_page;
$pages=ceil($count/$per_page);
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$sqlV2="SELECT * FROM requests ORDER BY id DESC LIMIT $start, $per_page";//
$resultV2=$conn->query($sqlV2);
$count=$resultV2->num_rows;


if($count!=0)
{
	echo "<table width=\"55%\"  align=left border=2>";
	//<td width=\40%\"  align=center bgcolor=\"FF8080\"><b>ID</td>
	echo "<tr style='color: white !important;'>
	<td   bgcolor=\"0048aa\"><b>Username 1</td>
	<td class='td2'  bgcolor=\"0048aa\"><b>Username 2</td>
	<td class='td2'  bgcolor=\"0048aa\"><b>Status</td></tr>";
	while($rowV2 = $resultV2->fetch_assoc())
	{
		$id=$rowV2['id'];
		$username1=$rowV2['username1'];
		$username2=$rowV2['username2'];
		$status=$rowV2['status'];
		if($status=="Accepted")
		{ 
			echo "<tr style='color: dimgrey;'>
			<td><a id='aID' href=\"displayconvo.php?id=$id\">
			$username1</a></td>
			<td><a id='aID' href=\"displayconvo.php?id=$id\">
			$username2</a></td>
			<td><a style='color:#13AA2C !important;' href=\"displayconvo.php?id=$id\">
			$status</a></td></tr>";	
		}
		else if($status=="Denied")
		{
			echo "<tr style='color: dimgrey;'>
			<td>$username1</td>
			<td>$username2</td>
			<td style='color:#C51919 !important;'>$status</td></tr>";	
		}
		else if($status=="Pending")
		{
			echo "<tr style='color: dimgrey;'>
			<td>$username1</td>
			<td>$username2</td>
			<td style='color:#DC7617 !important;'>$status</td></tr>";
		}
		else
		{
			echo "<tr style='color: dimgrey;'>
			<td>$username1</td>
			<td>$username2</td>
			<td>$status</td></tr>";			
		}
	}
	echo "</table>";
	$prev=$page-1;
	$next=$page+1;
	?> 

<div class="pagination" style="margin-left:95px; position: absolute; font-size:15px; font-weight:normal;"> 
<b style="font-size:18px;  font-family:Arial; font-weight:normal;">
	<?php
	if ($page>1)
	{
		echo "<a style='color:white !important;' href='viewconversations.php?page=$prev'><</a>&nbsp;"; // if we are on page 1, then prev button should not show up
	}
	else if($count!=0)
	{
		echo "<a style='color:white !important;' class='than-signs' style='opacity:0.5;'><</a>&nbsp;";
	}
	if ($pages >= 1) 
	{
		
		for($x=1; $x<=$pages; $x++)
		{
			if ($x == $page)
			{  // bold the page number which shows up. Note that $page = $_GET['page']
					echo '<a style="font-weight:bold; color:white !important;" href="?page='.$x.'"> '.$x.'</a>'; 
			} 
			else 
			{
				echo '<a style="color:white !important;" href="?page='.$x.'"> '.$x.'</a>'; // echo a link. variable page is assigned to $x, followed by concatenating remaining values in a loop
			}
		}
		if ($page != $pages)
		{ // if you are on the last page, then next button should not be there
			echo "&ensp;<a style='color:white !important;' href='viewconversations.php?page=$next'>></a>";
		}
		else
		{
			echo "&ensp;<a style='color:white !important;' class='than-signs' style='opacity:0.5;'>></a>";
		}
		?></b><?php
	}
?>
</div>
<?php
}

$conn->close(); 
?><br/>

	<?php
	// REGISTERATION CODE
	$username1=$username2="";
	
	?>
	
	<div class="send-request">
		<form method="post" action="newrequest.php">
			<h2 style="color: #6a6a6a; margin-left:25px; margin-top:35px;"><i>Send a Request:</i></h2>
			<input type="text" placeholder="Username 1" name="username1" value="<?php echo $username1;?>">
			<input type="text" placeholder="Username 2" name="username2" value="<?php echo $username2;?>">	
			<input type="submit" name="submitreuqest" value="Send Request" style="font-size:1.1rem;">
		</form>
	</div>
	
</body>
</html> 