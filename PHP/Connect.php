<?php
    $host = "localhost";
	$user = "root";
	$password = "";
	$database = "laptophoangnam";
    $db = mysqli_connect($host,$user,$password,$database);
    if($db->connect_error){
        die("connect failed".$db->connect_error);
        echo "Không thành công";
    }

    function execute($sql){
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "laptophoangnam";
        $db = mysqli_connect($host,$user,$password,$database);
        mysqli_query($db,$sql);
        mysqli_close($db);
    }
    
    function executeResult($sql){
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "laptophoangnam";
        $db = mysqli_connect($host,$user,$password,$database);
        $resultset = mysqli_query($db,$sql);
        $list = [];
        while($row = mysqli_fetch_array($resultset ,1)){
            $list[] =$row;
        }
        mysqli_close($db);
        return $list;
    }
?>