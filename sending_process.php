<?php
	
	session_start();
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
	if(isset($_SESSION['name']) and isset($_GET['user'])){
		if(isset($_POST['message'])){
			if($_POST['message'] != "")
			{
			
				$sender_name=$_SESSION['name'];
				$receiver_name=$_GET['user'];
				$message=$_POST['message'];
				$date=date("Y-m-d h:i:sa");
				$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
				$conn->set_charset('utf8mb4');
				$sql="INSERT INTO messages(sender_name, receiver_name, message_text, date_time) VALUES('$sender_name','$receiver_name', '$message','$date')";
				$result = $conn->query($sql);
				if($result)
				{
					?>
							<div class="message-row you-message">
								<div class="message-text"> <?php echo $message_text ?></div>
								<div class="message-time"><?php echo $display ?></div>
							</div>
							<?php
						echo "sent";
				}
				
			
			}else{
				
				echo "please write something first";
			}
			
			
		}else{
			echo "problem with text";
		}
		
	}else{
		
		echo "Please login or select a user to send a message";
	}

?>