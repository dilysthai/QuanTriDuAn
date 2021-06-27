<?php
          $MaKH=$TenKH=$SinhNgay=$SDT=$DiaChi=$Email='';
          require_once('Connect.php');
          if(isset($_POST['submit'])){
                  
                  $MaKH = $_POST['MaKH'];
                  $TenKH = $_POST['TenKH'];
                  $SinhNgay = $_POST['SinhNgay'];
                  $DiaChi = $_POST['DiaChi'];
                  $SDT = $_POST['SDT'];
                  $Email = $_POST['Email'];
                  $checkmail= "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
                  if(!preg_match($checkmail, $Email)) { 
                    echo '<script language="javascript">';
                    echo 'alert("Email không hợp lệ")';
                    echo '</script>';
                  } 
                  else { 
                    echo '<script language="javascript">';
                    echo 'alert("Lưu Thành Công")';
                    echo '</script>';                
                    // Xử lý lỗi khi nhập vào có dấu '
                    $TenKH = str_replace('\'','\\\'',$TenKH);
                    $SinhNgay = str_replace('\'','\\\'',$SinhNgay);
                    $DiaChi = str_replace('\'','\\\'',$DiaChi);
                    $SDT = str_replace('\'','\\\'',$SDT);
                    $TaiKhoan = str_replace('\'','\\\'',$Email);
                    $MaKH = str_replace('\'','\\\'',$MaKH);

                    if($MaKH!=''){
                      $sql = "UPDATE khachhang set TenKH ='$TenKH',SinhNgay='$SinhNgay',DiaChi='$DiaChi',SDT='$SDT',Email='$Email' WHERE MaKH=".$MaKH or die("Lỗi truy vấn");
                    }
                    else{
                      $sql = "INSERT INTO khachhang(TenKH,SinhNgay,DiaChi,SDT,Email) VALUES ('$TenKH','$SinhNgay','$DiaChi','$SDT','$Email')" or die("Lỗi truy vấn"); 
                    }
                  
                    execute($sql);
                    header('Location:QuanLyKhachHang.php');
                    die();
                  }    
                }         
                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaKH ='';
                  if(isset($_GET['id'])){
                    $MaKH = $_GET['id'];
                    $sql = 'SELECT * FROM khachhang where MaKH ='.$MaKH;
                    $khachhanglist = executeResult($sql);
                    // Nếu tìm được khách hàng thì gán dữ liệu cho nó
                    if($khachhanglist !=null && count($khachhanglist)>0){
                      $std = $khachhanglist[0];
                      $TenKH = $std['TenKH'];
                      $SinhNgay = $std['SinhNgay'];
                      $DiaChi = $std['DiaChi'];
                      $SDT = $std['SDT'];
                      $Email = $std['Email'];                  
                    }
                    else{
                      $MaKH = '';
                    }
                  }
?>
<?php 
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container" style="border: 1px solid #343a40;margin-top:50px;border-radius: 5px;background:#ddf1f2;margin-left:40px">
        <div class="panel panel-primary">
            <div class="panel-heading" style="display:flex;">
                <h3 class="text-center"
                    style="margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;margin-left:330px">
                    Thêm Mới, Sửa Thông Tin Khách Hàng</h3>
                <i class="fa fa-users" aria-hidden="true" style="color: red;margin-top:20px;margin-left:10px"></i>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input type="number" name="MaKH" value="<?=$MaKH?>" style="display: none;">
                        <input required="true" type="text" class="form-control" value="<?=$TenKH?>" name="TenKH"
                            placeholder="Nhập Vào tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label>Sinh Ngày</label>
                        <input required="true" type="text" id="SinhNgay" class="form-control" value="<?=$SinhNgay?>"
                            name="SinhNgay" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input required="true" type="text" id="DiaChi" class="form-control" value="<?=$DiaChi?>"
                            name="DiaChi" placeholder="Nhập vào địa chỉ">
                    </div>
                    <div class="form-group">
                        <label> Số Điện Thoại</label>
                        <input required="true" type="text" id="SDT" class="form-control" value="<?=$SDT?>" name="SDT"
                            placeholder="Nhập vào số điện thoại">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required="true" type="text" id="Email" class="form-control" value="<?=$Email?>"
                            name="Email" placeholder="name@gmail.com">
                    </div>
                    <button onclick="quaylai()" class="btn btn-success" style="margin-left: 450px">Quay Lại</button>
                    <button name="submit" class="btn btn-success" style="margin-left: 50px">Lưu Lại</button>
                    <script>
                    function quaylai() {
                        history.go(-1);
                    }
                    </script>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>