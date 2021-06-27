<?php 
   require_once('Connect.php');
  include("DungChung.php");
?>

<div class="Phan2Phai">
    <div class="DangNhapThanhCong">
        <p>Danh Sách Tin Tức</p>
    </div>
    <div class="container" style="margin-top: 20px;margin-left:5px;">
        <div class="row">
            <form action="TimKiemTinTuc.php" method="get" style="margin-left: 5px;">
                <input id="MaTinTuc" type="number" class="col-md-20 form-control" name="MaTinTuc"
                    value="Nhập mã tin tức" style="margin-left: 90px;">
                <input type="submit" name="Ok" value="search" class="btn btn-danger"
                    style="margin-left: 10px;margin-top: -66px;;background:#f86c6b" />
            </form>
            <div class="col-md-2"><a href="Add_Edit_TinTuc.php" class="btn btn-danger" role="button"
                    style="margin-left:730px;width:157px;height:40px;padding-bottom:20px;background:#f86c6b">Thêm Tin Tức</a></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-success text-white" style=" text-align: center;">
                    <th>STT</th>
                    <th>Ảnh Tin Tức</th>
                    <th>Tên Tin Tức</th>
                    <th>Danh Mục Tin Tức</th>
                    <th>Mô Tả</th>
                    <th>Chi Tiết</th>
                    <th>Tin Tức Nóng</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  $result = mysqli_query($db, 'SELECT count(MaTinTuc) as total from tintuc');
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
                      $result = mysqli_query($db, "SELECT tintuc.MaTinTuc, tintuc.AnhTinTuc, tintuc.TenTinTuc,danhmuctintuc.TenDMTT, tintuc.MoTa, tintuc.ChiTiet, tintuc.TinTucNong FROM tintuc INNER JOIN danhmuctintuc ON danhmuctintuc.MaDMTT=tintuc.MaDMTT LIMIT $start, $limit");
                    
                    if (isset($_REQUEST['Ok'])) 
                    {
                        $MaTinTuc = addslashes($_GET['MaTinTuc']);
                        if (empty($MaTinTuc)) {
                            echo "Yeu cau nhap du lieu vao o trong";
                        } 
                        else
                        {
                            $sql = "SELECT tintuc.MaTinTuc, tintuc.AnhTinTuc, tintuc.TenTinTuc,danhmuctintuc.TenDMTT, tintuc.MoTa, tintuc.ChiTiet, tintuc.TinTucNong FROM tintuc INNER JOIN danhmuctintuc ON danhmuctintuc.MaDMTT=tintuc.MaDMTT and MaTinTuc like '%$MaTinTuc%'";
                            $query = mysqli_query($db,$sql);
                            $num_row=mysqli_num_rows($query);
                            if ($num_row > 0 && $MaTinTuc != "") 
                            {
                                echo "$num_row Kết Quả Trả Về Với Từ Khoá <b>$MaTinTuc</b>";
                                while ($std = mysqli_fetch_assoc($query)) {
                                    echo '<tr style=" text-align: center;">
                                    <td >'.$std['MaTinTuc'].'</td>
                                    <td><img src="../Image/'.$std['AnhTinTuc'].'" style="width:110px;height:100px"></td>
                                    <td>'.$std['TenTinTuc'].'</td>
                                    <td>'.$std['TenDMTT'].'</td>
                                    <td >'.$std['MoTa'].'</td>
                                    <td>'.$std['ChiTiet'].'</td>
                                    <td>'.($std['TinTucNong']==1 ? '<input type="checkbox" checked>': '<input type="checkbox">').'</td>
                                    <td><button class="btn btn-warning" onclick=\'window.open("Add_Edit_TinTuc.php?id='.$std['MaTinTuc'].'","_self")\'>Edit</button></td>
                                    <td><button class="btn btn-info" onclick=\'window.open("XoaTinTuc.php?id='.$std['MaTinTuc'].'","_self")\'>Delete</button></td>
                                  </tr>'; 
                                }
                            } 
                            else {
                                echo "Không tìm thấy tin tức!";
                            }
                        }
                    }
                    ?>
            </tbody>
        </table>

        <ul class="pagination">
            <?php
                      if ($current_page > 1 && $total_page > 1){
                        echo '<a href="DanhSachTinTuc.php?page='.($current_page-1).'" style="color:black;margin-left:15px">Prev</a>  ';
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
                          echo '<a href="DanhSachTinTuc.php?page='.$i.'" style="color:black;margin-left:15px">'.$i.'</a>';
                      }
                  }
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a href="DanhSachTinTuc.php?page='.($current_page+1).'" style="color:black;margin-left:15px">Next</a>';
                  }
                  else 
                  {
                    echo '<span style="color:black;margin-left:15px">Next</span> ';
                  }
                  ?>
        </ul>
    </div>
</div>