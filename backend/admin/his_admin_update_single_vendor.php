<!--Mã phía máy chủ để xử lý Cập nhật Thông tin Nhà Cung Cấp-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_vendor'])) {
    $v_name = $_POST['v_name'];
    $v_adr = $_POST['v_adr'];
    $v_number = $_GET['v_number'];
    $v_email = $_POST['v_email'];
    $v_phone = $_POST['v_phone'];
    $v_desc = $_POST['v_desc'];

    // câu lệnh SQL để cập nhật dữ liệu
    $query = "UPDATE  his_vendor SET v_name=?, v_adr=?,  v_email = ?, v_phone=?, v_desc=? WHERE v_number=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssss', $v_name, $v_adr,  $v_email, $v_phone, $v_desc, $v_number);
    $stmt->execute();

    // khai báo biến thông báo
    if ($stmt) {
        $success = "Cập nhật thông tin nhà cung cấp thành công";
    } else {
        $err = "Vui lòng thử lại sau";
    }
}
?>
<!--Kết thúc mã phía máy chủ-->
<!--Kết thúc xử lý đăng ký-->

<!DOCTYPE html>
<html lang="vi">

<!--Phần đầu-->
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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Trang chính</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nhà cung cấp</a></li>
                                        <li class="breadcrumb-item active">Cập nhật thông tin</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Cập nhật thông tin nhà cung cấp</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Kết thúc tiêu đề trang -->

                    <!-- Hàng biểu mẫu -->
                    <?php
                    $v_number = $_GET['v_number'];
                    $ret = "SELECT  * FROM his_vendor WHERE v_number = ?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('i', $v_number);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Điền đầy đủ thông tin</h4>
                                        <!--Biểu mẫu cập nhật nhà cung cấp-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Tên nhà cung cấp</label>
                                                    <input type="text" required="required"
                                                        value="<?php echo $row->v_name; ?>" name="v_name"
                                                        class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Số điện thoại</label>
                                                    <input required="required" type="text"
                                                        value="<?php echo $row->v_phone; ?>" name="v_phone"
                                                        class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Địa chỉ</label>
                                                    <input required="required" value="<?php echo $row->v_adr; ?>"
                                                        type="text" name="v_adr" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" value="<?php echo $row->v_email; ?>" type="email"
                                                    class="form-control" name="v_email" id="inputAddress">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Chi tiết nhà cung
                                                    cấp</label>
                                                <textarea type="text" class="form-control" name="v_desc"
                                                    id="editor"><?php echo $row->v_desc; ?></textarea>
                                            </div>

                                            <button type="submit" name="update_vendor" class="ladda-button btn btn-success"
                                                data-style="expand-right">Cập nhật nhà cung cấp</button>
                                        </form>
                                        <!--Kết thúc biểu mẫu-->
                                    </div> <!-- kết thúc card-body -->
                                </div> <!-- kết thúc card-->
                            </div> <!-- kết thúc col -->
                        </div>
                    <?php } ?>
                    <!-- kết thúc hàng -->

                </div> <!-- container -->

            </div> <!-- nội dung -->

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
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor')
    </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Khởi tạo nút tải -->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>