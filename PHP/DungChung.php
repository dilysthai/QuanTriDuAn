<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý LapTop Hoàng Nam </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../CSS/HomePage.css">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="../Image/image1.ico" alt="Logo"
                        style="height:30px;width:40px;  font-family: sans-serif;">&nbsp LapTop Hoàng Nam</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="HomePage.php"> <i class="menu-icon fa fa-dashboard"></i>Trang Chủ </a>
                    </li>
                    <h3 class="menu-title">Admin</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Quản lý sản phẩm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-th"></i><a href="Danhsachsanpham.php">Danh sách sản phẩm</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="DanhMucSanPham.php">Danh mục sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý khách hàng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="QuanLyKhachHang.php">Danh sách khách hàng</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Quản lý tin tức</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="DanhSachTinTuc.php">Danh sách tin tức</a>
                            </li>
                            <li><i class="menu-icon fa fa-th"></i><a href="DanhMucTinTuc.php">Danh mục tin tức</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Member</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Quản lý nhân viên</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="QuanLyNhanVien.php">Danh sách nhân
                                    viên</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../Image/image8.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="Registration.php"><i class="fa fa-cog"></i> Đăng ký</a>
                            <a class="nav-link" href="Login.php"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="../assets/js/dashboard.js"></script>
        <script src="../assets/js/widgets.js"></script>
        <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script>
        (function($) {
            "use strict";
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
        </script>

</body>

</html>