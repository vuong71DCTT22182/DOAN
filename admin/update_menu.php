<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if (isset($_POST['submit']))           //if upload btn is pressed
{







    if (empty($_POST['d_name']) || empty($_POST['about']) || $_POST['price'] == '' || $_POST['res_name'] == '') {
        $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Tất cả các trường Phải được điền!</strong>
															</div>';
    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "Res_img/dishes/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {


                $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Kích thước hình ảnh tối đa là 1024kb!</strong> Hãy thử hình ảnh khác.
															</div>';
            } else {




                $sql = "update dishes set rs_id='$_POST[res_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',img='$fnew' where d_id='$_GET[menu_upd]'";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Đã cập nhật bản ghi!</strong>
															</div>';
            }
        }
    }
}








?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>


    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>

                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/meow.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Trang chủ</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Bảng điều khiển</span></a></li>
                        <li class="nav-label">Nhật ký</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Người dùng</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">Tất cả nhà hàng</a></li>
                                <li><a href="add_category.php">Thêm quốc gia</a></li>
                                <li><a href="add_restaurant.php">Thêm nhà hàng</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Tất cả thực đơn</a></li>
                                <li><a href="add_menu.php">Thêm thực đơn</a></li>



                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn đặt hàng</span></a></li>


                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">
            <div style="padding-top: 10px;">
                <!-- <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> là chủ sở hữu duy nhất của tập lệnh này. Nó không phù hợp cho sử dụng cá nhân. Và phát hành nó trong phiên bản demo. Ngoài ra, nó chỉ được cung cấp miễn phí từ <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>. Đối với bất kỳ vấn đề nào của bạn, hãy liên hệ với chúng tôi trên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">META</a> trên Facebook. Cảm ơn vì đã ở bên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>.</marquee> -->
            </div>




            <div class="container-fluid">



                <?php echo $error;
                echo $success; ?>




                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Thêm thực đơn vào nhà hàng</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">
                                    <?php $qml = "select * from dishes where d_id='$_GET[menu_upd]'";
                                    $rest = mysqli_query($db, $qml);
                                    $roww = mysqli_fetch_array($rest);
                                    ?>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên món ăn</label>
                                                <input type="text" name="d_name" value="<?php echo $roww['title']; ?>" class="form-control" placeholder="Morzirella">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Miêu tả</label>
                                                <input type="text" name="about" value="<?php echo $roww['slogan']; ?>" class="form-control form-control-danger" placeholder="slogan">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Giá </label>
                                                <input type="text" name="price" value="<?php echo $roww['price']; ?>" class="form-control" placeholder="$">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Hình ảnh</label>
                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">





                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Chọn nhà hàng</label>
                                                <select name="res_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Chọn nhà hàng--</option>
                                                    <?php $ssql = "select * from restaurant";
                                                    $res = mysqli_query($db, $ssql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo ' <option value="' . $row['rs_id'] . '">' . $row['title'] . '</option>';;
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                    </div>

                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                            <a href="all_menu.php" class="btn btn-inverse">Hủy bỏ</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include "include/footer.php" ?>

        </div>

    </div>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>


</html>