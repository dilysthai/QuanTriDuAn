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
    <title>Đăng Ký - LapTop Hoàng Nam</title>
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
        <div class="FormDangKy">
            <form action="" method="post">
                <p>Đăng Ký Tài Khoản</p>
                <label for="">Tài Khoản</label>
                <input type="text" name="name" placeholder="Nhập tên tài khoản" class="input1">
                <br>
                <label for="">Mật Khẩu</label>
                <input type="password" name="password" placeholder="Nhập mật khẩu" class="input2">
                <br>
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="password1" placeholder="Nhập lại mật khẩu" class="input4">

                <form action="">
                    <button type="button" onclick="ChuyenTrang()"
                        style=" margin-top: 40px;height: 39px; width: 210px;margin-left: 205px;border-radius: 2px;border: 1px solid gray;">Tôi
                        Đã Có Tài Khoản</button>
                    <input type="submit" name="submit" value="Đăng Ký" class="input3"
                        style=" height: 39px;margin-left:10px;width: 100px;border-radius: 2px;border: 1px solid gray;">
                </form>
                <script>
                function ChuyenTrang() {
                    location.assign("Login.php");
                }
                </script>
            </form>

            <?php
      include("Connect.php");
      if(isset($_POST['submit'])){
        if(empty($_POST['name']) or empty($_POST['password']) or empty($_POST['password1'])){
          echo'<div class="alert alert-success">
                <strong>Vui lòng không để trống</strong>.
                </div>';
        }
        else{
          $name= $_POST['name'];
          $password= $_POST['password'];
          $password1= $_POST['password1'];
          #kiểm tra đếm số kí tự
          if(strlen($name) <= 4 or strlen($password) <= 4){
            echo '<p class ="ThongBao">Tên tài khoản và mật khẩu phải lớn hơn 4 kí tự</p>';
          }
          else{
            if($password1 != $password){
              echo '<p class ="ThongBao">Mật Khẩu Không giống nhau</p>';
            }
            # Kiểm tra xem có bị trung nhau không
            else{
              $sql="SELECT  * FROM information WHERE name='$name'";
              $query = mysqli_query($db,$sql);
              $num_row=mysqli_num_rows($query);
              if($num_row==0){
                $password = md5($password);
                $sql="INSERT INTO information(name,password) VALUES('$name','$password')";
                $query = mysqli_query($db,$sql);
                echo'<div class="alert alert-success">
                <strong>Đăng ký tài khoản!</strong> Thành công.
                </div>';
                header( "refresh:1;url=Login.php" );
                die();
              }
              // Đã có
              else{
                echo '<script language="javascript">';
                echo 'alert("Tài Khoản Đã Tồn Tại")';
                echo '</script>';
                echo'<div class="alert alert-success">
                <strong>Điền lại thông tin</strong> tài khoản.
                </div>';
              }
            }
          }
        }
      }
      ?>
        </div>

</body>

</html>