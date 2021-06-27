<?php
          $MaDMSP=$TenDMSP='';
          require_once('Connect.php');
          if(isset($_POST['submit'])){
                  
                  $MaDMSP = $_POST['MaDMSP'];
                  $TenDMSP = $_POST['TenDMSP'];
                 
                  $TenDMSP = str_replace('\'','\\\'',$TenDMSP);

                  if($MaDMSP!=''){
                    $sql = "UPDATE danhmucsanpham set TenDMSP ='$TenDMSP' WHERE MaDMSP=".$MaDMSP or die("Lỗi truy vấn");
                  }
                  else{
                    $sql = "INSERT INTO danhmucsanpham(TenDMSP) VALUES ('$TenDMSP')" or die("Lỗi truy vấn"); 
                  }
                 
                  execute($sql);
                  header('Location:DanhMucSanPham.php');
                  die();
                  }
                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaDMSP ='';
                  if(isset($_GET['id'])){
                    $MaDMSP = $_GET['id'];
                    $sql = 'SELECT * FROM danhmucsanpham where MaDMSP ='.$MaDMSP;
                    $danhmucsanphamlist = executeResult($sql);
                    // Nếu tìm được khách hàng thì gán dữ liệu cho nó
                    if($danhmucsanphamlist !=null && count($danhmucsanphamlist)>0){
                      $std = $danhmucsanphamlist[0];
                      $TenDMSP = $std['TenDMSP'];                 
                    }
                    else{
                      $MaDMSP = '';
                    }
                  }
?>
<?php 
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container" style="border: 1px solid #343a40;margin-top:30px;border-radius: 5px;background:#ddf1f2;margin-left:40px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"
                    style="margin-top:15px;margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">
                    Thêm Mới, Sửa Danh Mục Sản Phẩm</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label>Danh Mục Sản Phẩm</label>
                        <input type="number" name="MaDMSP" value="<?=$MaDMSP?>" style="display: none;">
                        <input required="true" type="text" class="form-control" value="<?=$TenDMSP?>" name="TenDMSP"
                            placeholder="Nhập Vào tên danh mục">
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