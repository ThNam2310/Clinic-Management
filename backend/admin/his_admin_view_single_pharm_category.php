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
                $pharm_cat_id=$_GET['pharm_cat_id'];
                $ret="SELECT  * FROM his_pharmaceuticals_categories WHERE pharm_cat_id = ?";
                $stmt= $mysqli->prepare($ret);
                $stmt->bind_param('i',$pharm_cat_id);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dược phẩm</a></li>
                                                <li class="breadcrumb-item active">Xem danh mục dược phẩm</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"></h4>
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
                                                        <img src="assets/images/pharm.webp" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                            
                                                </div>
                                            </div> <!-- kết thúc cột -->
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Tên danh mục dược phẩm: <?php echo $row->pharm_cat_name;?></h2>
                                                    <hr>
                                                    <h6 class="text-danger">Nhà cung cấp dược phẩm: <?php echo $row->pharm_cat_vendor;?></h6>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->pharm_cat_desc;?>
                                                    </p>
                                                </div>
                                            </div> <!-- kết thúc cột -->
                                        </div>
                                        <!-- kết thúc dòng -->

                                    </div> <!-- kết thúc card -->
                                </div> <!-- kết thúc cột -->
                            </div>
                            <!-- kết thúc dòng -->
                            
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

        <!-- Lớp phủ thanh bên phải -->
        <div class="rightbar-overlay"></div>

        <!-- Tệp JavaScript của nhà cung cấp -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Tệp JavaScript của ứng dụng -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>
