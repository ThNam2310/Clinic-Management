<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>

<!DOCTYPE html>
<html lang="vi">

<?php include('assets/inc/head.php');?>

<body>

    <!-- Bắt đầu trang -->
    <div id="wrapper">

        <!-- Bắt đầu thanh điều hướng -->
        <?php include("assets/inc/nav.php");?>
        <!-- Kết thúc thanh điều hướng -->

        <!-- ========== Bắt đầu thanh bên trái ========== -->
        <?php include("assets/inc/sidebar.php");?>
        <!-- Kết thúc thanh bên trái -->

        <!-- ============================================================== -->
        <!-- Bắt đầu nội dung trang -->
        <!-- ============================================================== -->

        <!-- Lấy thông tin của một bác sĩ và hiển thị tại đây -->
        <?php
            $doc_id=$_GET['doc_id'];
            $ret="SELECT  * FROM his_docs WHERE doc_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$doc_id);
            $stmt->execute() ;
            $res=$stmt->get_result();
            $doc_number=$_GET['doc_number'];
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chính</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nhân sự</a></li>
                                        <li class="breadcrumb-item active">Xem nhân sự</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Hồ sơ của Bác sĩ <?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Kết thúc tiêu đề trang -->

                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="card-box text-center">
                                <img src="../doc/assets/images/users/<?php echo $row->doc_dpic;?>" class="rounded-circle avatar-lg img-thumbnail" alt="ảnh hồ sơ">

                                <div class="text-centre mt-3">

                                    <p class="text-muted mb-2 font-13"><strong>Họ và tên :</strong> <span class="ml-2"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></span></p>
                                    <p class="text-muted mb-2 font-13"><strong>Khoa :</strong> <span class="ml-2"><?php echo $row->doc_dept;?></span></p>
                                    <p class="text-muted mb-2 font-13"><strong>Mã nhân viên :</strong> <span class="ml-2"><?php echo $row->doc_number;?></span></p>
                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2"><?php echo $row->doc_email;?></span></p>

                                </div>

                            </div> <!-- kết thúc thẻ hồ sơ -->

                        </div> <!-- kết thúc cột trái -->

                        <!-- Sinh hiệu -->
                        <div class="col-lg-6 col-xl-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nhiệt độ cơ thể</th>
                                            <th>Nhịp tim/Mạch</th>
                                            <th>Nhịp thở</th>
                                            <th>Huyết áp</th>
                                            <th>Ngày ghi nhận</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $vit_pat_number =$_GET['doc_number'];
                                        $ret="SELECT * FROM his_vitals WHERE vit_pat_number = '$vit_pat_number'";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute() ;
                                        $res=$stmt->get_result();
                                        
                                        while($row=$res->fetch_object())
                                            {
                                        $mysqlDateTime = $row->vit_daterec;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row->vit_bodytemp;?>°C</td>
                                            <td><?php echo $row->vit_heartpulse;?> nhịp/phút</td>
                                            <td><?php echo $row->vit_resprate;?> nhịp/phút</td>
                                            <td><?php echo $row->vit_bloodpress;?> mmHg</td>
                                            <td><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></td>
                                        </tr>
                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </div> <!-- kết thúc cột phải -->
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
