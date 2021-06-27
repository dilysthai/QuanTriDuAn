<?php
session_start();
session_destroy();
                echo '<script language="javascript">';
                echo 'alert("Bạn muốn đăng xuất ???")';
                echo '</script>';
                header( "refresh:0.05;url=Login.php" );
?>