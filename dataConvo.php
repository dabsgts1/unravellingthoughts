<style>

.message-row{
	margin-bottom:10px;
	display: grid;
	grid-template-columns: 70%;
}
.you-message{
	justify-content: end;
	justify-items: end;
}
.other-message{
	justify-items: start;
}
.n{
	font-size: 1.3rem;
	color: #777;
	margin-bottom:2px;
}
.n1{
	font-size: 1.3rem;
	color: #D3D3D3;
	margin-bottom:2px;
}
.message-text{
	padding: 9px 14px;
	font-size: 1.6rem;
	margin-bottom:5px;
	margin-top: -3px;
	word-wrap: break-word;
}
.hundred-text{
	text-align:center;
	font-size: 1.1rem;
	color:#777;
}
.message-time{
		font-size: 1.1rem;
		color: #777;
}
.you-message .message-text{
	background: #0048aa;
	color: #eee;
	border: 1px solid #0048aa;
	border-radius: 14px 14px 0 14px;
}
.other-message .message-text{
	background: #eee;
	color: #111;
	border: 1px solid #ddd;
	border-radius: 14px 14px 14px 0;
}

</style>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql1="SELECT * FROM requests WHERE id='$id'";
	$result1=$conn->query($sql1);
	$username1=$username2="";
	while($row1=$result1->fetch_assoc())
	{
		$username1=$row1['username1'];
		$username2=$row1['username2'];
	}
	$sql="SELECT * FROM messages 
		  WHERE (sender_name='$username1' AND receiver_name='$username2' OR 
		  receiver_name='$username1' AND sender_name='$username2' )
		  ORDER BY date_time DESC";	
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$conn->set_charset('utf8mb4');
	$result = $conn->query($sql);
	if($result)
	{
		$numrows=$result->num_rows;
		if($numrows>0)
		{
			while($row=$result->fetch_assoc())
			{
				$sender_name=$row['sender_name'];
				$receiver_name=$row['receiver_name'];
				$message_text=$row['message_text'];
				date_default_timezone_set("Asia/Muscat");
				$date=date("M j Y", strtotime($row['date_time']));
				$time=date('h:i a', strtotime($row['date_time']));
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
				if($sender_name==$username1)
				{
					?>
					<div class="message-row you-message">
						<div class="message-text"> 
							<div class="n1">
								<?php echo $sender_name ?>
							</div>
							<?php echo $message_text ?>
						</div>
						<div class="message-time"><?php echo $display ?></div>
					</div>
					<?php
				}
				else
				{
					?>
					<div class="message-row other-message">
						<div class="message-text"> <div class="n">
							<?php echo $sender_name ?>
						</div><?php echo $message_text ?></div>
						<div class="message-time"><?php echo $display ?></div>
					</div>
					<?php
				}
			}
			?> </br></br><div class="hundred-text"> <?php echo "All messages loaded";  ?></div><?php
		}	
		else
		{
			echo "<b style='font-size: 1.9rem; color: grey; text-align: center; margin-bottom:180px;'>No messages between selected users</b>";
		}
	}
}
			
	?></br>