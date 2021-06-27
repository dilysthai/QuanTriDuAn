<?php
          $MaNV=$TenNV=$NgaySinh=$SDT=$DiaChi=$TaiKhoan=$Check='';
          require_once('Connect.php');
                if(isset($_POST['submit'])){ 
                   $MaNV = $_POST['MaNV'];
                   $AnhNV = $_FILES['AnhNV']['name'];
                   $AnhNV_tmp = $_FILES['AnhNV']['tmp_name'];
                   $target = "../Image/".basename($AnhNV);
                   move_uploaded_file($AnhNV_tmp, $target);
                   unlink($target.$AnhNV);
                   $TenNV = $_POST['TenNV'];
                   $SDT = $_POST['SDT'];
                   $DiaChi = $_POST['DiaChi'];
                   $TaiKhoan = $_POST['TaiKhoan'];
                   $NgaySinh = $_POST['NgaySinh'];
                   $kiemtra=$_POST['kiemtra'];
                   if(isset($kiemtra)){}
                  // Xử lý lỗi khi nhập vào có dấu '
                  $TenNV = str_replace('\'','\\\'',$TenNV);
                  $SDT = str_replace('\'','\\\'',$SDT);
                  $DiaChi = str_replace('\'','\\\'',$DiaChi);
                  $TaiKhoan = str_replace('\'','\\\'',$TaiKhoan);
                  $NgaySinh = str_replace('\'','\\\'',$NgaySinh);

                  if(!empty($MaNV)){
                    $sql = "UPDATE nhanvien set AnhNV='$AnhNV',TenNV='$TenNV',NgaySinh='$NgaySinh',DiaChi='$DiaChi',SDT='$SDT' ,TaiKhoan='$TaiKhoan',`Check`='$kiemtra' WHERE MaNV=".$MaNV;
                  }
                  else{
                    $sql = "INSERT INTO nhanvien(TenNV,AnhNV,NgaySinh,DiaChi,SDT,TaiKhoan,`Check`) VALUES ('$TenNV','$AnhNV','$NgaySinh','$DiaChi','$SDT','$TaiKhoan','$kiemtra')";
                  }
               
                  execute($sql);
                  header('Location:QuanLyNhanVien.php');
                  die();
                  }

                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaNV ='';
                  if(isset($_GET['id'])){
                    $MaNV = $_GET['id'];
                    $sql = 'SELECT * FROM nhanvien where MaNV ='.$MaNV;
                    $result = executeResult($sql);
                    foreach($result as $std) 
                      $TenNV = $std['TenNV'];
                      $NgaySinh = $std['NgaySinh'];
                      $DiaChi = $std['DiaChi'];
                      $SDT = $std['SDT'];
                      $TaiKhoan = $std['TaiKhoan'];
                      $AnhNV = $std['AnhNV']; 
                  }
?>
<?php 
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container"
        style="border: 1px solid #343a40;width:95.5%;margin-top:30px;border-radius: 5px;background:#ddf1f2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"
                    style="margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">
                    Thêm Mới, Sửa Thông Tin Nhân Viên</h3>
            </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group" style="color:red">
                        <label style="margin-left:360px;margin-top:10px">Chọn ảnh cho nhân viên</label>
                        <input required="true" type="file" id="AnhNV" name="AnhNV">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label>Tên Nhân Viên</label>
                        <input type="number" name="MaNV" value="<?=$MaNV?>" style="display: none;">
                        <input required="true" type="text" id="TenNV" class="form-control" value="<?=$TenNV?>"
                            name="TenNV" placeholder="">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label>Sinh Ngày</label>
                        <input required="true" type="text" id="NgaySinh" class="form-control" value="<?=$NgaySinh?>"
                            name="NgaySinh" placeholder="">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label> Địa Chỉ</label>
                        <input required="true" type="text" id="DiaChi" class="form-control" value="<?=$DiaChi?>"
                            name="DiaChi" placeholder="">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label>SDT</label>
                        <input required="true" type="text" id="SDT" class="form-control" value="<?=$SDT?>" name="SDT"
                            placeholder="">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label>Tài Khoản</label>
                        <input required="true" type="text" id="TaiKhoan" class="form-control" value="<?=$TaiKhoan?>"
                            name="TaiKhoan" placeholder="">
                    </div>
                    <div class="form-group" style=" margin-top: -10px;">
                        <label>Quản trị</label>
                        <input type="hidden" name="kiemtra" value="0">
                        <input type="checkbox" name="kiemtra" value="1">
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