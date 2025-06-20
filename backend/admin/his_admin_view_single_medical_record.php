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
            $mdr_number=$_GET['mdr_number'];
            $mdr_id=$_GET['mdr_id'];
            $ret="SELECT  * FROM his_medical_records WHERE mdr_id = ?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$mdr_id);
            $stmt->execute() ;
            $res=$stmt->get_result();
            while($row=$res->fetch_object())
            {
                $mysqlDateTime = $row->mdr_date_rec;
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hồ sơ bệnh án</a></li>
                                        <li class="breadcrumb-item active">Xem hồ sơ bệnh án</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">#<?php echo $row->mdr_number;?></h4>
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
                                                <img src="assets/images/medical_record.png" alt="" class="img-fluid mx-auto d-block rounded">
                                            </div>
                                        </div>
                                    </div> <!-- kết thúc cột trái -->

                                    <div class="col-xl-7">
                                        <div class="pl-xl-3 mt-3 mt-xl-0">
                                            <h2 class="mb-3">Tên bệnh nhân: <?php echo $row->mdr_pat_name;?></h2>
                                            <hr>
                                            <h3 class="text-danger">Tuổi: <?php echo $row->mdr_pat_age;?> tuổi</h3>
                                            <hr>
                                            <h3 class="text-danger">Mã bệnh nhân: <?php echo $row->mdr_pat_number;?></h3>
                                            <hr>
                                            <h3 class="text-danger">Chẩn đoán bệnh: <?php echo $row->mdr_pat_ailment;?></h3>
                                            <hr>
                                            <h3 class="text-danger">Ngày ghi nhận: <?php echo date("d/m/Y - h:m:s", strtotime($mysqlDateTime));?></h3>
                                            <hr>
                                            <h2 class="align-centre">Toa thuốc</h2>
                                            <hr>
                                            <p class="text-muted mb-4">
                                                <?php echo $row->mdr_pat_prescr;?>
                                            </p>
                                            <hr>
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
