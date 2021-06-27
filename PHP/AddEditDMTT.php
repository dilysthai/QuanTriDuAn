<?php
          $MaDMTT=$TenDMTT='';
          require_once('Connect.php');
          if(isset($_POST['submit'])){
                  
                  $MaDMTT = $_POST['MaDMTT'];
                  $TenDMTT = $_POST['TenDMTT'];
                 
                  $TenDMTT = str_replace('\'','\\\'',$TenDMTT);

                  if($MaDMTT!=''){
                    $sql = "UPDATE danhmuctintuc set TenDMTT ='$TenDMTT' WHERE MaDMTT=".$MaDMTT or die("Lỗi truy vấn");
                  }
                  else{
                    $sql = "INSERT INTO danhmuctintuc(TenDMTT) VALUES ('$TenDMTT')" or die("Lỗi truy vấn"); 
                  }
                 
                  execute($sql);
                  header('Location:DanhMucTinTuc.php');
                  die();
                  }
                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaDMTT ='';
                  if(isset($_GET['id'])){
                    $MaDMTT = $_GET['id'];
                    $sql = 'SELECT * FROM danhmuctintuc where MaDMTT ='.$MaDMTT;
                    $danhmuctintuclist = executeResult($sql);
                    // Nếu tìm được khách hàng thì gán dữ liệu cho nó
                    if($danhmuctintuclist !=null && count($danhmuctintuclist)>0){
                      $std = $danhmuctintuclist[0];
                      $TenDMTT = $std['TenDMTT'];                 
                    }
                    else{
                      $MaDMTT = '';
                    }
                  }
?>
<?php 
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container" style="border: 1px solid #343a40;margin-top:30px;border-radius: 5px;background:#ddf1f2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"
                    style="margin-top:15px;margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">
                    Thêm Mới, Sửa Danh Mục Tin Tức</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label>Danh Mục Tin Tức</label>
                        <input type="number" name="MaDMTT" value="<?=$MaDMTT?>" style="display: none;">
                        <input required="true" type="text" class="form-control" value="<?=$TenDMTT?>" name="TenDMTT"
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