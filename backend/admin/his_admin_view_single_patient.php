<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="vi">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Bắt đầu trang -->
    <div id="wrapper">

        <!-- Bắt đầu thanh điều hướng -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- Kết thúc thanh điều hướng -->

        <!-- ========== Bắt đầu thanh bên trái ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Kết thúc thanh bên trái -->

        <!-- ============================================================== -->
        <!-- Bắt đầu nội dung trang -->
        <!-- ============================================================== -->

        <!-- Lấy thông tin chi tiết của một bệnh nhân và hiển thị tại đây -->
        <?php
        $pat_number = $_GET['pat_number'];
        $pat_id = $_GET['pat_id'];
        $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $pat_id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_object()) {
            $mysqlDateTime = $row->pat_date_joined;
        ?>
            <div class="content-page">
                <div class="content">

                    <!-- Bắt đầu nội dung -->
                    <div class="container-fluid">

                        <!-- bắt đầu tiêu đề trang -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bệnh nhân</a></li>
                                            <li class="breadcrumb-item active">Xem hồ sơ bệnh nhân</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Hồ sơ của <?php echo $row->pat_fname; ?>
                                        <?php echo $row->pat_lname; ?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- kết thúc tiêu đề trang -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/patient.png"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="Ảnh đại diện bệnh nhân">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>Họ tên đầy đủ:</strong> <span
                                                class="ml-2"><?php echo $row->pat_fname; ?>
                                                <?php echo $row->pat_lname; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Điện thoại:</strong><span
                                                class="ml-2"><?php echo $row->pat_phone; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Địa chỉ:</strong> <span
                                                class="ml-2"><?php echo $row->pat_addr; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Ngày sinh:</strong> <span
                                                class="ml-2"><?php echo $row->pat_dob; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Tuổi:</strong> <span
                                                class="ml-2"><?php echo $row->pat_age; ?> tuổi</span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Bệnh lý:</strong> <span
                                                class="ml-2"><?php echo $row->pat_ailment; ?></span></p>
                                        <hr>
                                        <p class="text-muted mb-2 font-13"><strong>Ngày ghi nhận:</strong> <span
                                                class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span>
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <div class="col-lg-8 col-xl-8">
                            <div class="card-box">
                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#aboutme" data-toggle="tab" aria-expanded="false"
                                            class="nav-link active">
                                            Đơn thuốc
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            Chỉ số lâm sàng
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Xét nghiệm
                                        </a>
                                    </li>
                                </ul>

                                <!--Lịch sử bệnh án-->
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aboutme">
                                        <ul class="list-unstyled timeline-sm">
                                            <?php
                                            $pres_pat_number = $_GET['pat_number'];
                                            $ret = "SELECT  * FROM his_prescriptions WHERE pres_pat_number ='$pres_pat_number'";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while ($row = $res->fetch_object()) {
                                                $mysqlDateTime = $row->pres_date;

                                            ?>
                                                <li class="timeline-sm-item">
                                                    <span
                                                        class="timeline-sm-date"><?php echo date("Y-m-d", strtotime($mysqlDateTime)); ?></span>
                                                    <h5 class="mt-0 mb-1"><?php echo $row->pres_pat_ailment; ?></h5>
                                                    <p class="text-muted mt-2">
                                                        <?php echo $row->pres_ins; ?>
                                                    </p>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <!-- dấu hiệu sinh tồn -->
                                    <div class="tab-pane show " id="timeline">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
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
                                                $vit_pat_number = $_GET['pat_number'];
                                                $ret = "SELECT  * FROM his_vitals WHERE vit_pat_number ='$vit_pat_number'";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute();
                                                $res = $stmt->get_result();
                                                while ($row = $res->fetch_object()) {
                                                    $mysqlDateTime = $row->vit_daterec;
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row->vit_bodytemp; ?>°C</td>
                                                            <td><?php echo $row->vit_heartpulse; ?> BPM</td>
                                                            <td><?php echo $row->vit_resprate; ?> bpm</td>
                                                            <td><?php echo $row->vit_bloodpress; ?> mmHg</td>
                                                            <td><?php echo date("Y-m-d", strtotime($mysqlDateTime)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- hồ sơ xét nghiệm -->
                                    <div class="tab-pane" id="settings">
                                        <ul class="list-unstyled timeline-sm">
                                            <?php
                                            $lab_pat_number = $_GET['pat_number'];
                                            $ret = "SELECT  * FROM his_laboratory WHERE lab_pat_number  = '$lab_pat_number'";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while ($row = $res->fetch_object()) {
                                                $mysqlDateTime = $row->lab_date_rec;

                                            ?>
                                                <li class="timeline-sm-item">
                                                    <span
                                                        class="timeline-sm-date"><?php echo date("Y-m-d", strtotime($mysqlDateTime)); ?></span>
                                                    <h3 class="mt-0 mb-1"><?php echo $row->lab_pat_ailment; ?></h3>
                                                    <hr>
                                                    <h5>Xét nghiệm lâm sàng</h5>
                                                    <p class="text-muted mt-2">
                                                        <?php echo $row->lab_pat_tests; ?>
                                                    </p>
                                                    <hr>
                                                    <h5>Kết quả xét nghiệm</h5>
                                                    <p class="text-muted mt-2">
                                                        <?php echo $row->lab_pat_results; ?>
                                                    </p>
                                                    <hr>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div> <!-- kết thúc tab-content -->
                            </div> <!-- kết thúc card-box -->
                        </div> <!-- kết thúc cột -->
                        </div>
                        <!-- kết thúc hàng -->

                    </div> <!-- kết thúc container -->

                </div> <!-- kết thúc content -->

                <!-- Bắt đầu chân trang -->
                <?php include('assets/inc/footer.php'); ?>
                <!-- Kết thúc chân trang -->

            </div>

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