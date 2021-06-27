<?php
	$MaNV = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from nhanvien where MaNV = '.$MaNV;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= QuanLyNhanVien.php" );
	die();
?>