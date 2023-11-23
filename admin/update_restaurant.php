
                <!DOCTYPE html>
                <html lang="en">
                <?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))        
{
	
			
		
			
		  
		
		
		if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['url']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Tất cả các trường Phải được điền!</strong>
															</div>';
									
		
								
		}
	else
		{
		
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "Res_img/".basename($fnew);                   
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
		
		
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>
                                                                Kích thước hình ảnh tối đa là 1024kb!</strong> Hãy thử hình ảnh khác.
															</div>';
	   
										}
		
									else
										{
												
												
												$res_name=$_POST['res_name'];
				                                 
												$sql = "update restaurant set c_id='$_POST[c_name]', title='$res_name',email='$_POST[email]',phone='$_POST[phone]',url='$_POST[url]',o_hr='$_POST[o_hr]',c_hr='$_POST[c_hr]',o_days='$_POST[o_days]',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' ";  // store the submited data ino the database :images												mysqli_query($db, $sql); 
													mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Đã cập nhật bản ghi!</strong>.
															</div>';
                
	
										}
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>chọn ảnh</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>phần mở rộng không hợp lệ!</strong>png, jpg, Gif are accepted.
															</div>';
						
	   
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
                    <title>Cập nhật nhà hàng</title>
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

                                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                                            <div class="dropdown-menu animated zoomIn">
                                                <ul class="mega-dropdown-menu row">
                                                   

                                                    <li class="col-lg-3  m-b-30">
                                                        <h4 class="m-b-20">LIÊN HỆ CHÚNG TÔI</h4>

                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Nhập tên">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" placeholder="Nhập email">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Tin nhắn"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-info">Nộp</button>
                                                        </form>
                                                    </li>
                                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                                        <h4 class="m-b-20">Kiểu danh sách</h4>

                                                        <ul class="list-style-none">
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                                        <h4 class="m-b-20">List style</h4>

                                                        <ul class="list-style-none">
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                                        <h4 class="m-b-20">List style</h4>

                                                        <ul class="list-style-none">
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Đây là một liên kết khác</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                  

                                    <ul class="navbar-nav my-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
                            <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> là chủ sở hữu duy nhất của tập lệnh này. Nó không phù hợp cho sử dụng cá nhân. Và phát hành nó trong phiên bản demo. Ngoài ra, nó chỉ được cung cấp miễn phí từ <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>. Đối với bất kỳ vấn đề nào của bạn, hãy liên hệ với chúng tôi trên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">META</a> trên Facebook. Cảm ơn vì đã ở bên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>.</marquee>
                            </div>

                            <div class="row page-titles">
                                <div class="col-md-5 align-self-center">
                                    <h3 class="text-primary">Bảng điều khiển</h3>
                                </div>
                            </div>

                            <div class="container-fluid">



                                <?php  echo $error;
									        echo $success; ?>




                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">

                                        <h4 class="m-b-0 ">Cập nhật nhà hàng</h4>

                                        <div class="card-body">
                                            <form action='' method='post' enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <?php $ssql ="select * from restaurant where rs_id='$_GET[res_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>
                                                    <hr>
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Tên nhà hàng</label>
                                                                <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" placeholder="John doe">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Email doanh nghiệp</label>
                                                                <input type="text" name="email" value="<?php echo $row['email'];  ?>" class="form-control form-control-danger" placeholder="example@gmail.com">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Điện thoại </label>
                                                                <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="1-(555)-555-5555">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">website URL</label>
                                                                <input type="text" name="url" class="form-control form-control-danger" value="<?php echo $row['url'];  ?>" placeholder="http://example.com">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Giờ mở cửa</label>
                                                                <select name="o_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                                    <option>--Chọn giờ của bạn--</option>
                                                                    <option value="6am">6am</option>
                                                                    <option value="7am">7am</option>
                                                                    <option value="8am">8am</option>
                                                                    <option value="9am">9am</option>
                                                                    <option value="10am">10am</option>
                                                                    <option value="11am">11am</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Giờ đóng cửa</label>
                                                                <select name="c_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                                    <option>--Chọn giờ của bạn--</option>
                                                                    <option value="3pm">3pm</option>
                                                                    <option value="4pm">4pm</option>
                                                                    <option value="5pm">5pm</option>
                                                                    <option value="6pm">6pm</option>
                                                                    <option value="7pm">7pm</option>
                                                                    <option value="8pm">8pm</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Ngày mở cửa</label>
                                                                <select name="o_days" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option>--Chọn ngày của bạn--</option>
                                                                    <option value="Mon-Tue">Thứ Hai-Thứ Ba</option>
                                                                    <option value="Mon-Wed">Thứ Hai-Thứ Tư</option>
                                                                    <option value="Mon-Thu">Thứ Hai-Thứ Năm</option>
                                                                    <option value="Mon-Fri">Thứ Hai-Thứ Sáu</option>
                                                                    <option value="Mon-Sat">Thứ Hai-Thứ Bảy</option>
                                                                    <option value="24hr-x7">24 giờ-x7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                       

                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Hình ảnh</label>
                                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Chọn khu vực</label>
                                                                <select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option>--Chọn khu vực--</option>
                                                                    <?php $ssql ="select * from res_category";
													$res=mysqli_query($db, $ssql); 
													while($rows=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$rows['c_id'].'">'.$rows['c_name'].'</option>';;
													}  
                                                 
													?>
                                                                </select>
                                                            </div>
                                                        </div>




                                                    </div>

                                                    <h3 class="box-title m-t-40">Địa chỉ nhà hàng</h3>
                                                    <hr>
                                                   

                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">

                                                                <textarea name="address" type="text" style="height:100px;" class="form-control"> <?php echo $row['address']; ?> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                                            <a href="all_restaurant.php" class="btn btn-inverse">Hủy bỏ</a>
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