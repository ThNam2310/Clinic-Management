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
            $eqp_code=$_GET['eqp_code'];
            $ret="SELECT  * FROM his_equipments WHERE eqp_code = ?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$eqp_code);
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kho vật tư</a></li>
                                            <li class="breadcrumb-item active">Thiết bị | Tài sản</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Chi tiết thiết bị mã số #<?php echo $row->eqp_code;?></h4>
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
                                                    <img src="assets/images/hosp_asset.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>
                                            </div>
                                        </div> <!-- kết thúc cột trái -->

                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <h2 class="mb-3">Tên thiết bị: <?php echo $row->eqp_name;?></h2>
                                                <hr>
                                                <h4 class="text-danger">Nhà cung cấp thiết bị: <?php echo $row->eqp_vendor;?></h4>
                                                <hr>
                                                <h4 class="text-danger">Mã vạch thiết bị: <?php echo $row->eqp_code;?></h4>
                                                <hr>
                                                <h4 class="text-danger">Số lượng thiết bị hiện có: <?php echo $row->eqp_qty;?></h4>
                                                <hr>
                                                <h4 class="text-danger">Tình trạng thiết bị: <?php echo $row->eqp_status;?></h4>
                                                <hr>
                                                <h4 class="text-danger">Mô tả thiết bị</h4>
                                                <p class="text-muted mb-4">
                                                    <?php echo $row->eqp_desc;?>
                                                </p>
                                            </div>
                                        </div> <!-- kết thúc cột phải -->
                                    </div>
                                    <!-- kết thúc hàng -->

                                </div> <!-- kết thúc thẻ -->
                            </div> <!-- kết thúc cột -->
                        </div>
                        <!-- kết thúc hàng -->
                        
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
