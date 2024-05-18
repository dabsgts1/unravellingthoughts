
<div id="delete">
	<p class="d-header">Are you sure you want to DELETE this conversation?</p>
	<p class="d-body">
	<form action="delete2.php" method="get" class="S2">	
	<input type="text" value="<?php echo $_GET['user'];?>" name="user" style="display:none;">
	<input type="submit" class="S" value="Yes" name="send">
	<input type="submit" class="S"  name="cancel" value="No"/>
		</form>
	</p>
	
</div>	





