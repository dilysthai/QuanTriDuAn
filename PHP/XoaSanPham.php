<?php
	$MaSP = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from sanpham where MaSP = '.$MaSP;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= DanhSachSanPham.php" );
	die();
?>