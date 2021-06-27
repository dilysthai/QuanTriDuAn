<?php
	$MaKH = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from khachhang where MaKH = '.$MaKH;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= QuanLyKhachHang.php" );
	die();
?>


