<?php 
  include("DungChung.php");
  include("Connect.php");
?>

<div class="Phan2Phai">
    <div class="DangNhapThanhCong">
        <p>Danh Mục Sản Phẩm</p>
    </div>

    <div class="container" style="margin-top: 20px;margin-left:5px;">
        <div class="row">
            <form action="TimKiemDMSP.php" method="get" style="margin-left: 5px;">
                <input id="MaDMSP" type="number" class="col-md-20 form-control" name="MaDMSP"
                    value="Nhập mã danh mục sản phẩm" style="margin-left: 90px;">
                <input type="submit" name="Ok" value="search" class="btn btn-danger"
                    style="margin-left: 10px;margin-top: -66px;;background:#f86c6b" />
            </form>
            <div class="col-md-2"><a href="AddEditDMSP.php" class="btn btn-danger" role="button"
                    style="margin-left:730px;width:157px;height:40px;padding-bottom:20px;background:#f86c6b">Thêm Danh Mục</a></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-success text-white" style=" text-align: center;">
                    <th>Mã Danh Mục Sản Phẩm</th>
                    <th>Danh Mục Sản Phẩm</th>
                    <th>Thay Đổi</th>
                    <th>Xoá Bỏ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($db, 'SELECT count(MaDMSP) as total from danhmucsanpham');
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                          $limit = 5;
                          $total_page = ceil($total_records / $limit);
                          if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        $start = ($current_page - 1) * $limit;
                        $result = mysqli_query($db, "SELECT * FROM danhmucsanpham LIMIT $start, $limit");
                        
                    if (isset($_REQUEST['Ok'])) 
                    {
                        $MaDMSP = addslashes($_GET['MaDMSP']);
                        if (empty($MaDMSP)) {
                            echo "Yeu cau nhap du lieu vao o trong";
                        } 
                        else
                        {
                          $sql = "select * from danhmucsanpham where MaDMSP like '%$MaDMSP%'";
                          $query = mysqli_query($db,$sql);
                          $num_row=mysqli_num_rows($query);
                          if ($num_row > 0 && $MaDMSP != "") 
                          {
                            echo "$num_row Kết Quả Trả Về Với Từ Khoá <b>$MaDMSP</b>";
                            while ($row = mysqli_fetch_assoc($query)) {
                              echo '<tr style=" text-align: center;">
                              <td>'.$row['MaDMSP'].'</td>
                              <td>'.$row['TenDMSP'].'</td>
                              <td><button class="btn btn-warning" 
                              onclick=\'window.open("AddEditDMSP.php?id='.$row['MaDMSP'].'","_self")\'>Edit</button></td>
                              <td><button class="btn btn-info" 
                              onclick=\'window.open("XoaDMSP.php?id='.$row['MaDMSP'].'","_self")\'>Delete</button></td>
                              </tr>';
                            }
                          } 
                          else {
                            echo "Không Tìm Thấy Khách Hàng!";
                          }
                      }
                    }
                    ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="DanhMucSanPham.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
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
                          echo '<a href="DanhMucSanPham.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="DanhMucSanPham.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
        </ul>
    </div>
</div>