<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];

?>
<html>
<head><title>Unravelling Thoughts - Request</title>
	<link rel="stylesheet" href="stylep11.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
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
							if($n==$t)
							{
								echo "<li><a href='selectpageTeach.php'  				>HOME	</a></li>";
							}
							else if($t==2)
							{
								echo "<li><a href='selectpageadmin.php'  				>HOME	</a></li>";
							}
							else if($s==1 && $t==0)
							{
								echo "<li><a href='selectpageVol.php'  				>HOME	</a></li>";
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
</body>
</html>
<div class="tile">
<?php 
$username1=$_POST['username1'];
$username2=$_POST['username2'];
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
if(empty($username1) || empty($username2) || trim($username1)==" " || trim($username2)==" ")
{
	header("location: javascript:history.go(-1)");
}
else if($username1==$name || $username2==$name)
{
	echo "<h2>ERROR</h2>";
	echo "&emsp;<b>You cannot enter your username.</b><br />";
	echo "<a style='color:#6a6a6a; bottom:-120px; position:relative;' href='javascript:history.go(-1)'>BACK</a>"; 
}
else
{
	$sqlfind="SELECT * FROM users WHERE name='$username1' OR name='$username2'";
	$resultfind=$conn->query($sqlfind);
	$count=$resultfind->num_rows;
	if($count!=2)
	{
		echo "<h2>ERROR</h2>";
		echo "&emsp;<b>Incorrect users entered.</b><br />";
		echo "<a style='color:#6a6a6a; bottom:-120px; position:relative;' href='javascript:history.go(-1)'>BACK</a>"; 
	}
	else
	{
		$a="Accepted";
		$sqlcheck="SELECT * FROM requests WHERE name='$name' AND (username1='$username1' OR username1='$username2') AND (username2='$username1' OR username2='$username2')";
		$resultcheck=$conn->query($sqlcheck);
		if($resultcheck->num_rows>0)
		{
			echo "<h2>Request already</br>sent.</h2>";
			echo "<a style='color:#6a6a6a; bottom:-110px; position:relative;' href='viewconversations.php'>BACK</a>";
		}
		else
		{
			$status="Pending";
			$sqlR ="INSERT INTO requests (name, username1, username2, status) VALUES ('$name', '$username1', '$username2', '$status')";
			$resultR = $conn->query($sqlR);
			if ($resultR) 
			{
				header("location: viewconversations.php");
			}
			else
			{
				echo "<h2>ERROR</h2>";
				echo "&emsp;<b>Request failed.</br>Check usernames entered.</b><br />";
				//echo "&emsp;<b>One of the users is incorrect.</b><br />";
				echo "<a style='color:#6a6a6a; bottom:-100px; position:relative;' href='javascript:history.go(-1)'>BACK</a>"; 
			}
		}
	}
}
$conn->close();
?>
<br/>
