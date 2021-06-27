<?php
          $MaTinTuc=$AnhTinTuc=$TenTinTuc=$MaDMTT=$MoTa=$ChiTiet=$TinTucNong='';
          require_once('Connect.php');
                if(isset($_POST['submit'])){ 
                   $MaTinTuc = $_POST['MaTinTuc'];
                   $AnhTinTuc = $_FILES['AnhTinTuc']['name'];
                   $AnhTinTuc_tmp = $_FILES['AnhTinTuc']['tmp_name'];
                   $target = "../Image/".basename($AnhTinTuc);
                   move_uploaded_file($AnhTinTuc_tmp, $target);
                   unlink($target.$AnhTinTuc);
                   $TenTinTuc = $_POST['TenTinTuc'];
                   $MaDMTT = $_POST['MaDMTT'];
                   $MoTa = $_POST['MoTa'];
                   $ChiTiet = $_POST['ChiTiet'];
                   $TinTucNong = $_POST['TinTucNong'];
                   if(isset($TinTucNong)){}
                 
                
                  $MaTinTuc = str_replace('\'','\\\'',$MaTinTuc);
                  $AnhTinTuc = str_replace('\'','\\\'',$AnhTinTuc);
                  $TenTinTuc = str_replace('\'','\\\'',$TenTinTuc);
                  $MaDMTT = str_replace('\'','\\\'',$MaDMTT);
                  $MoTa = str_replace('\'','\\\'',$MoTa);
                  $ChiTiet = str_replace('\'','\\\'',$ChiTiet);
                  $TinTucNong = str_replace('\'','\\\'',$TinTucNong);
          


                  if(!empty($MaTinTuc)){
                    $sql = "UPDATE tintuc set MaDMTT='$MaDMTT',AnhTinTuc='$AnhTinTuc',TenTinTuc='$TenTinTuc',MoTa='$MoTa',ChiTiet='$ChiTiet',TinTucNong='$TinTucNong' WHERE MaTinTuc=".$MaTinTuc;
                  }
                  else{
                    $sql = "INSERT INTO tintuc(MaDMTT,AnhTinTuc,TenTinTuc,MoTa,ChiTiet,TinTucNong) VALUES ('$MaDMTT','$AnhTinTuc','$TenTinTuc','$MoTa','$ChiTiet','$TinTucNong')";
                  }
               
                  execute($sql);
                  header('Location:DanhSachTinTuc.php');
                  die();
                  }

                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaTinTuc ='';
                  if(isset($_GET['id'])){
                    $MaTinTuc = $_GET['id'];
                    $sql = 'SELECT * FROM tintuc where MaTinTuc ='.$MaTinTuc;
                    $result = executeResult($sql);
                    foreach($result as $std) 
                      $MaDMTT = $std['MaDMTT'];
                      $AnhTinTuc = $std['AnhTinTuc'];
                      $TenTinTuc = $std['TenTinTuc'];
                      $MoTa = $std['MoTa'];
                      $ChiTiet = $std['ChiTiet'];
                      $TinTucNong = $std['TinTucNong']; 
                  }
?>
<?php 
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container"
        style="border: 1px solid #343a40;width:95.5%;margin-top:50px;border-radius: 5px;background:#ddf1f2;margin-left:40px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"
                    style="margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">
                    Thêm Mới, Sửa Thông Tin Tin Tức</h3>
            </div>

            <div class="panel-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group" style="color:red">
                        <label style="margin-left:330px;margin-top:20px">Chọn ảnh cho tin tức</label>
                        <input required="true" type="file" id="AnhTinTuc" name="AnhTinTuc">
                    </div>
                    <?php
                          $sql = 'SELECT * FROM danhmuctintuc';
                          $result =  mysqli_query($db,$sql);
                      ?>
                    <div class="form-group">
                        <label>Tên Danh Mục Tin Tức</label>
                        <select name="MaDMTT" id="MaDMTT">
                            <?php while($row1=mysqli_fetch_array($result)):;?>
                            <option value="<?php echo $row1[0]; ?>"> <?php  echo $row1[1]?></option>
                            <?php endwhile ; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên Tin Tức</label>
                        <input type="number" name="MaTinTuc" value="<?=$MaTinTuc?>" style="display: none;">
                        <input required="true" type="text" id="TenTinTuc" class="form-control" value="<?=$TenTinTuc?>"
                            name="TenTinTuc" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Mô Tả</label>
                        <input required="true" type="text" id="MoTa" class="form-control" value="<?=$MoTa?>" name="MoTa"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label> Chi Tiết</label>
                        <input required="true" type="text" id="ChiTiet" class="form-control" value="<?=$ChiTiet?>"
                            name="ChiTiet" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Tin Tức Nóng</label>
                        <input type="hidden" name="TinTucNong" value="0">
                        <input type="checkbox" name="TinTucNong" value="1">
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