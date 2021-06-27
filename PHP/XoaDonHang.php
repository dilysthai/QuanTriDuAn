<?php
	$MaDH = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from chitietdonhang where MaDH = '.$MaDH;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= QuanLyHoaDon.php" );
	die();
?>