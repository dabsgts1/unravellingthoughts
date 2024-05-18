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
.n{
	font-size: 1.3rem;
	color: #777;
	margin-bottom:2px;
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
	$countermesg=100;
	if(isset($_GET['loadmore']))
	{
		$countermesg=100+(int)($_GET['loadmore']);
	}
	$name=$_GET['name'];
	$sql="SELECT * FROM chatroomvol";
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$conn->set_charset('utf8mb4');
	$result = $conn->query($sql);
		if($result)
		{
			$numrows=$result->num_rows;
			if($numrows>$countermesg)
			{
				//echo link to load more
				$loadmore=$countermesg;
				?> <div class="hundred-text"> <?php echo "<a style='text-align:center; font-size: 1.1rem; color:#777; text-decoration:underline;' href='chatroomvolA.php?loadmore=$loadmore'>Load More</a>";  ?></div><br/><br/><?php
			}
			else
			{
				?> <div class="hundred-text"> <?php echo "All messages loaded";  ?></div><br/><br/><?php
			}
			while($row=$result->fetch_assoc())
			{
				if($numrows>$countermesg)
				{
					$numrows--;
				}
				else
				{
					$sender_name=$row['name'];
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
					if($sender_name==$name)
					{
						?>
						<div class="message-row you-message">
							<div class="message-text"> 
								
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
							<div class="message-text"> 
								<div class="n">
								<?php echo $sender_name ?>
								</div>
								<?php echo $message_text ?>
							</div>
							<div class="message-time"><?php echo $display ?></div>
						</div>
						<?php
					}
				}
			}
		}
?>