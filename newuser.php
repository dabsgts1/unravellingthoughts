<html>
<head><title>Unravelling Thoughts - Register</title>
	<link rel="stylesheet" href="styleErr2.css">
    <link href="font.css" rel="stylesheet">
<link rel="icon" type="image/png" href="transparent3.png"/>
</head>
<body style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">

</body>
</html>
<div class="tile">
<?php 
//REGISTERING USER
	 if(!isset($_POST['answer1']) || !isset($_POST['answer2']) || !isset($_POST['answer3']))
	 {
		 header("location: javascript:history.go(-1)");
	 }
	 else if(trim($_POST['answer1'])==" " || trim($_POST['answer2'])==" " || trim($_POST['answer3'])==" " || $_POST['answer1']=="" || $_POST['answer2']=="" || $_POST['answer3']=="")
	 {
		 header("location: javascript:history.go(-1)");
	 }
	 else
	 {
		$id1=$_POST['id1'];//id of the question
		$id2=$_POST['id2'];
		$id3=$_POST['id3'];
		$answer1=$_POST['answer1'];
		$answer2=$_POST['answer2'];
		$answer3=$_POST['answer3'];
		$sqlA1="SELECT * FROM questions WHERE answer LIKE '%$answer1%' AND id='$id1'";
		$sqlA2="SELECT * FROM questions WHERE answer LIKE '%$answer2%' AND id='$id2'";
		$sqlA3="SELECT * FROM questions WHERE answer LIKE '%$answer3%' AND id='$id3'";
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$resultA1=$conn->query($sqlA1);
		$resultA2=$conn->query($sqlA2);
		$resultA3=$conn->query($sqlA3);
		$right=$resultA1->num_rows + $resultA2->num_rows + $resultA3->num_rows;
		
		if($right==3)
		{
			$name = $_POST['name'];
			$password = $_POST['password'];
			$age=$_POST['age'];
			$passwordmd5=md5($password);
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql="INSERT INTO users(name, password, age) VALUES('$name','$passwordmd5', '$age')";
			if ($conn->query($sql) === TRUE) 
			{
				echo "<h3><b><br/>You are now registered.</br>Kindly keep your password safe</br>as it cannot be changed.</h3></b>";
				?>
				<a style="bottom:-2px; margin-left:-20px; position:absolute;" href="home.php">LOG IN</a> 
				<?php
				die();
			}
		}
		else
		{
			echo "<h3><b><br/>Sorry, you answered incorrectly.</h3></b><br/>";
			include ("links4.php");
			die();
		}
	 }	
$conn->close();
?>