<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: logout.php");	
	}
	$name=$_SESSION['name'];
	$myage="";
	$zero=0;
	$t=$s=0;
	$deleteid=0;
	$idtodelete=0;
		
	
?>
<html>
	<head>
	
		<title>
			Unravelling Thoughts - Ask & Answer
		</title>
		<link rel="icon" type="image/png" href="transparent3.png"/>
		<link rel="stylesheet" href="publicforum17.css">
		<link href="font.css" rel="stylesheet">
		<link href="//db.onlinewebfonts.com/c/1fed4454352f201d52b65ca5480afb2d?family=Playlist" rel="stylesheet" type="text/css"/>
	</head>
	<body   style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
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
									$myage=$row['age'];
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
			</div>
		</header>
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
	<script>
	var one=2;
	function auto_reload()
	{
			if(one!=0) {
				window.location.reload();
				one=one-1;
			}
	}
	</script>
	<?php
		if(!isset($_GET['tag']))
			header("location: askandans.php?tag=all&age=all");
		
		$age=$tag="";
		if(isset($_GET['age']))
			$age=$_GET['age'];
		if(isset($_GET['tag']))
			$tag=$_GET['tag'];
	?>
	
	<div class="category">
		<h3 style="margin-left:40px; font-weight:bold; font-size:20px; text-decoration:underline; margin-top:30px;color:#0048aa; margin-bottom:30px;">Categories:</h2>
		
		<a href="askandans.php?tag=all&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px; <?php if(isset($_GET['tag']) && $_GET['tag']=='all') echo 'font-weight:bold !important;';?>">All</a></br>
		<a href="askandans.php?tag=anxiety&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;<?php if(isset($_GET['tag']) && $_GET['tag']=='anxiety') echo 'font-weight:bold !important;';?>">Anxiety</a></br>
		<a href="askandans.php?tag=relat&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px; <?php if(isset($_GET['tag']) && $_GET['tag']=='relat') echo 'font-weight:bold !important;';?>">Relationships</a></br>
		<a href="askandans.php?tag=study&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='study') echo 'font-weight:bold !important;';?>">Study Skills</a></br>
		<a href="askandans.php?tag=emo&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='emo') echo 'font-weight:bold !important;';?>">Emotions</a></br>
		<a href="askandans.php?tag=stress&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px; <?php if(isset($_GET['tag']) && $_GET['tag']=='stress') echo 'font-weight:bold !important;';?>">Stress</a></br>
		<a href="askandans.php?tag=sad&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='sad') echo 'font-weight:bold !important;';?>">Sadness/Loneliness</a></br>
		<a href="askandans.php?tag=self&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='self') echo 'font-weight:bold !important;';?>">Self-esteem</a></br>
		<a href="askandans.php?tag=other&age=<?php echo $age?>" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='other') echo 'font-weight:bold !important;';?>">Other</a></br></br>
		<a href="askandans.php?tag=my&age=<?php echo $age?>" style="color: #0048aa; font-size: 19px; margin-left:40px; line-height:30px;  <?php if(isset($_GET['tag']) && $_GET['tag']=='my') echo 'font-weight:bold !important;';?>">My Posts</a>
	</div>
	
	<div class="ages">
		<h3 style="margin-left:40px; font-weight:bold; font-size:20px; text-decoration:underline; margin-top:30px;color:#0048aa; margin-bottom:30px;">Age:</h2>
		<a href="askandans.php?tag=<?php echo $tag?>&age=all" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px; <?php if(isset($_GET['age']) && $_GET['age']=='all') echo 'font-weight:bold !important;';?>">All</a></br>
		<a href="askandans.php?tag=<?php echo $tag?>&age=24" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px;<?php if(isset($_GET['age']) && $_GET['age']=='24') echo 'font-weight:bold !important;';?>">12 to 14</a></br>
		<a href="askandans.php?tag=<?php echo $tag?>&age=58" style="color: #6a6a6a; font-size: 17px; margin-left:40px; line-height:30px; <?php if(isset($_GET['age']) && $_GET['age']=='58') echo 'font-weight:bold !important;';?>">15 to 18</a>
	</div>
	
	<div class="new-post">
		<img src="profile.png" style="height:55px; width:55px; margin-top:15px; margin-left:20px; position:absolute;">
		<form action="newpost.php" method="post">
			<textarea id="posttitle"  placeholder="Question (required)" name="posttitle" style="resize:none; font-family: Arial; width:640px; margin-top: 15px; height:40px; margin-left:90px; <?php if (isset($_GET['err1']) && $_GET['err1']==1) echo "border: 1.5px solid #ca1f00 !important;" ?>"><?php if(isset($_POST['posttitle'])) echo $_POST['postitle']; else if(isset($_GET['q'])) echo $_GET['q']; ?></textarea></br>
			
			<textarea id="postdetail"  placeholder="Description (optional)" name="detail" style="resize:none; font-family: Arial; margin-top:-5px; width:640px; height:100px; margin-left:90px;"><?php if(isset($_POST['detail'])) echo $_POST['detail']; else if(isset($_GET['d'])) echo $_GET['d'];?></textarea></br>
			
			<input type="text" name="tagchk" value="<?php echo $_GET['tag']; ?>" style="display:none;">
			<input type="text" name="agechk" value="<?php echo $_GET['age']; ?>" style="display:none;">
			
			<select name="tagselect" id="tagselect" style="<?php if (isset($_GET['err2']) && $_GET['err2']==1) echo "border: 1.5px solid #ca1f00 !important;" ?>"> 
			<option>Tag (required)</option>
			<option>Anxiety</option>
			<option>Relationships</option>
			<option>Study Skills</option>
			<option>Emotions</option>
			<option>Stress</option>
			<option>Sadness/Loneliness</option>
			<option>Self-esteem</option>
			<option>Other</option>
			</select> 
			<script type="text/javascript">
				document.getElementById('tagselect').value = "<?php if(isset($_GET['tagselectval'])) echo $_GET['tagselectval']; else echo $_POST['tagselect'];?>";
			</script>
			<input type="submit" class="submit" style="padding-top:-1px;" name="submit" value="Post">
		</form>
	</div>
	<?php
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql1="";
			$idq=0;
			$age2=$tag2="";
			$ageSearch=$_GET['age'];
			if($ageSearch=="all")
				$age2="0";
			else if($ageSearch=="58")
				$age2="15 to 18";
			else if($ageSearch=="24")
				$age2="12 to 14";
			
			$tagSearch=$_GET['tag'];
			if($tagSearch=="anxiety")
				$tag2="Anxiety";
			else if($tagSearch=="relat")
				$tag2="Relationships";
			else if($tagSearch=="study")
				$tag2="Study Skills";
			else if($tagSearch=="emo")
				$tag2="Emotions";
			else if($tagSearch=="stress")
				$tag2="Stress";
			else if($tagSearch=="sad")
				$tag2="Sadness/Loneliness";
			else if($tagSearch=="self")
				$tag2="Self-esteem";
			else if($tagSearch=="other")
				$tag2="Other";
			else if($tagSearch=="my")
				$tag2="My Posts";
			
			
			
			if($tagSearch=="all" && $ageSearch=="all")
				$sqlT="SELECT * FROM posts WHERE deleted='$zero'  ORDER BY date DESC";
			else if ($tagSearch=="all")
				$sqlT="SELECT * FROM posts WHERE deleted='$zero' AND age='$age2' ORDER BY date DESC";
			else if ($ageSearch=="all")
				$sqlT="SELECT * FROM posts WHERE deleted='$zero' AND tag='$tag2' ORDER BY date DESC";
			else
				$sqlT="SELECT * FROM posts WHERE deleted='$zero' AND tag='$tag2' AND age='$age2' ORDER BY date DESC";
			$resultT=$conn->query($sqlT);
			$count=$resultT->num_rows;
			$page=1;
			if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}
			$per_page=15;
			$start=($page-1)*$per_page;
			$pages=ceil($count/$per_page);
			?>
			<div class="pagination">
			<b style="font-size:18px; font-family:Arial; font-weight:normal;"> <?php
			$currage=$_GET['age'];
			$currtag=$_GET['tag'];
			$prev=$page-1;
			$next=$page+1;
			if ($page>1)
			{
				echo "<a class='than-signs' href='askandans.php?page=$prev&tag=$currtag&age=$currage'><</a>&nbsp;"; // if we are on page 1, then prev button should not show up
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
						echo '<b><a href="?page='.$x.'&tag='.$currtag.'&age='.$currage.'"> '.$x.'</a></b>'; 
					}
										
					
				  /*else 
					{
						echo '<a href="?page='.$x.'&tag='.$currtag.'&age='.$currage.'"> '.$x.'</a>&nbsp;'; // echo a link. variable page is assigned to $x, followed by concatenating remaining values in a loop
					}*/
				}
				if ($page != $pages)
				{ // if you are on the last page, then next button should not be there
					echo "&ensp;<a class='than-signs' href='askandans.php?page=$next&tag=$currtag&age=$currage'>></a>";
				}
				else
				{
					echo "&ensp;<a class='than-signs' style='opacity:0.5;'>></a>";
				}
				?></b>
				
				

				<?php
			}
			
		?>
		</div>
		
	
	
	<div class="all-posts" style="margin-top:265px;">
		<?php
			//require "filterPosts.php";
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$sql1="";
			$idq=0;
			$age2=$tag2="";
			$ageSearch=$_GET['age'];
			if($ageSearch=="all")
				$age2="0";
			else if($ageSearch=="58")
				$age2="15 to 18";
			else if($ageSearch=="24")
				$age2="12 to 14";
			
			$tagSearch=$_GET['tag'];
			if($tagSearch=="anxiety")
				$tag2="Anxiety";
			else if($tagSearch=="relat")
				$tag2="Relationships";
			else if($tagSearch=="study")
				$tag2="Study Skills";
			else if($tagSearch=="emo")
				$tag2="Emotions";
			else if($tagSearch=="stress")
				$tag2="Stress";
			else if($tagSearch=="sad")
				$tag2="Sadness/Loneliness";
			else if($tagSearch=="self")
				$tag2="Self-esteem";
			else if($tagSearch=="other")
				$tag2="Other";
			else if($tagSearch=="my")
				$tag2="My Posts";
			
			
			/*if($tagSearch=="all" && $ageSearch=="all")
				$sqlT="SELECT * FROM posts ORDER BY date DESC";
			else if ($tagSearch=="all")
				$sqlT="SELECT * FROM posts WHERE age='$age2' ORDER BY date DESC";
			else if ($ageSearch=="all")
				$sqlT="SELECT * FROM posts WHERE tag='$tag2' ORDER BY date DESC";
			else
				$sqlT="SELECT * FROM posts WHERE tag='$tag2' AND age='$age2' ORDER BY date DESC";
			$resultT=$conn->query($sqlT);
			$count=$resultT->num_rows;
			$page=1;
			if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}
			$per_page=2;
			$start=($page-1)*$per_page;
			$pages=ceil($count/$per_page);*/
			$zero="0";
			$conn->set_charset('utf8mb4');
			if($tagSearch=="all" && $ageSearch=="all")//LIMIT $start, $per_page
				$sql1="SELECT * FROM posts WHERE deleted='$zero' ORDER BY date DESC LIMIT $start, $per_page";
			else if ($tagSearch=="all")
				$sql1="SELECT * FROM posts WHERE age='$age2' AND deleted='$zero' ORDER BY date DESC LIMIT $start, $per_page";
			else if ($ageSearch=="all" && $tagSearch!="my")
				$sql1="SELECT * FROM posts WHERE tag='$tag2' AND deleted='$zero' ORDER BY date DESC LIMIT $start, $per_page";
			else if ($tagSearch=="my" && ($age2==$myage || $age2=="0"))
			{
				$sql1="SELECT * FROM posts WHERE name='$name' AND deleted='$zero' ORDER BY date DESC LIMIT $start, $per_page";
			}
			else
				$sql1="SELECT * FROM posts WHERE tag='$tag2' AND deleted='$zero' AND age='$age2' ORDER BY date DESC LIMIT $start, $per_page";
			$result1=$conn->query($sql1);
			$count=$result1->num_rows;
			
			if($count!=0)
			{			
			
			while($row1=$result1->fetch_assoc())
			{
				$postername=$row1['name'];
				$question=$row1['question'];
				$date=date("M j, Y", strtotime($row1['date']));
				$time=date('h:i a', strtotime($row1['date']));//time, date
				$description=$row1['detail'];
				$seeCensor=0;
				$censor=$row1['censor'];
				if($censor==1 && ($postername==$name || $s==1 || $t==1 || $t==2))
					$seeCensor=1;
				$idq=$row1['id'];
				//$_SESSION["idPost"]=$idq;	
				$tagReal=$row1['tag']; //
				$ageReal=$row1['age']; //
				if(($censor==1 && $seeCensor==1) || ($censor==0 && $seeCensor==0))
				{
				?>
				<div class="post" style="<?php if($censor==1) echo "border-top: 6px solid #B60505;" ?>">
					<img src="profile.png" style="height:55px; width:55px; margin-top:15px; margin-left:20px; position:absolute;">
					<h3 class="question-name"><?php echo $question; ?>
					</br>
					<h4 class="user-name"><?php echo $postername; ?></h4>
					<?php 
					if($postername==$name || $t==1 || $t==2 || $s==1)
					{
						// require "deletepost.php";
//<!--onclick="document.getElementById('delete-post').style.display='block'"-->		
						if($censor==1 && !($postername==$name && $s==0 && $t==0))
						{
							?>
							<div  id="warnblockcontainer" style="position:absolute; margin-left:632px;">
							<a href="makevisible.php?idq=<?php echo $idq;?>&tag=<?php echo $_GET['tag'];?>&age=<?php echo $_GET['age'];?>">
							<img class="eye" id="eye" title="Make Visible to Public" draggable="false" src="visible.png"></a>
							</div>
							<?php
						}
						?>
						<div  id="warnblockcontainer" style="position:absolute; margin-left:632px;">
						<a href="deletepost2.php?idq=<?php echo $idq;?>&tag=<?php echo $_GET['tag'];?>&age=<?php echo $_GET['age'];?>">
						<img class="trash" id="trash" title="Delete" draggable="false" src="trashcan.png"></a>
						</div>
						<?php
					}
					?>
					<h5 class="datetime"><?php echo $time.", ".$date; ?></h5>
					<span><i><h5 class="tag"><?php echo $tagReal; ?></h5></i></span>
					<?php 
						if($ageReal!="0") 
						{ 
							?>
							<span><i><h5 class='age'><?php echo $ageReal; ?></h5></i></span>
							<?php
						}
					?>
					<h4 class="description"><?php echo $description; ?></h4>
					<div class="comments" id="comments" style="padding-top:13px !important;">
					<?php
						//require "filterComments.php";
						
						
						$sqlC="SELECT * FROM comments WHERE idQ='$idq' AND deleted='$zero' ORDER BY date DESC";
						$resultC=$conn->query($sqlC);
						
						$countC=$resultC->num_rows;
						if($countC==0)
						{
							echo "<b style='color:#0048aa; margin-top:80px; position:absolute ;margin-left:255px !important;'>No comments</b>";
						}
						$pic=1;
						while($rowC=$resultC->fetch_assoc())
						{
							$userC=$rowC['name'];
							$dateC=date("M j, Y", strtotime($rowC['date']));
							$timeC=date('h:i a', strtotime($rowC['date']));//time, date
							$uniqueID=$rowC['id'];
							$commentC=$rowC['comment'];
							$censor2=$rowC['censor'];
							$seeCensor2=0;
							if($censor2==1 && ($userC==$name || $s==1 || $t==1 || $t==2))
								$seeCensor2=1;
							
							if(($censor2==1 && $seeCensor2==1) || ($censor2==0 && $seeCensor2==0))
							{
							
							?>
							
						<div class="each-comment">
							<img draggable="false" src="profile.png" style="height:40px; width:40px; <?php if ($pic==1) { echo 'margin-top:0px;'; $pic--; } else echo 'margin-top:0px;';?> margin-left:0px; position:absolute; <?php if($censor2==1) echo "border: 1.5px solid #B60505; border-radius:20px;" ?>">
							<div class="user-commented" style="<?php if($censor2==1) echo "color: #B60505 !important;" ?>">
								<?php echo 
								$userC; 
								?>
							</div>						
							<?php
							if($userC==$name || $t==1 || $t==2)
							{
								
								if($censor2==1 && !($userC==$name && $s==0 && $t==0))
								{
									?>
									<div  id="warnblockcontainer" style="position:absolute; margin-left:232px;">
									<a href="makevisible2.php?idc=<?php echo $uniqueID;?>&tag=<?php echo $_GET['tag'];?>&age=<?php echo $_GET['age'];?>">
									<img class="eye2" id="eye" title="Make Visible to Public" draggable="false" src="visibleC.png"></a>
									</div>
									<?php
								}
								
								?>
								<div style="position:absolute; margin-left:632px;">
									<a href="deletecomment2.php?idc=<?php echo $uniqueID;?>&tag=<?php echo $_GET['tag'];?>&age=<?php echo $_GET['age'];?>">
									<img class="trash" style="margin-left:-50px; margin-top:-20px; width:20px; height:20px;" id="trash" title="Delete" draggable="false" src="trashcan.png">
									</a>
								</div>
								<?php
								
								
							}
							?>
						<div class="comment-date">
							<?php echo $timeC.", ".$dateC; ?>
						</div>
						<div class="user-comment">
							<?php echo $commentC; ?>
						</div>
						<div class="line"></div>
					</div>
						<?php 
							}
						}
						?>
					</div>
					</br>
					
					<div class="new-comment">
						<img draggable="false" src="profile.png" style="height:30px; width:30px; margin-top:5px; margin-left:0px; position:absolute;">
						<form action="insertcomment.php" method="post">
							<textarea id="new-user-comment"  placeholder="Add a comment..." name="newusercomment"></textarea></br>
							<input type="text" name="QuID" value="<?php echo $idq; ?>" style="display:none;">
							<input type="text" name="tag" value="<?php echo $_GET['tag']; ?>" style="display:none;">
							<input type="text" name="age" value="<?php $ageF=""; $ageF=$_GET['age']; echo $ageF; ?>" style="display:none;">
							<input type="submit" class="addcomment"  name="addcomment" style="padding-top:3px;" value="↑"> 
						</form>
					</div>
					</br>
					
					
				</div>
				<?php 
				}
			}
			}
			
			?> </br></br>
		</br></br>
	</div>
	<?php
	/*if(isset($_POST['deletingcomment']))
	{
		$one="1";
		$idcom=$_POST['uniqueID'];
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sql= "UPDATE comments SET deleted='$one' WHERE id='$deleteid'";
		$result = $conn->query($sql);
		$tagg=$_GET['tag'];
		$agee=$_GET['age'];
		$onee=$_POST['one'];
		echo "<meta http-equiv='refresh' content='0'>";
		/*if($one==1)
		{
			
			/*?>
			<script type="text/javascript">
				var two=2;
				if(var!=0)
				{
					two=two-1;
					auto_reload();
				}
				
			</script>
			<?php
			
		}
	}*/
	?>
</body>
</html> 