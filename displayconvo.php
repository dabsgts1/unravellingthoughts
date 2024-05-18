<?php
session_start();
$name="";
if(!isset($_SESSION['name']))
{
	header("location: logout.php");	
}
else
{
	$name=$_SESSION['name'];
	$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
	$sql="SELECT * FROM users WHERE name='$name'";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		if($row['stuvol']!=1)
		{
			header("location: logout.php");	
		}
	}
}



?>
<html>
<head>
	<title>
		Unravelling Thoughts - Messages
	</title>
	<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
	<script src="jquery-3.3.1.min.js"></script>
<!--<script>
    $(document).ready(function(){
		 $("#div_refresh").load("load.php");
        setInterval(function() {
            $("#display-message").load("load.php");
        }, 1000);
    });
 
</script>-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
<link rel="icon" type="image/png" href="transparent2.png"/>
<link rel="stylesheet" href="displayconvo4.css">
<link href="font.css" rel="stylesheet">

</head>

	<body  style="background: linear-gradient(to right, #57c1eb 0%, #246fa8 100%); background-repeat: no-repeat; background-attachment: fixed;">
		<header><div class="nagbar">
			<nav>
				<b style="font-weight:normal;">Username: <b style="font-family: Arial !important;"><?php echo " ".$name; ?></b></b>
				<img draggable="false" src="logotextblue2.png" style="width:200px; height:39px;">
				<ul class="navlinks">
					<li><a href="selectpageVol.php"  				>HOME	</a></li>
					<li><a href="logout.php"  				>LOG OUT	</a></li>	
				</ul>
			
			
			</nav>
		</div></header>
		</br>
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
<div class="titles">
	<?php 
		$id=$_GET['id'];
		$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
		$sqlu="SELECT * FROM requests WHERE id='$id'";
		$resultu=$conn->query($sqlu);
		$username1=$username2="";
		while($rowu=$resultu->fetch_assoc())
		{
			$username1=$rowu['username1'];
			$username2=$rowu['username2'];
		}
		
	?>
	<div class="userOne">
		<?php echo $username2; ?>
	</div>
	<div class="userTwo">
		<?php echo $username1; ?>&nbsp;
	</div>
</div>


<div class="chat-message">
	<div class="chat-message-list" id="chat-message-list">
		
		<script src="jquery.min.js"></script>
		<script>
			var id = "<?php echo $_GET['id']; ?>";
    $(document).ready(function(){
        function getData(){
            $.ajax({
                type: "POST",
                url: "dataConvo.php?id="+id,
                success: function(data){
                    $("#chat-message-list").html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 1000);  
		// it will refresh your data every 1 sec

    });
		</script>
		</br></br>
		</div></div>

<a href="viewconversations.php" style="margin-top:530px; font-size:15px;">BACK</a>
 
	
</body>
</html>

