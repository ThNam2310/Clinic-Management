<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['add_doc'])) {
    $doc_fname = $_POST['doc_fname'];
    $doc_lname = $_POST['doc_lname'];
    $doc_number = $_POST['doc_number'];
    $doc_email = $_POST['doc_email'];
    $doc_pwd = sha1(md5($_POST['doc_pwd']));

    $check_query = "SELECT doc_email FROM his_docs WHERE doc_email = ?";
    $check_stmt = $mysqli->prepare($check_query);
    $check_stmt->bind_param("s", $doc_email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Email đã tồn tại
        $err = "email đã tồn tại";
    } else {
        //sql to insert captured values
        $query = "INSERT INTO his_docs (doc_fname, doc_lname, doc_number, doc_email, doc_pwd) values(?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sssss', $doc_fname, $doc_lname, $doc_number, $doc_email, $doc_pwd);
        $stmt->execute();
        //declare a varible which will be passed to alert function
        if ($stmt) {
            $success = "Employee Details Added";
        } else {
            $err = "Please Try Again Or Try Later";
        }
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nhân viên</a></li>
                                        <li class="breadcrumb-item active">Thêm nhân viên</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Thêm chi tiết nhân viên</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Điền vào tất cả các trường</h4>
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Tên</label>
                                                <input type="text" required="required" name="doc_fname"
                                                    class="form-control" id="inputEmail4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Họ</label>
                                                <input required="required" type="text" name="doc_lname"
                                                    class="form-control" id="inputPassword4">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2" style="display:none">
                                            <?php
                                            $length = 5;
                                            $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                            ?>
                                            <label for="inputZip" class="col-form-label">Mã số của bác sĩ</label>
                                            <input type="text" name="doc_number" value="<?php echo $patient_number; ?>"
                                                class="form-control" id="inputZip">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Email</label>
                                            <input required="required" type="email" class="form-control"
                                                name="doc_email" id="inputAddress">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Mật khẩU</label>
                                                <input required="required" type="password" name="doc_pwd"
                                                    class="form-control" id="inputCity">
                                            </div>

                                        </div>

                                        <button type="submit" name="add_doc" class="ladda-button btn btn-success"
                                            data-style="expand-right">Thêm nhân viên</button>

                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
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