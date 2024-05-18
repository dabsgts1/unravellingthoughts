<span> 
<?php
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
session_start();
$name=$_GET['name'];

if (isset($_GET['user']) )
{
	$no=0;
	$user=$_GET['user'];
	$blocked=0;
	echo "<div class='head-title'>".$_GET['user']; 
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");//finding age
	$sql ="SELECT * FROM users WHERE name='$user' COLLATE Latin1_General_CS 
	AND stuvol='$no' AND teacher='$no'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		if($row['blocked']==2)
		{	
			$blocked=2;
		}
		echo "  <b style='font-size:19px;font-weight:normal;'> (".$row['age'].")</b>";			
	}
	echo "</div>";
	//checking if online or not
	$sql="SELECT * FROM users WHERE name='$user'";
	$result = $conn->query($sql);
	$seconds=$int=-1;
	while($row=$result->fetch_assoc())
	{
		date_default_timezone_set("Asia/Muscat");
		
		$newdate2=new DateTime($row['lastactivity']);//important
		$newdate1=new DateTime(date("Y-m-d H:i:s"));
		$diff = $newdate1->diff($newdate2);
		$seconds=(($diff->format('%a'))*24*60*60)+(($diff->format('%h'))*60*60)+(($diff->format('%i'))*60) + (($diff->format('%s')));
		$int=(int)$seconds;
		$blocked=$row['blocked'];
		break;	
	}
		//check if other user is online
	if ($_GET['user']!="" && $int<10 && $blocked!=2 && $blocked!=3)//CHECK IF ONLINE THEN YEA
	{
		echo "<b style='font-size: 12; color:#049419; margin-right:3px;'>⚫ </b><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'> online</b>";
	}
	else if($_GET['user']!="" && $_GET['user']!="Select a User" && $blocked!=2 && $blocked!=3)
	{
		echo "<b style='font-size: 12; color:#AA0000; margin-right:3px;'>⚫ </b><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'> offline</b>";
	}
	else if($blocked==2)
	{
		echo "<b style='font-size: 12; color:grey; margin-right:3px;'>⚫ </b><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'> blocked user</b>";
	}
	else if($blocked==3)
	{
		echo "<b style='font-size: 12; color:grey; margin-right:3px;'>⚫ </b><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'> deleted user</b>";
	}
}//🔴
				
			
if (!isset($_GET['user']) )
{
	 echo "Select a User</br><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'>Welcome!</b>";
}
if (isset($_GET['user']) && $_GET['user']=="" )
{
	 echo "Select a User</br><b style='font-size:13px;font-weight:normal; margin-top: -10px; color: grey;'>Welcome !</b>";
}
?></span>
			
<?php
if (isset($_GET['user'])   )//FOR WARNING/BLOCKING
{ 
	$r=$_GET['user']; 
	
	?>
	
	<div onclick="document.getElementById('warnblock').style.display='block'" id="warnblockcontainer" style="position:absolute; margin-left:632px;">
	<?php echo '<a href="#"></a>'; 
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql ="SELECT * FROM users WHERE name='$r' COLLATE Latin1_General_CS ";
	$sql2 ="SELECT * FROM users WHERE name='$name' COLLATE Latin1_General_CS ";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	$blocked=0;
	$chkSV=$chkT=$otherteach=$otherSV=0;
	while($row=$result->fetch_assoc())
	{
		$blocked=$row['blocked'];
		//checking if the other person is a teacher
		$otherteach=$row['teacher'];
		$otherSV=$row['stuvol'];
		break;
	}
	while($row2=$result2->fetch_assoc())
	{
		$chkSV=$row2['stuvol'];
		$chkT=$row2['teacher'];
		break;
	}
	
	$trashcheck=0;
	if($blocked==0 && (($chkT==1 && $otherteach==0) || ($chkT==0 && $chkSV==1 && $otherteach==0 && $otherSV==0)) && $_GET['user']!="" && $_GET['user']!="Select a User")
	{
		?> <img draggable="false" style="padding-top:23px; height:26px;" class="warnblock" title="Warn User" draggable="false" src="warning.png"></a><?php
		$trashcheck=1;
		require_once("warnblock.php");
	}
	else if($blocked==1 && (($chkT==1 && $otherteach==0) || ($chkT==0 && $chkSV==1 && $otherteach==0 && $otherSV==0)) && $_GET['user']!="" && $_GET['user']!="Select a User")
	{
		?><img draggable="false" style="padding-top:25px; height:23px;" class="warnblock" title="Block User" draggable="false" src="block1.png"></a><?php
		$trashcheck=1;
		require_once("warnblockB.php");
		
	}
	else if($blocked==2 && (($chkT==1 && $otherteach==0) || ($chkT==0 && $chkSV==1 && $otherteach==0 && $otherSV==0)) && $_GET['user']!="" && $_GET['user']!="Select a User")
	{
		?><img draggable="false" style="padding-top:25px; 510px; height:23px;" class="warnblock" title="Unblock User" draggable="false" src="block1.png"></a><?php
		$trashcheck=1;
		require_once("warnblockUN.php");
	}
			
				
			
	?>
	</div>
			
	<div onclick="document.getElementById('delete').style.display='block'" id="trashcontainer" style=" margin-left:655px;position:absolute; ">
	<?php echo '<a href="##"></a>';
	if($_GET['user']!="" && $_GET['user']!="Select a User")
	{
		if($trashcheck==0)
		{
			?>
			<img draggable="false" style="padding-top:21px;position:absolute; " class="trash" title="Delete" draggable="false" src="trashcan.png">
			</a>
			<?php 
			require_once("delete.php");
		}
		else
		{
			?>
			&nbsp;<img draggable="false" style="padding-top:21px;position:absolute;"  class="trash" title="Delete" draggable="false" src="trashcan.png">
			</a>
			<?php 
			require_once("delete.php");	
		}
	}
}
?>
</div>