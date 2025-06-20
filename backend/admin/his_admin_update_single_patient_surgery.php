<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_patient'])) {
    $s_pat_number = $_POST['s_pat_number'];
    $s_number = $_GET['s_number'];
    $s_pat_name = $_POST['s_pat_name'];
    $s_pat_status = $_POST['s_pat_status'];
    $s_pat_ailment = $_POST['s_pat_ailment'];
    $s_doc = $_POST['s_doc'];
    //sql to insert captured values
    $query = "UPDATE  his_surgery SET  s_pat_number=?,  s_pat_name=?, s_pat_status=?, s_pat_ailment=?, s_doc=?   WHERE  s_number=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssss', $s_pat_number, $s_pat_name, $s_pat_status, $s_pat_ailment, $s_doc, $s_number);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Đã cập nhật thông tin bệnh nhân phẫu thuật";
    } else {
        $err = "Vui lòng thử lại sau";
    }
}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Trang chính</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Phẫu thuật | Phòng
                                                mổ</a></li>
                                        <li class="breadcrumb-item active">Quản lý bệnh nhân</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Quản lý thông tin bệnh nhân phẫu thuật</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                    $s_number = $_GET['s_number'];
                    $ret = "SELECT  * FROM his_surgery WHERE s_number=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $s_number);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Điền đầy đủ thông tin</h4>
                                        <!--Biểu mẫu thêm bệnh nhân-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Tên bệnh nhân</label>
                                                    <input type="text" readonly required="required"
                                                        value="<?php echo $row->s_pat_name; ?>" name="s_pat_name"
                                                        class="form-control" id="inputEmail4"
                                                        placeholder="Họ tên bệnh nhân">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Chẩn đoán
                                                        bệnh</label>
                                                    <input readonly required="required" type="text"
                                                        value="<?php echo $row->s_pat_ailment; ?>" name="s_pat_ailment"
                                                        class="form-control" id="inputPassword4"
                                                        placeholder="Chẩn đoán bệnh">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Mã bệnh nhân</label>
                                                    <input readonly type="text" required="required"
                                                        value="<?php echo $row->s_pat_number; ?>" name="s_pat_number"
                                                        class="form-control" id="inputEmail4" placeholder="Mã bệnh nhân">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Bác sĩ phẫu thuật</label>
                                                    <select id="inputState" required="required" name="s_doc"
                                                        class="form-control">
                                                        <?php
                                                        $ret = "SELECT * FROM  his_docs WHERE doc_dept = 'Phẫu thuật | Phòng mổ' ORDER BY RAND() ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                        ?>
                                                            <option><?php echo $row->doc_fname; ?>
                                                                <?php echo $row->doc_lname; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Tình trạng ca mổ</label>
                                                    <select id="inputState" required="required" name="s_pat_status"
                                                        class="form-control">
                                                        <option>Đang tiến hành</option>
                                                        <option>Thành công</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" name="update_patient" class="ladda-button btn btn-warning"
                                                data-style="expand-right">Cập nhật bệnh nhân</button>

                                        </form>
                                        <!--Kết thúc biểu mẫu bệnh nhân-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    <?php } ?>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php'); ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>