<?php
  require_once('Connect.php');
  include("DungChung.php")
?>

      <div class="Phan2Phai">
          <div class="DangNhapThanhCong">
            <p>Danh Sách Đơn Hàng</p>
            
          </div>
          <div class="container" style="margin-top: 20px;margin-left:5px;">
              <div class="row">
    
                <form action="TimKiemDonHang.php" method="get" style="margin-left: 5px;">
                  <input id="MaDH" type="number" class="col-md-20 form-control" name="MaDH" value="Nhập mã đơn hàng" style="margin-left: 90px;"> 
                  <input type="submit" name="Ok" value="search" class="btn btn-danger" style="margin-left: 10px;margin-top: -66px;" /> 
                </form>
                <div class="col-md-2"><a href="Add_EditDonHang.php" class="btn btn-danger" role="button" style="margin-left:745px;width:157px;height:40px;padding-bottom:20px" >Thêm Đơn Hàng</a></div>
              </div>          
              <table class="table table-hover">
                <thead>
                  <tr class="bg-success text-white" style=" text-align: center;">
                    <th>STT</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tên Nhân Viên</th>
                    <th>Tên Sản Phẩm</th> 
                    <th>Ngày Mua</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Thay Đổi</th>
                    <th>Xoá Bỏ</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $result = mysqli_query($db, 'SELECT count(MaDH) as total from chitietdonhang');
                  $row = mysqli_fetch_assoc($result);
                  $total_records = $row['total'];
                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 6;
                        $total_page = ceil($total_records / $limit);
                        if ($current_page > $total_page){
                          $current_page = $total_page;
                      }
                      else if ($current_page < 1){
                          $current_page = 1;
                      }
                      $start = ($current_page - 1) * $limit;
                      // $result = mysqli_query($db, "SELECT  * from chitietdonhang LIMIT $start, $limit");
                      $result = mysqli_query($db, "SELECT chitietdonhang.MaDH, khachhang.TenKH, nhanvien.TenNV, sanpham.TenSP, chitietdonhang.NgayMua, chitietdonhang.SoLuong, ( sanpham.Gia*chitietdonhang.SoLuong), donhang.TrangThai FROM chitietdonhang INNER JOIN donhang ON chitietdonhang.MaDH=donhang.MaDH INNER JOIN sanpham ON chitietdonhang.MaSP=sanpham.MaSP INNER JOIN khachhang ON donhang.MaKH=khachhang.MaKH INNER JOIN nhanvien ON donhang.MaNV=nhanvien.MaNV LIMIT $start, $limit");
                 
                    foreach($result as $std){
                      echo '<tr style=" text-align: center;">
                      <td >'.$std['MaDH'].'</td>
                      <td>'.$std['TenKH'].'</td>
                      <td>'.$std['TenNV'].'</td>
                      <td>'.$std['TenSP'].'</td>
                      <td>'.$std['NgayMua'].'</td>
                      <td>'.$std['SoLuong'].'</td>
                      <td >'.$std['ThanhTien'].'</td>
                      <td>'.($std['TrangThai']==1 ? '<input type="checkbox" checked>': '<input type="checkbox">').'</td>
                      <td><button class="btn btn-warning" onclick=\'window.open("Add_EditDonHang.php.php?id='.$std['MaDH'].'","_self")\'>Edit</button></td>
                      <td><button class="btn btn-info" onclick=\'window.open("XoaDonHang.php?id='.$std['MaDH'].'","_self")\'>Delete</button></td>
                    </tr>'; 
                  }   
                ?>
                </tbody>
              </table>
              <ul class="pagination">
                  <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="QuanLyDonHang.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
                    }
                    else
                    {
                      echo '<span style="color:black;margin-left:15px">Prev</span> ';
                    }
                    for ($i = 1; $i <= $total_page; $i++){     
                      if ($i == $current_page){
                        echo '<span style="color:black;margin-left:15px">'.$i.'</span>  ';
                      }
                      else{
                          echo '<a href="QuanLyDonHang.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="QuanLyDonHang.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
              </ul>
        </div>
      </div>