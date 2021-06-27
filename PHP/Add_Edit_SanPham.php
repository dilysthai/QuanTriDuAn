<?php
      $MaSP=$MaDMSP=$AnhSP=$TenSP=$MoTa=$Gia=$Sale=$Hot='';
      require_once('Connect.php');
      if(isset($_POST['submit'])){ 
        $MaSP = $_POST['MaSP'];
        $MaDMSP = $_POST['MaDMSP'];
        $AnhSP = $_FILES['AnhSP']['name'];
        $AnhSP_tmp = $_FILES['AnhSP']['tmp_name'];
        $target = "../Image/".basename($AnhSP);
        move_uploaded_file($AnhSP_tmp, $target);
        unlink($target.$AnhSP);
        $TenSP = $_POST['TenSP'];
        $MoTa = $_POST['MoTa'];
        $Gia = $_POST['Gia'];
        $Sale = $_POST['Sale'];
        if(isset($Sale)){}
        $Hot=$_POST['Hot'];
        if(isset($Hot)){}
        $AnhSP = str_replace('\'','\\\'',$AnhSP);
        $TenSP = str_replace('\'','\\\'',$TenSP);
        $MoTa = str_replace('\'','\\\'',$MoTa);
        $Sale = str_replace('\'','\\\'',$Sale); 
        $Hot = str_replace('\'','\\\'',$Hot);
        if(!empty($MaSP)){
          $sql = "UPDATE sanpham set MaDMSP='$MaDMSP',AnhSP='$AnhSP',
          TenSP='$TenSP',MoTa='$MoTa',Gia='$Gia' ,Sale='$Sale',`Hot`='$Hot' WHERE MaSP=".$MaSP;
        }
        else{
          $sql = "INSERT INTO sanpham(MaDMSP,AnhSP,TenSP,MoTa,Gia,`Sale`,Hot) 
          VALUES ('$MaDMSP','$AnhSP','$TenSP','$MoTa','$Gia','$Sale','$Hot')";
        }
        execute($sql);
        header('Location:DanhSachSanPham.php');
        die();
        }
        $MaSP ='';
        if(isset($_GET['id'])){
          $MaSP = $_GET['id'];
          $sql = 'SELECT * FROM sanpham where MaSP ='.$MaSP;
          $result = executeResult($sql);
          foreach($result as $std) 
            $MaDMSP = $std['MaDMSP'];
            $AnhSP = $std['AnhSP'];
            $TenSP = $std['TenSP'];
            $MoTa = $std['MoTa'];          
            $Gia = $std['Gia']; 
            $Sale = $std['Sale'];
            $Hot = $std['Hot']; 
        }
?>
<?php
  include("DungChung.php");
?>
<div class="Phan2Phai">
    <div class="container"
        style="border: 1px solid #343a40;width:95.5%;margin-top:30px;border-radius: 5px;background:#ddf1f2;margin-left:50px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"
                    style="margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">
                    Thêm Mới, Sửa Thông Tin Sản Phẩm</h3>
            </div>

            <div class="panel-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group" style="color:red">
                        <label style="margin-left:320px;margin-top:20px">Chọn ảnh cho sản phẩm</label>
                        <input required="true" type="file" id="AnhSP" name="AnhSP">
                    </div>
                    <?php
                          $sql = 'SELECT * FROM danhmucsanpham';
                          $result =  mysqli_query($db,$sql);
                      ?>
                    <div class="form-group">
                        <label>Tên Danh Mục Sản Phẩm</label>
                        <select name="MaDMSP" id="MaDMSP">
                            <?php while($row1=mysqli_fetch_array($result)):;?>
                            <option value="<?php echo $row1[0]; ?>"> <?php  echo $row1[1]?></option>
                            <?php endwhile ; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="number" name="MaSP" value="<?=$MaSP?>" style="display: none;">
                        <input required="true" type="text" id="TenSP" class="form-control" value="<?=$TenSP?>"
                            name="TenSP" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Mô Tả</label>
                        <input required="true" type="text" id="MoTa" class="form-control" value="<?=$MoTa?>" name="MoTa"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Giá </label>
                        <input required="true" type="text" id="Gia" class="form-control" value="<?=$Gia?>" name="Gia"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Sản Phẩm Sale</label>
                        <input type="hidden" name="Sale" value="0">
                        <input type="checkbox" name="Sale" value="1">
                    </div>

                    <div class="form-group">
                        <label>Sản Phẩm Hot</label>
                        <input type="hidden" name="Hot" value="0">
                        <input type="checkbox" name="Hot" value="1">
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