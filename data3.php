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
		$nomesg=2;
		if(isset($_GET['user1']))
		{
			$user1=$_GET['user1'];
			$user2=$_GET['user2'];
			$user3=$_GET['user3'];
			$countermesg=-1;
			
			if ($user3=="50")
				$countermesg=50;
			else if($user3=="100")
				$countermesg=100;
			else if($user3=="200")
				$countermesg=200;
			else
				$countermesg=-1;
			
			$sql="SELECT * FROM messages 
			      WHERE (sender_name='$user1' AND receiver_name='$user2' OR 
				  receiver_name='$user1' AND sender_name='$user2' )
				  ORDER BY date_time DESC";
			
			$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
			$conn->set_charset('utf8mb4');
			$result = $conn->query($sql);
			$var=0;
			
			if($result)
			{
				
				$numrows=$result->num_rows;
				
				if($numrows>0)
				{
					while($row=$result->fetch_assoc())
					{
						if($var<=$countermesg || $countermesg==-1)
						{
							if($var==$countermesg)
								break;
							if($countermesg!=-1)
								$var++;
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
							
							if(strcasecmp($sender_name,$user1)==0)
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
					}
					if($countermesg!=-1)
					{
						if($numrows>$countermesg)
						{
							?> </br></br><div class="hundred-text"> <?php echo $countermesg." messages loaded";  ?></div><?php
					
						}	
						else
						{
							?> </br></br><div class="hundred-text"> <?php echo "All messages loaded";  ?></div><?php
						}
					}
					else if($countermesg==-1)
					{
						?> </br></br><div class="hundred-text"> <?php echo "All messages loaded";  ?></div><?php
					}
					
				}
				else
				{
					echo "<b style='font-size: 1.9rem; color: grey; text-align: center; margin-bottom:150px;'>No messages between selected users</b>";
				}
					
					
			}
				
		}
			
	?></br>