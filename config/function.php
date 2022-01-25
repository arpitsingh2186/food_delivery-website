<?php include('constants.php');?>
<?php
function getSetting()
{
	$sql = "SELECT * FROM tbl_setting WHERE id='1'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row;
}
?>