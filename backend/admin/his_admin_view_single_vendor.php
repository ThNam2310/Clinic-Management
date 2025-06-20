<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="vi">
    
<?php include ('assets/inc/head.php');?>

    <body>

        <!-- Bắt đầu trang -->
        <div id="wrapper">

            <!-- Bắt đầu thanh điều hướng trên -->
            <?php include('assets/inc/nav.php');?>
            <!-- Kết thúc thanh điều hướng trên -->

            <!-- ========== Bắt đầu thanh bên trái ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Kết thúc thanh bên trái -->

            <!-- ============================================================== -->
            <!-- Bắt đầu nội dung trang -->
            <!-- ============================================================== -->
            <?php
                $v_number=$_GET['v_number'];
                $ret="SELECT  * FROM his_vendor WHERE v_number = ?";
                $stmt= $mysqli->prepare($ret);
                $stmt->bind_param('i',$v_number);
                $stmt->execute();
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
            ?>

                <div class="content-page">
                    <div class="content">

                        <!-- Bắt đầu nội dung -->
                        <div class="container-fluid">
                            
                            <!-- Bắt đầu tiêu đề trang -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Trang chính</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nhà cung cấp</a></li>
                                                <li class="breadcrumb-item active">Quản lý nhà cung cấp</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">#<?php echo $row->v_number;?></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- Kết thúc tiêu đề trang --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-5">

                                                <div class="tab-content pt-0">
                                                    <div class="tab-pane active show" id="product-1-item">
                                                        <img src="assets/images/vendor.png" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                                                </div>
                                            </div> <!-- kết thúc cột -->

                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Tên nhà cung cấp: <?php echo $row->v_name;?></h2>
                                                    <hr>
                                                    <h3 class="text-danger">Liên hệ nhà cung cấp: <?php echo $row->v_phone;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger">Email nhà cung cấp: <?php echo $row->v_email;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger">Địa chỉ nhà cung cấp: <?php echo $row->v_adr;?></h3>
                                                    <hr>
                                                    
                                                    <h2 class="align-centre">Thông tin chi tiết</h2>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->v_desc;?>
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div> <!-- kết thúc cột -->
                                        </div>
                                        <!-- kết thúc hàng -->

                                    </div> <!-- kết thúc card-->
                                </div> <!-- kết thúc cột-->
                            </div>
                            <!-- kết thúc hàng -->
                            
                        </div> <!-- kết thúc container -->

                    </div> <!-- kết thúc nội dung -->

                    <!-- Bắt đầu chân trang -->
                        <?php include('assets/inc/footer.php');?>
                    <!-- Kết thúc chân trang -->

                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- Kết thúc nội dung trang -->
            <!-- ============================================================== -->


        </div>
        <!-- KẾT THÚC wrapper -->

        <!-- Lớp phủ bên phải -->
        <div class="rightbar-overlay"></div>

        <!-- Tệp JS từ nhà cung cấp -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Tệp JS ứng dụng -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>
