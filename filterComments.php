<?php
$one="1";
$inpText1="fuck";
$inpText2=" cunt ";
$inpText3=" dick ";
$sql="SELECT * FROM comments WHERE comment LIKE '%$inpText1%' OR comment LIKE '%$inpText2%' OR comment LIKE '%$inpText3%'";
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$conn->set_charset('utf8mb4');
$result = $conn->query($sql);
if($result && $result->num_rows!=0)
{
	while($row=$result->fetch_assoc())
	{
		$idP=$row['id'];
		$sqlUp="UPDATE comments SET censor='$one' WHERE id='$idP'";
		$resultUp=$conn->query($sqlUp);
	}
}
?>