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
session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
$name=$_SESSION['name'];
//$_SESSION['counter'] = (!$_SESSION['counter']) ? 1 : $_SESSION['counter'];
$nomesg=2;
$countermesg=100;
if(isset($_GET['user']))
{
	if(isset($_GET['loadmore']))
	{
		$countermesg=100+(int)($_GET['loadmore']);
	}
	$del=0;
	$ch=1;
	$user=$_GET['user'];
	$name=$_GET['name'];
	$sql="SELECT * FROM messages 
		WHERE (sender_name='$name' AND receiver_name='$user' OR 
		 receiver_name='$name' AND sender_name='$user' )
		   AND ( (sender_name='$name' AND deletedS='$del') OR (receiver_name='$name' AND deletedR='$del') ) ORDER BY date_time";
	$sql2="SELECT * FROM messages WHERE sender_name='$name' AND receiver_name='$user'  AND status='$ch'
	   AND deletedS='$del' ORDER BY date_time DESC";
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$conn->set_charset('utf8mb4');
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
			
	if($result)
	{
		$idno=0;
		$mostrecent=1;
		$one=1;
		while($row2=$result2->fetch_assoc())
		{
			if($mostrecent==$one)
			{
				$idno=$row2['id'];
				$mostrecent=0;
			}
		}
		$numrows=$result->num_rows;
		if($numrows>$countermesg)
		{
			//echo link to load more
			$loadmore=$countermesg;
			?> <div class="hundred-text"> <?php echo "<a style='text-align:center; font-size: 1.1rem; color:#777; text-decoration:underline;' href='dashboard.php?user=$user&loadmore=$loadmore'>Load More</a>";  ?></div><br/><br/><?php
		}
		else if($user!="" && $user!="Select a User")
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
				$sender_name=$row['sender_name'];
				$receiver_name=$row['receiver_name'];
				$message_text=$row['message_text'];
				$st=$row['status'];
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
				$idno2=$row['id'];
				if($sender_name==$name && $st==1 && $idno==$idno2)
				{
					?>
					<div class="message-row you-message">
						<div class="message-text"> <?php echo $message_text ?></div>
						<div class="message-time"><?php echo $display ?></div>
						<div style="font-size:14px; margin-top:-5px; margin-bottom:-5px;" class="message-time"><?php echo "👁️" ?></div>
					</div>
					<?php
				}
				else if($sender_name==$name)
				{
					?>
					<div class="message-row you-message">
						<div class="message-text"> <?php echo $message_text ?></div>
						<div class="message-time"><?php echo $display ?></div>
					</div>
					<?php
				}
				else
				{
					?>
					<div class="message-row other-message">
						<div class="message-text"> <?php echo $message_text ?></div>
						<div class="message-time"><?php echo $display ?></div>
					</div>
					<?php
				}
			}
					
		}
	}
}
?>