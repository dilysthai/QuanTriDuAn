<?php
	$MaDMSP = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from danhmucsanpham where MaDMSP = '.$MaDMSP;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= DanhMucSanPham.php" );
	die();
?>