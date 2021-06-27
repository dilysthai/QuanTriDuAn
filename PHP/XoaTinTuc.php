<?php
	$MaTinTuc = $_GET['id'];
	require_once ('Connect.php');
	$sql = 'delete from tintuc where MaTinTuc = '.$MaTinTuc;
	execute($sql);
	echo '<script type="text/javascript">alert("Xoá Thành Công")</script>';
	header( "refresh:0.05;url= DanhSachTinTuc.php" );
	die();
?>