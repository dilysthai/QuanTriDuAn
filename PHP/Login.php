<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Image/image1.ico" type="image/x-icon">
    <link rel="icon" href="../Image/image1.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/HomePage.css">
    <link rel="stylesheet" href="../CSS/Registration.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <title>Đăng Nhập - LapTop Hoàng Nam</title>
</head>

<body>
    <div class="Phan1">
        <div class="Phan1Trai">
            <img src="../Image/image1.ico" alt="">
            <p style="color:black;">LapTop Hoàng Nam</p>
        </div>
        <div class="Phan1Phai">

        </div>
    </div>
    <hr style="margin-top:0px; color:red">
    <div class="Login">
        <div class="FormDangNhap">
            <form action="" method="post">
                <p>Đăng Nhập Tài Khoản</p>
                <label for="">Tài Khoản</label>
                <input type="text" name="name" class="input1" placeholder="Nhập tên tài khoản">
                <br>
                <label for="">Mật Khẩu</label>
                <input type="password" name="password" class="input2" placeholder="Nhập mật khẩu tài khoản">
                <br>
                <form action="">
                    <button type="button" onclick="ChuyenTrang()"
                        style=" margin-top: 40px;height: 39px; width: 210px;margin-left: 205px;border-radius: 2px;border: 1px solid gray;">Tôi
                        chưa có tài khoản</button>
                    <input type="submit" name="submit" value="Đăng Nhập" class="input3"
                        style=" height: 39px;margin-left:10px;width: 100px;border-radius: 2px;border: 1px solid gray;">
                </form>
                <script>
                function ChuyenTrang() {
                    location.assign("Registration.php");
                }
                </script>
            </form>
            <?php
        include("Connect.php");
        if(isset($_POST['submit'])){

        if(empty($_POST['name']) or empty($_POST['password'])){
            echo'<div class="alert alert-success">
            <strong>Vui lòng không để trống</strong>
            </div>';
        }
        else{
            $name = mysqli_real_escape_string($db,$_POST['name']);
            $password = mysqli_real_escape_string($db,$_POST['password']);
            $password = md5($password);
            $sql="SELECT  * FROM information WHERE name='$name' and password='$password'";
            $query = mysqli_query($db,$sql);
            $num_row=mysqli_num_rows($query);
            if($num_row!=0){
            $_SESSION['name']= $name;
            echo'<div class="alert alert-success">
            <strong>Đăng nhập!</strong> Thành công.
            </div>';         
            header( "refresh:1;url= HomePage.php" );
            die();
            }
            else{
                echo '<div class="alert alert-warning">
                <strong>Lỗi!</strong> Tài khoản hoặc mật khẩu không đúng . Vui lòng thử lại !
                </div>';
            }
          }
        }
        ?>
        </div>
    </div>
</body>

</html>