<?php
$one="1";
$inpText1="fuck";
$inpText2=" cunt ";
$inpText3=" dick ";
$sql="SELECT * FROM posts WHERE question LIKE '%$inpText1%' OR question LIKE '%$inpText2%' OR question LIKE '%$inpText3%' OR detail LIKE '%$inpText1%' OR detail LIKE '%$inpText2%' OR detail LIKE '%$inpText3%'";
$conn = new mysqli("localhost", "unravep9_diya", "fc0km0m1","unravep9_WPP8O");
$conn->set_charset('utf8mb4');
$result = $conn->query($sql);
if($result && $result->num_rows!=0)
{
	while($row=$result->fetch_assoc())
	{
		$idP=$row['id'];
		$sqlUp="UPDATE posts SET censor='$one' WHERE id='$idP'";
		$resultUp=$conn->query($sqlUp);
	}
}
?>