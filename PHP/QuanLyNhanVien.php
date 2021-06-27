<?php 
  require_once('Connect.php');
  include("DungChung.php");
?>

<div class="Phan2Phai">
    <div class="DangNhapThanhCong">
        <p>Danh Sách Nhân Viên</p>

    </div>
    <div class="container" style="margin-top: 20px;margin-left:5px;">
        <div class="row">

            <form action="TimKiemNhanVien.php" method="get" style="margin-left: 5px;">
                <input id="MaNV" type="number" class="col-md-20 form-control" name="MaNV" value="Nhập mã nhân viên"
                    style="margin-left: 90px;">
                <input type="submit" name="Ok" value="search" class="btn btn-danger"
                    style="margin-left: 10px;margin-top: -66px;;background:#f86c6b" />
            </form>
            <div class="col-md-2"><a href="Add_Edit_Update_NhanVien.php" class="btn btn-danger" role="button"
                    style="margin-left:730px;width:157px;height:40px;padding-bottom:20px;background:#f86c6b">Thêm Nhân Viên</a></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-success text-white" style=" text-align: center;">
                    <th>Mã</th>
                    <th>Ảnh Nhân Viên</th>
                    <th>Họ Và Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Tài Khoản</th>
                    <th>Chức năng</th>
                    <th>Thay Đổi</th>
                    <th>Xoá Bỏ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $result = mysqli_query($db, 'SELECT count(MaNV) as total from nhanvien');
                   $row = mysqli_fetch_assoc($result);
                   $total_records = $row['total'];
                   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                         $limit = 3;
                         $total_page = ceil($total_records / $limit);
                         if ($current_page > $total_page){
                           $current_page = $total_page;
                       }
                       else if ($current_page < 1){
                           $current_page = 1;
                       }
                       $start = ($current_page - 1) * $limit;
                       $result = mysqli_query($db, "SELECT * FROM nhanvien LIMIT $start, $limit");
                        
                     foreach($result as $std){
                      echo '<tr style=" text-align: center;">
                        <td>'.$std['MaNV'].'</td>
                        <td><img src="../Image/'.$std['AnhNV'].'"  style="width:70px;height:80px"></td>
                        <td>'.$std['TenNV'].'</td>
                        <td>'.$std['NgaySinh'].'</td>
                        <td>'.$std['DiaChi'].'</td>
                        <td>'.$std['SDT'].'</td>
                        <td>'.$std['TaiKhoan'].'</td>
                        <td>'.($std['Check']==1 ? '<input type="checkbox" checked>': '<input type="checkbox">').'</td>
                        <td><button class="btn btn-warning" 
                        onclick=\'window.open("Add_Edit_Update_NhanVien.php?id='.$std['MaNV'].'","_self")\'>Edit</button></td>
                        <td><button class="btn btn-info" 
                        onclick=\'window.open("XoaNhanVien.php?id='.$std['MaNV'].'","_self")\'>Delete</button></td>
                      </tr>'; 
                  }   
                ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="QuanLyNhanVien.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
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
                          echo '<a href="QuanLyNhanVien.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="QuanLyNhanVien.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
        </ul>
    </div>
</div>