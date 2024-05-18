
<div id="new-message">
	<p class="m-header">New Message</p>
	<p class="m-body">
	<form action="contactnewuser.php" method="get">
	<input type="text" value="<?php echo $_GET['user'];?>" name="user" style="display:none;">
	<input class="new-user-select" type="text" autocomplete="off"   placeholder="Enter Username" name="username" id="user_name" ></br></br></br></br>
		<input class="M" type="text" autocomplete="off"  placeholder="Message" name="message" id="user_name" ></br>
		   </br>
	
	
	<b class="svtext"><u>Student Volunteers: (Select a User)</b></u></br></br>
	<div class="name-text">
	<?php 
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$no=1;
	$sql ="SELECT * FROM users WHERE stuvol='$no'";
	$result = $conn->query($sql);
	$small1=$small2=$small3="";
	$s1=$s2=$s3=0;
	$count1=0;
	$id1=$id2=$id3=0;
	while($row=$result->fetch_assoc())
	{
		if($count1==0)
		{
			$small1=$row['name'];
			$id1=$row['id'];
			$s1=$row['numchk'];
			$count1++;
		}
		if($row['name']!=$name && $s1>=$row['numchk'])
		{
			$small1=$row['name'];
			$id1=$row['id'];
			$s1=$row['numchk'];
		}
	}
	echo $small1;
	echo nl2br(" \n");
	
	$result2 = $conn->query($sql);
	while($row2=$result2->fetch_assoc())
	{
		if($count1==1 && $row2['id']!=$id1)
		{
			$small2=$row2['name'];
			$id2=$row2['id'];
			$s2=$row2['numchk'];
			$count1++;
		}
		if($row2['name']!=$name && $row2['id']!=$id1 && $s2>=$row2['numchk'])
		{
			$small2=$row2['name'];
			$id2=$row2['id'];
			$s2=$row2['numchk'];
		}
	}
	echo $small2;
	echo nl2br(" \n");
	$result3 = $conn->query($sql);
	while($row3=$result3->fetch_assoc())
	{
		if($count1==2 && $row3['id']!=$id1 && $row3['id']!=$id2 )
		{
			$small3=$row3['name'];
			$id3=$row3['id'];
			$s3=$row3['numchk'];
			$count1++;
		}
		if($row3['name']!=$name && $row3['id']!=$id1 && $row3['id']!=$id2 && $s3>=$row3['numchk'])
		{
			$small3=$row3['name'];
			$id3=$row3['id'];
			$s3=$row3['numchk'];
		}
	}
	
	echo $small3;
	echo nl2br(" \n");
	?>
	</div>	
	<br/>
	<b class="svtext"><u>Counsellors: (Select a User)</b></u></br></br>
	<div class="name-text">
	<?php 
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$no=1;
	$sql ="SELECT * FROM users WHERE teacher='$no'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		if($row['name']!=$name)
		{echo $row['name'];
		echo nl2br(" \n");}
	}
	?>
	</div>	
	
	<?php 
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sqlT="SELECT * FROM users WHERE name='$name'";
	$resultT=$conn->query($sqlT);
	$teach=0;
	while($row=$resultT->fetch_assoc())
	{
		$teach=$row['teacher'];
		break;
	}
	if($teach==1)
	{
		?> 
		<br/>
		<b class="svtext"><u>Students: (Select a User)</b></u></br></br>
		
		<div class="name-text">
		<?php
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$no=0;
		$sql ="SELECT * FROM users WHERE teacher='$no' AND stuvol='$no'";
		$result = $conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			if($row['name']!=$name)
			{
				echo $row['name'];
				echo nl2br(" \n");
			}
		}
		?>
		</div>	
		<?php
	}
	?>
	
	
	<input type="submit" class="S" value="Message" name="messageB">
	<input type="submit" class="S"  name="cancel" value="Cancel"/>
		</form>
	</p>
	
</div>	





