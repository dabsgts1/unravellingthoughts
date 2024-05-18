<style>
.S{
	position:absolute;

}
.S2{
	margin-left:5px !important;

}
#delete-comment {
	display: none;
	box-shadow: 2px 5px 20px #000000;
	width: 400px;
	position: fixed;
	height:180px;
	max-height: 396px;
	top: 35%;
	background: white;
	z-index: 2;
	left:50%;
	transform: translate(-50%, 0);
	border-radius: 5px;
	overflow: auto;
	font-family: Arial, Helvectica, sans-serif;
	align-items: center;
}
.d-header{
		background: #002c88;
		margin: 0;
		color: white;
		padding: 10px;
		font-size: 20px;
		text-align: center;
}
input[type="text"]:focus{
  border: 2.3px solid #0048AA;
}
.d-body{
	padding: 5px;
}
.d-header{
	font-weight: bold;
}
input[type="submit"] {
  background-color: #0048AA; border: none; color: white; margin-bottom: 15px; cursor: pointer; border-radius: 10px; outline: none; -webkit-appearance:none;
}
</style>
<div id="delete-comment">
	<p class="d-header">Are you sure you want to DELETE this comment?<?php echo $uniqueID;?></p>
	<p class="d-body">
	<form action="deletecomment2.php" method="get" class="S2">	
	<input type="text" value="<?php echo $deleteid; ?>" name="uniqueID" style="display:none;">
	<input type="text" value="<?php echo $_GET['tag'];?>" name="tag" style="display:none;">
	<input type="text" value="<?php echo $_GET['age'];?>" name="age" style="display:none;">
	<input type="submit" class="S" name="send"   value="Yes" style="height: 35px; margin-left:80px; font-size: 15px; width: 90px;">
	<input type="submit" class="S" name="cancel" value="No"  style="height: 35px; margin-left:220px; font-size: 15px; width: 90px;">
		</form>
	</p>
</div>	