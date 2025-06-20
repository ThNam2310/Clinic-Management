<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_doc'])) {
    $doc_number = $_GET['doc_number'];

    // Lấy dữ liệu cũ
    $query = "SELECT * FROM his_docs WHERE doc_number = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $doc_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $existing = $result->fetch_assoc();

    // Lấy dữ liệu mới hoặc dùng lại dữ liệu cũ
    $doc_fname = !empty($_POST['doc_fname']) ? $_POST['doc_fname'] : $existing['doc_fname'];
    $doc_lname = !empty($_POST['doc_lname']) ? $_POST['doc_lname'] : $existing['doc_lname'];
    $doc_email = !empty($_POST['doc_email']) ? $_POST['doc_email'] : $existing['doc_email'];
    $doc_pwd = !empty($_POST['doc_pwd']) ? sha1(md5($_POST['doc_pwd'])) : $existing['doc_pwd'];

    // Ảnh đại diện
    if (!empty($_FILES["doc_dpic"]["name"])) {
        $doc_dpic = $_FILES["doc_dpic"]["name"];
        move_uploaded_file($_FILES["doc_dpic"]["tmp_name"], "../doc/assets/images/users/" . $doc_dpic);
    } else {
        $doc_dpic = $existing['doc_dpic'];
    }

    // Update dữ liệu
    $query = "UPDATE his_docs SET doc_fname=?, doc_lname=?, doc_email=?, doc_pwd=?, doc_dpic=? WHERE doc_number = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssss', $doc_fname, $doc_lname, $doc_email, $doc_pwd, $doc_dpic, $doc_number);
    $stmt->execute();

    if ($stmt) {
        $success = "Employee Details Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>
<!--End Server Side-->
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
                                        <li class="breadcrumb-item active">Quản lý nhân viên</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Cập nhật thông tin nhân viên</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $doc_number = $_GET['doc_number'];
                    $ret = "SELECT  * FROM his_docs WHERE doc_number=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $doc_number);
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
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Họ</label>
                                                    <input type="text" value="<?php echo $row->doc_fname; ?>"
                                                        name="doc_fname" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Tên</label>
                                                    <input type="text" value="<?php echo $row->doc_lname; ?>"
                                                        name="doc_lname" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input type="email" value="<?php echo $row->doc_email; ?>"
                                                    class="form-control" name="doc_email" id="inputAddress">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Mật khẩu</label>
                                                    <input type="password" name="doc_pwd" class="form-control"
                                                        id="inputCity">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Ảnh đại diện</label>
                                                    <input type="file" name="doc_dpic" class="btn btn-success form-control"
                                                        id="inputCity">
                                                </div>
                                            </div>

                                            <button type="submit" name="update_doc" class="ladda-button btn btn-success"
                                                data-style="expand-right">Cập nhật nhân viên</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    <?php } ?>

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