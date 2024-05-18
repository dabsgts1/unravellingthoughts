<style>
</style>


<?php
$name=$_GET['name'];
$user=$_GET['user'];
if(isset($_GET['search_user']) && $_GET['search_user']!="")
{
	$search_user=$_GET['search_user'];
	$del=0;
		
	$sql="SELECT *
		  FROM messages 
		  WHERE (sender_name='$name' OR receiver_name='$name')
		  AND ((sender_name!='$name' AND sender_name LIKE '%$search_user%') OR (receiver_name!='$name' AND receiver_name LIKE '%$search_user%'))
		  AND ( (sender_name='$name' AND deletedS='$del') OR (receiver_name='$name' AND deletedR='$del') )
		  ORDER BY date_time DESC";
}
else
{
	$del=0;
	$sql="SELECT *
		  FROM messages 
		  WHERE (sender_name='$name' OR
		  receiver_name='$name')
		   AND ( (sender_name='$name' AND deletedS='$del') OR (receiver_name='$name' AND deletedR='$del') )
		  ORDER BY date_time DESC";
}
			
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$conn->set_charset('utf8mb4');
	
$result = $conn->query($sql);
if($result)
{
	if($result->num_rows>0)
	{
		$counter=0;
		$added_user=array();
		while($row=$result->fetch_assoc())
		{
	
			$sender_name=$row['sender_name'];
			$receiver_name=$row['receiver_name'];
			$message_text=$row['message_text'];
			$status=$row['status'];
			date_default_timezone_set("Asia/Muscat");
			$date=date("M j Y", strtotime($row['date_time']));
			$time=date('h:i a', strtotime($row['date_time']));
			
			//	foreach($added_user as $value){
			//echo $value; 
			//echo $counter;	
			//}						
				
						
			if($name==$sender_name)
			{
				if(in_array($receiver_name, $added_user))
				{
				}
				else
				{
					$newdate2=new DateTime($row['date_time']);
					$newdate1=new DateTime(date("d-m-Y"));
					$diff = $newdate1->diff($newdate2);
			
					if(($diff->days)<=1)
					{
						$display=$time;
					}
					elseif(($diff->days)<365)
					{
						$display=date("M j", strtotime($row['date_time']));
					}
					else
					{
						$display=$date;
					}
						
					if(isset($_GET['user']) && $receiver_name==$_GET['user'])
					{
						?>
						<div class="conversation-active">
							<img draggable="false" class="pf" draggable="false" src="profile.png">
							<div class="title-text">
								<?php echo '<a   href="?user='.$receiver_name.'">'.$receiver_name.'</a>';
								?>
											   
							</div>
							<div class="created-date">
								<?php echo $display; ?>
							</div>
							<div class="conversation-message">
								<?php echo '<a   href="?user='.$receiver_name.'">You: '.$message_text.'</a>'; ?>
							</div>
						</div><?php 
					}
								
					else 
					{
						?>
						<div class="conversation" >
							<img draggable="false" class="pf" draggable="false" src="profile.png">
							<div class="title-text">
								<?php echo '<a  href="?user='.$receiver_name.'">'.$receiver_name.'</a>';
								?>
												   
							</div>
							<div class="created-date">
								<?php echo $display ?>
							</div>
							<div class="conversation-message">
								<?php echo '<a  href="?user='.$receiver_name.'">You: '.$message_text.'</a>'; ?>
							</div>
						</div><?php
					}
					array_push($added_user, $receiver_name);
					//$added_user=array($counter=>$receiver_name);
					$counter++;
				}
			}
			elseif($name==$receiver_name)
			{
				if(in_array($sender_name, $added_user))
				{
				}
				else
				{
					$newdate2=new DateTime($row['date_time']);
					$newdate1=new DateTime(date("d-m-Y"));
					$diff = $newdate1->diff($newdate2);
					if(($diff->days)<=1)
					{
						$display=$time;
					}
					elseif(($diff->days)<365)
					{
						$display=date("M j", strtotime($row['date_time']));
					}
					else
					{
						$display=$date;
					}
								
								
					if(isset($_GET['user']) && $sender_name==$_GET['user'])
					{
						?>
						<div class="conversation-active">
							<img draggable="false" class="pf" draggable="false" src="profile.png">
							<div class="title-text">
								<?php echo '<a   href="?user='.$sender_name.'">'.$sender_name.'</a>';
								?>
												   
							</div>
							<div class="created-date">
								<?php echo $display ?>
							</div>
							<div class="conversation-message">
								<?php echo '<a  href="?user='.$sender_name.'">'.$message_text.'</a>'; ?>
							</div>
						</div>
						<?php
						//update status to 1;
						$st=1;
						$rname=$_GET['user'];
						$sql3= "UPDATE messages
								SET status='$st'
								WHERE sender_name='$rname' AND receiver_name='$name'";
		
						$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
						$conn->set_charset('utf8mb4');
						$result3 = $conn->query($sql3);
							
									
									
					}
					 else
					{
						if($status==1)
						{
							?>
							<div class="conversation">
							
								<img draggable="false" class="pf" draggable="false" src="profile.png">
								<div class="title-text">
									<?php echo '<a   href="?user='.$sender_name.'">'.$sender_name.'</a>';
									?>
								</div>
								<div class="created-date">
									<?php echo $display ?>
								</div>
								<div class="conversation-message">
									<?php echo '<a   href="?user='.$sender_name.'">'.$message_text.'</a>';?>
								</div>
							</div><?php
						}
						else
						{
							?>
							<div class="conversation">
								
								<img draggable="false" class="pf" draggable="false" src="profile.png">
								<div class="title-text" >
									<?php echo '<a   style="font-weight:bold; color:orange;" href="?user='.$sender_name.'">'.$sender_name.'</a>';
									?>
								</div>
								<div class="created-date" style="font-weight:bold; color:orange;">
									<?php echo $display ?>
								</div>
								<div class="conversation-message">
									<?php  echo '<a   style="font-weight:bold; color:orange;" href="?user='.$sender_name.'">'.$message_text.'</a>'; ?>
								</div>
							</div><?php
						}
					}
								
								
								
					array_push($added_user, $sender_name);
					//$added_user=array($counter=>$sender_name);
					$counter++;
				}
			}
		}
	}
				
}
?>
		
