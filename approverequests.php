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
			Unravelling Thoughts - Requests
		</title>
		<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
		<script src="jquery-3.3.1.min.js"></script>	
		<link rel="stylesheet" href="requests4.css">
		<link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
	</head>
	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header>
			<div class="nagbar">
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
		</div>
	</header>
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
</body>

<div class="buttons"></br>
	<form method="post">
		<input type="submit" name="dallR" value="All Requests" style="<?php if (!isset($_POST['pending']) && !isset($_POST['accepted']) && !isset($_POST['deny'])) echo 'opacity:0.6;';?>">
		<input type="submit" name="pending" value="Pending Requests" style="<?php if (isset($_POST['pending'])) echo 'opacity:0.6;';?>">
		<input type="submit" name="accepted" value="Accepted Requests" style="<?php if (isset($_POST['accepted'])) echo 'opacity:0.6;';?>">
		<input type="submit" name="deny" value="Denied Requests" style="<?php if (isset($_POST['deny'])) echo 'opacity:0.6;';?>">
		
	</form>
</div>
<?php 
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$pend="Pending";
$accept="Accepted";
$denied="Denied";
if(isset($_POST['pending']))
{	
	$sql1 = "SELECT * from requests WHERE status='$pend' ORDER BY id DESC";
	echo "<h2 style='margin-left:690px; margin-top:70px; margin-bottom:-20px; color:#f4f4f4;width:200px; position:absolute;'><i>Pending Requests:</i></h2><br/>";
}
else if(isset($_POST['accepted']))
{
	$sql1 = "SELECT * from requests WHERE status='$accept' ORDER BY id DESC";
	echo "<h2 style='margin-left:690px; position:absolute; margin-top:70px; margin-bottom:-20px;width:250px; color:#f4f4f4;'><i>Accepted Requests:</i></h2><br/>";
}
else if(isset($_POST['deny']))
{
	$sql1 = "SELECT * from requests WHERE status='$denied' ORDER BY id DESC";
	echo "<h2 style='margin-left:700px; position:absolute;  margin-top:70px; margin-bottom:-20px;width:200px; color:#f4f4f4;'><i>Denied Requests:</i></h2><br/>";
}
else
{
	$sql1 = "SELECT * from requests ORDER BY id DESC";
	echo "<h2 style='margin-left:720px; position:absolute;  margin-top:70px; margin-bottom:-20px; width:200px; color:#f4f4f4;'><i>All Requests:</i></h2><br/>";
}
$sqlV = $sql1;
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
$sql1=$sql1." LIMIT $start, $per_page";


$result1 = $conn->query($sql1);
$count=$result1->num_rows;
echo "</br><table width=\"60%\"  border=2>";
echo "<tr style='color: white !important;'>
<td  bgcolor=\"0048aa\"><b>Requested By</td>
<td class='td2' bgcolor=\"0048aa\"><b>To View Conversations Between</td>
<td class='td2' bgcolor=\"0048aa\"><b>Status</td></tr>";
while($row1 = $result1->fetch_assoc())
{
	$id=$row1['id'];
	$name=$row1['name'];
	$username1=$row1['username1'];
	$username2=$row1['username2'];
	$status=$row1['status'];
	$users=$username1." & ".$username2;
	if($status=="Pending")
	{
		echo "<tr >
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$name</a></td>
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$users</a></td>
	<td><a style='color:#DC7617 !important;' href=\"approverequests2.php?id=$id\">
	$status</a></td></tr>";	
	}
	else if($status=="Accepted")
	{
		echo "<tr >
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$name</a></td>
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$users</a></td>
	<td><a style='color:#13AA2C !important;' href=\"approverequests2.php?id=$id\">
	$status</a></td></tr>";	
	}
	else if($status=="Denied")
		{
		echo "<tr >
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$name</a></td>
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$users</a></td>
	<td><a style='color:#C51919 !important;' href=\"approverequests2.php?id=$id\">
	$status</a></td></tr>";	
	}
	else
		{
		echo "<tr >
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$name</a></td>
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$users</a></td>
	<td><a id='aID' href=\"approverequests2.php?id=$id\">
	$status</a></td></tr>";	
	}
}
echo "</table>";
$conn->close(); 
$prev=$page-1;
	$next=$page+1;
	?> 

</br></br><div class="pagination" style=" position: absolute; margin-left: 410px;  width:200px; font-size:15px; font-weight:normal;"> 
<b style="font-size:18px; margin-top:70px; position:absolute; font-family:Arial; font-weight:normal;">
	<?php
	if ($page>1)
	{
		echo "<a href='approverequests.php?page=$prev'><</a>&nbsp;"; // if we are on page 1, then prev button should not show up
	}
	else if($count!=0)
	{
		echo "<a class='than-signs' style='opacity:0.5;'><</a>&nbsp;";
	}
	if ($pages >= 1) 
	{
		
		for($x=1; $x<=$pages; $x++)
		{
			if ($x == $page)
			{  // bold the page number which shows up. Note that $page = $_GET['page']
					echo '<a style="font-weight:bold;" href="?page='.$x.'"> '.$x.'</a>'; 
			} 
			else 
			{
				echo '<a href="?page='.$x.'"> '.$x.'</a>'; // echo a link. variable page is assigned to $x, followed by concatenating remaining values in a loop
			}
		}
		if ($page != $pages)
		{ // if you are on the last page, then next button should not be there
			echo "&ensp;&nbsp;<a href='approverequests.php?page=$next'>></a>";
		}
		else
		{
			echo "&ensp;<a class='than-signs' style='opacity:0.5;'>></a>";
		}
		?></b><?php
	}
?>
</div>
<br/>
</html>