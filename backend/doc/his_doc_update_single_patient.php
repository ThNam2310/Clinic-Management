<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_patient'])) {
    //$pat_i = $_GET['pat_id'];
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_GET['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    $pat_ailment = $_POST['pat_ailment'];
    //sql to insert captured values
    $query = "UPDATE  his_patients  SET pat_fname=?, pat_lname=?, pat_age=?, pat_dob=?,  pat_phone=?, pat_type=?, pat_addr=?, pat_ailment=? WHERE pat_number=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssss', $pat_fname, $pat_lname, $pat_age, $pat_dob,  $pat_phone, $pat_type, $pat_addr, $pat_ailment, $pat_number);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Patient Details Updated";
    } else {
        $err = "Please Try Again Or Try Later";
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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Trang chủ</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bệnh nhân</a></li>
                                        <li class="breadcrumb-item active">Quản lí bệnh nhân</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Cập nhật thông tin bệnh nhân</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                    $pat_number = $_GET['pat_number'];
                    $ret = "SELECT  * FROM his_patients WHERE pat_number=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $pat_number);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Điền vào tất cả các ô trống</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Họ</label>
                                                    <input type="text" required="required"
                                                        value="<?php echo $row->pat_fname; ?>" name="pat_fname"
                                                        class="form-control" id="inputEmail4"
                                                        placeholder="Họ của bệnh nhân">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Tên</label>
                                                    <input required="required" type="text"
                                                        value="<?php echo $row->pat_lname; ?>" name="pat_lname"
                                                        class="form-control" id="inputPassword4"
                                                        placeholder="Tên của bệnh nhân">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Ngày sinh</label>
                                                    <input type="text" required="required"
                                                        value="<?php echo $row->pat_dob; ?>" name="pat_dob"
                                                        class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Tuổi</label>
                                                    <input required="required" type="text"
                                                        value="<?php echo $row->pat_age; ?>" name="pat_age"
                                                        class="form-control" id="inputPassword4"
                                                        placeholder="Tuổi của bệnh nhân">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Địa chỉ</label>
                                                <input required="required" type="text" value="<?php echo $row->pat_addr; ?>"
                                                    class="form-control" name="pat_addr" id="inputAddress"
                                                    placeholder="Địa chỉ của bệnh nhân">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Điện thoại</label>
                                                    <input required="required" type="text"
                                                        value="<?php echo $row->pat_phone; ?>" name="pat_phone"
                                                        class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Bệnh</label>
                                                    <input required="required" type="text"
                                                        value="<?php echo $row->pat_ailment; ?>" name="pat_ailment"
                                                        class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Tình trạng bệnh
                                                        nhân</label>
                                                    <select id="inputState" required="required" name="pat_type"
                                                        class="form-control">
                                                        <option value="Nội Trú"
                                                            <?php if ($row->pat_type == 'Nội Trú') echo 'selected'; ?>>Nội
                                                            Trú</option>
                                                        <option value="Ngoại Trú"
                                                            <?php if ($row->pat_type == 'Ngoại Trú') echo 'selected'; ?>>
                                                            Ngoại Trú</option>
                                                        <option value="Xuất viện"
                                                            <?php if ($row->pat_type == 'Xuất viện') echo 'selected'; ?>>
                                                            Xuất
                                                            viện</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <?php if ($row->pat_type == 'Nội Trú') { ?>
                                                <button type="submit" name="update_patient" class="ladda-button btn btn-success"
                                                    data-style="expand-right">Sửa bệnh nhân</button>
                                            <?php } ?>
                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    <?php  } ?>
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