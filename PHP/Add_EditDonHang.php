<?php
          $MaDH=$TenKH=$TenNV=$TenSP=$NgayMua=$SoLuong=$ThanhTien=$TrangThai='';
          require_once('Connect.php');
                if(isset($_POST['submit'])){ 
                   $MaDH = $_POST['MaDH'];
                   $TenKH = $_POST['TenKH'];
                   $TenNV = $_POST['TenNV'];
                   $TenSP = $_POST['TenSP'];
                   $NgayMua = $_POST['NgayMua'];
                   $SoLuong = $_POST['SoLuong'];
                   $ThanhTien = $_POST['ThanhTien'];
                   $TrangThai = $_POST['TrangThai'];
                   if(isset($TrangThai)){}
                  
                  // Xử lý lỗi khi nhập vào có dấu '
                  $MaDH = str_replace('\'','\\\'',$MaDH);
                  $TenKH = str_replace('\'','\\\'',$TenKH);
                  $TenNV = str_replace('\'','\\\'',$TenNV);
                  $TenSP = str_replace('\'','\\\'',$TenSP);
                  $NgayMua = str_replace('\'','\\\'',$NgayMua);
                  $SoLuong = str_replace('\'','\\\'',$SoLuong);
                  $ThanhTien = str_replace('\'','\\\'',$ThanhTien);
                  $TrangThai = str_replace('\'','\\\'',$TrangThai);


                  if(!empty($MaDH)){
                    $sql = "UPDATE sanpham set TenKH='$TenKH',TenNV='$TenNV',TenSP='$TenSP',NgayMua='$NgayMua',SoLuong='$SoLuong' ,ThanhTien='$ThanhTien',`TrangThai`='$TrangThai' WHERE MaDH=".$MaDH;
                  }
                  else{
                    $sql = "INSERT INTO chitietsanpham(MaDMSP,AnhSP,TenSP,MoTa,Gia,`Sale`,Hot) VALUES ('$MaDMSP','$AnhSP','$TenSP','$MoTa','$Gia','$Sale','$Hot')";
                  }
               
                  execute($sql);
                  header('Location:DanhSachSanPham.php');
                  die();
                  }

                  // Lấy dữ liệu dựa vào mã khách hàng để sửa
                  $MaDH ='';
                  if(isset($_GET['id'])){
                    $MaDH = $_GET['id'];
                    $sql = 'SELECT * FROM donhang where MaDH ='.$MaDH;
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
            <div class="container" style="border: 1px solid #343a40;width:95.5%;margin-top:40px;border-radius: 5px;background:#ddf1f2">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="text-center" style="margin-top:15px; font-size: 20px;font-weight: bold;font-family: 'Times New Roman', Times, serif;">Thêm Mới, Sửa Thông Tin Sản Phẩm</h3>
                  </div>
                  
                  <div class="panel-body">

                    <form method="post" enctype="multipart/form-data" >
                    <div class="form-group" style="color:red">
                        <label style="margin-left:360px;margin-top:20px">Chọn Sản Phẩm</label>
                        <input  required="true" type="file" id="AnhSP"  name="AnhSP"> 
                      </div>
                      <?php
                          $sql = 'SELECT * FROM danhmucsanpham';
                          $result =  mysqli_query($db,$sql);
                      ?>
                      <div class="form-group" >
                          <label >Tên Danh Mục Sản Phẩm</label> 
                          <select name="MaDMSP" id="MaDMSP">
                            <?php while($row1=mysqli_fetch_array($result)):;?> 
                              <option value="<?php echo $row1[0]; ?>" > <?php  echo $row1[1]?></option>
                            <?php endwhile ; ?>
                            </select>
                      </div> 

                      <div class="form-group" >
                        <label >Tên Sản Phẩm</label>
                        <input type="number" name="MaSP" value="<?=$MaSP?>" style="display: none;">
                        <input required="true" type="text" id="TenSP" class="form-control" value="<?=$TenSP?>" name="TenSP" placeholder="">
                      </div>

                      <div class="form-group" >
                        <label >Mô Tả</label>
                        <input required="true" type="text" id="MoTa" class="form-control" value="<?=$MoTa?>" name="MoTa" placeholder="">
                      </div>

                      <div class="form-group" >
                        <label>Giá </label>
                        <input required="true" type="text" id="Gia" class="form-control" value="<?=$Gia?>" name="Gia" placeholder="">
                      </div>

                      <div class="form-group" >
                        <label >Sản Phẩm Sale</label>
                        <input type="hidden" name="Sale" value="0">
                        <input type="checkbox" name="Sale" value="1">
                      </div> 

                      <div class="form-group" >
                        <label >Sản Phẩm Hot</label>
                        <input type="hidden" name="Hot" value="0">
                        <input type="checkbox" name="Hot" value="1">
                      </div> 

                      <button name="submit" class="btn btn-success"  style="margin-left: 500px" >Lưu Lại</button>
                      <br>
                   <br>
                    </form>
                  </div>
              </div>
            </div>
      </div>