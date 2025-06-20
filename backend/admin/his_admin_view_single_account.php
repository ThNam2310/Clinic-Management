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

            <!-- Bắt đầu thanh điều hướng -->
            <?php include('assets/inc/nav.php');?>
            <!-- Kết thúc thanh điều hướng -->

            <!-- ========== Bắt đầu thanh bên trái ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Kết thúc thanh bên trái -->

            <!-- ============================================================== -->
            <!-- Bắt đầu nội dung trang -->
            <!-- ============================================================== -->
            <?php
                $acc_number=$_GET['acc_number'];
                $ret="SELECT  * FROM his_accounts WHERE acc_number = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$acc_number);
                $stmt->execute() ;
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Báo cáo</a></li>
                                                <li class="breadcrumb-item active">Tài khoản</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Chi tiết tài khoản: <?php echo $row->acc_number;?></h4>
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
                                                        <img src="assets/images/bank.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                                                </div>
                                            </div> <!-- kết thúc cột trái -->
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Mã số tài khoản: <?php echo $row->acc_number;?></h2>
                                                    <hr>
                                                    <h4 class="text-danger">Tên tài khoản: <?php echo $row->acc_name;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Số dư tài khoản: $ <?php echo $row->acc_amount;?> </h4>
                                                    <hr>
                                                    <h4 class="text-danger">Loại tài khoản: <?php echo $row->acc_type;?> </h4>
                                                    <hr>
                                                    <h4 class="align-centre">Mô tả tài khoản</h4>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->acc_desc;?>
                                                    </p>
                                                </div>
                                            </div> <!-- kết thúc cột phải -->
                                        </div>
                                        <!-- kết thúc dòng -->
                                    </div> <!-- kết thúc card-->
                                </div> <!-- kết thúc cột-->
                            </div>
                            <!-- kết thúc dòng -->
                            
                        </div> <!-- container -->

                    </div> <!-- nội dung -->

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

        <!-- Lớp phủ thanh bên phải -->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>
