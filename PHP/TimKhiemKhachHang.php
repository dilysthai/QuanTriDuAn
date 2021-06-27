<?php 
  include("DungChung.php");
  include("Connect.php");
?>

<div class="Phan2Phai">
    <div class="DangNhapThanhCong">
        <p>Danh Sách Khách Hàng</p>
    </div>
    <div class="container" style="margin-top: 30px;margin-left:5px;">
        <div class="row">

            <form action="TimKhiemKhachHang.php" method="get" style="margin-left: 5px;">
                <input id="MaKH" type="number" class="col-md-20 form-control" name="MaKH" style="margin-left: 90px;">
                <input type="submit" name="Ok" value="search" class="btn btn-danger"
                    style="margin-left: 10px;margin-top: -66px;;background:#f86c6b" />
            </form>
            <div class="col-md-2"><a href="AddKhachHang.php" class="btn btn-danger" role="button"
                    style="margin-left:730px;width:157px;height:40px;padding-bottom:20px;background:#f86c6b">Thêm Khách Hàng</a></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-success text-white" style=" text-align: center;">
                    <th>Mã</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Sinh</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Thay Đổi</th>
                    <th>Xoá Bỏ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($db, 'SELECT count(MaKH) as total from khachhang');
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
                        $result = mysqli_query($db, "SELECT * FROM khachhang LIMIT $start, $limit");
                    if (isset($_REQUEST['Ok'])) 
                    {
                        $MaKH = addslashes($_GET['MaKH']);
                        if (empty($MaKH)) {
                            echo '<script type="text/javascript">alert("Nhập thông tin vào để tìm kiếm")</script>';
                            header( "refresh:0.05;url= QuanLyKhachHang.php" );
                            die();
                        } 
                        else
                        {
                            $sql = "select * from khachhang where MaKH like '%$MaKH%'";
                            $query = mysqli_query($db,$sql);
                            $num_row=mysqli_num_rows($query);
                            if ($num_row > 0 && $MaKH != "") 
                            {
                                echo "$num_row Kết Quả Trả Về Với Từ Khoá <b>$MaKH</b>";
                                while ($row = mysqli_fetch_assoc($query)) {
                                  echo '<tr style=" text-align: center;">
                                  <td>'.$row['MaKH'].'</td>
                                  <td>'.$row['TenKH'].'</td>
                                  <td>'.$row['SinhNgay'].'</td>
                                  <td>'.$row['DiaChi'].'</td>
                                  <td>'.$row['SDT'].'</td>
                                  <td>'.$row['Email'].'</td>
                                  <td><button class="btn btn-warning" onclick=\'window.open("AddKhachHang.php?id='.$row['MaKH'].'","_self")\'>Edit</button></td>
                                  <td><button class="btn btn-info" onclick=\'window.open("XoaKhachHang.php?id='.$row['MaKH'].'","_self")\'>Delete</button></td>
                                </tr>';
                                }
                            } 
                            else {
                                echo '<script type="text/javascript">alert("Không tìm thấy khách hàng")</script>';
                            }
                        }
                    }
                    ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="QuanLyKhachHang.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
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
                          echo '<a href="QuanLyKhachHang.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="QuanLyKhachHang.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
        </ul>
    </div>
</div>