<html>
<head><title>Unravelling Thoughts</title>
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

	 $acode = $_POST['acode'];
	 
	if(empty($acode))
		{
			echo "<h2>ERROR</h2>";
			echo "&emsp;<b>Access Code is required.</b> <br />";
			include ("links2.php");
		}
	elseif($acode)
		{
			$truecodeSTU="stuvol865";
			$truecodeTEA="teacoun832";
			$truecodeADMIN="admin23646";
				if($acode==$truecodeSTU)
				{
					header("location: registration2.php");	
					
				}
				else if($acode==$truecodeTEA)
				{
					header("location: registration3.php");	
					
				}
				else if ($acode==$truecodeADMIN)
				{
					header("location: registration4.php");	
				}
				else
				{
					echo "<h2>ERROR</h2>";
					echo "&emsp;<b>Access Code is incorrect</b> <br />";
					include ("links2.php");
				}
				
		}
?>
<br/>
<div class="links">
<p><a href="javascript:history.go(-1)">BACK</a> 
&nbsp;
<a href="home.php">LOG IN</a> 