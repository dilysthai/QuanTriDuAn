<?php 
   require_once('Connect.php');
  include("DungChung.php");
?>

<div class="Phan2Phai">
    <div class="DangNhapThanhCong">
        <p>Danh Sách Sản Phẩm</p>
    </div>
    <div class="container" style="margin-top: 20px;margin-left:5px;">
        <div class="row">
            <form action="TimKiemSanPham.php" method="get" style="margin-left: 5px;">
                <input id="MaSP" type="number" class="col-md-20 form-control" name="MaSP" value="Nhập mã sản phẩm"
                    style="margin-left: 90px;">
                <input type="submit" name="Ok" value="search" class="btn btn-danger"
                    style="margin-left: 10px;margin-top: -66px;;background:#f86c6b" />
            </form>
            <div class="col-md-2"><a href="Add_Edit_SanPham.php" class="btn btn-danger" role="button"
                    style="margin-left:730px;width:157px;height:40px;padding-bottom:20px;background:#f86c6b">Thêm Sản Phẩm</a></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-success text-white" style=" text-align: center;">
                    <th>STT</th>
                    <th>Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Danh Mục Sản Phẩm</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
                    <th>Sale</th>
                    <th>Hot</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  $result = mysqli_query($db, 'SELECT count(MaSP) as total from sanpham');
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
                      $result = mysqli_query($db, "SELECT sanpham.MaSP, danhmucsanpham.TenDMSP, sanpham.AnhSP, sanpham.TenSP, sanpham.MoTa, sanpham.Gia, sanpham.Hot, sanpham.Sale FROM sanpham INNER JOIN danhmucsanpham ON danhmucsanpham.MaDMSP=sanpham.MaDMSP LIMIT $start, $limit");
                    
                    if (isset($_REQUEST['Ok'])) 
                    {
                        $MaSP = addslashes($_GET['MaSP']);
                        if (empty($MaSP)) {
                            echo "Yeu cau nhap du lieu vao o trong";
                        } 
                        else
                        {
                            $sql = "SELECT sanpham.MaSP, danhmucsanpham.TenDMSP, sanpham.AnhSP, sanpham.TenSP, sanpham.MoTa, sanpham.Gia, sanpham.Hot, sanpham.Sale FROM sanpham INNER JOIN danhmucsanpham ON danhmucsanpham.MaDMSP=sanpham.MaDMSP and MaSP like '%$MaSP%'";
                            $query = mysqli_query($db,$sql);
                            $num_row=mysqli_num_rows($query);
                            if ($num_row > 0 && $MaSP != "") 
                            {
                                echo "$num_row Kết Quả Trả Về Với Từ Khoá <b>$MaSP</b>";
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo '<tr style=" text-align: center;">
                                    <td >'.$row['MaSP'].'</td>
                                    <td><img src="../Image/'.$row['AnhSP'].'" style="width:110px;height:100px"></td>
                                    <td>'.$row['TenSP'].'</td>
                                    <td>'.$row['TenDMSP'].'</td>
                                    <td >'.$row['MoTa'].'</td>
                                    <td >'.$row['Gia'].'</td>
                                    <td>'.($row['Sale']==1 ? '<input type="checkbox" checked>': '<input type="checkbox">').'</td>
                                    <td>'.($row['Hot']==1 ? '<input type="checkbox" checked>': '<input type="checkbox">').'</td>
                                    <td><button class="btn btn-warning" onclick=\'window.open("Add_Edit_SanPham.php?id='.$row['MaSP'].'","_self")\'>Edit</button></td>
                                    <td><button class="btn btn-info" onclick=\'window.open("XoaSanPham.php?id='.$row['MaSP'].'","_self")\'>Delete</button></td>
                                  </tr>'; 
                                }
                            } 
                            else {
                                echo "Không tìm thấy sản phẩm nào!";
                            }
                        }
                    }
                    ?>
            </tbody>
        </table>

        <ul class="pagination">
            <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="DanhSachSanPham.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
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
                          echo '<a href="DanhSachSanPham.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="DanhSachSanPham.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
        </ul>
    </div>
</div>