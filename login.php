<?php
	session_start();
	
?>
<html>
<head><title>Unravelling Thoughts - Login</title>
	<link rel="stylesheet" href="styleErr2.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
</body>
</html>
<div class="tile">
<?php
//LOGGING IN
$name=$_POST['name'];

$_SESSION["password"]=md5($_POST['password']);
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$conn->set_charset('utf8mb4');
if($name && $_SESSION["password"])
{
	$sql ="SELECT * FROM users WHERE name='$name' ";
	$result = $conn->query($sql);

	if($result->num_rows != 0)
	{
		while($row = $result->fetch_assoc())
		{
			$dbname=$row["name"];
			$dbpassword=$row["password"];
			$t=$row["teacher"];
			$s=$row["stuvol"];
			$block=$row['blocked'];
		}
		if($dbpassword==$_SESSION["password"] && $block!=2 && $block!=3)
		{
			$n=1;
			$_SESSION["name"]=$dbname;	
			if($n==$t)
			{
				header("location: selectpageTeach.php");	
												
			}
			else if($n==$s)
			{
				header("location: selectpageVol.php");			
			}
			else if($t==2)
			{
				header("location: selectpageadmin.php");			
			}
			else
			{
				header("location: selectpageStud.php");			
			}
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$zero=0; $two=2;
			$sql1="SELECT * FROM views WHERE id='$two'";
			$result1=$conn->query($sql1);
			$count=0;
			$id=1;
			$numrows=$result1->num_rows;
			if($numrows==0)
			{
				$sql2="INSERT INTO views (id, count) VALUES ('$two', '$id')";
			}
			else
			{
				while($row=$result1->fetch_assoc())
				{
					$count=$row['count'];
				}
				$count++;
				$sql="UPDATE views SET count='$count' WHERE id='$two'";
				$result2=$conn->query($sql);
			}
		}
		else if($block==2)
		{
			echo "<h2>ERROR</h2>";
			echo "&emsp; <b style='margin-left:-20px;'>This user was blocked for </br></b><b>inappropriate behavior.</b><br>";
			include ("links2.php");
		}
		else if($block==3)
		{
			echo "<h2>ERROR</h2>";
			echo "&emsp; <b style='margin-left:-20px;'>This user was deleted.</b>";
			include ("links2.php");
		}
		else
		{
			echo "<h2>ERROR</h2>";
			echo "&emsp; <b>Password is incorrect.</b><br>";
			include ("links2.php");
		}
				
	}
	else
	{
		echo "<h2>ERROR</h2><br>";
		echo "&emsp; <b>Name is incorrect or you are not registered.</b><br>";
		include ("links2.php");
	}


}
else
{
	echo "<h2>ERROR</h2>";
	echo "&emsp; <b>Name & Password are required.</b><br>";
	include ("links2.php");
}

?>