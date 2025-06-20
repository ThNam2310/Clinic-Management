<?php
session_start();
include('assets/inc/config.php'); //lấy tệp cấu hình
if (isset($_POST['admin_login'])) {
    $ad_email = $_POST['ad_email'];
    $ad_pwd = sha1(md5($_POST['ad_pwd'])); //mã hóa hai lớp để tăng tính bảo mật
    $stmt = $mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? "); //câu lệnh sql để đăng nhập người dùng
    $stmt->bind_param('ss', $ad_email, $ad_pwd); //gán tham số đã lấy
    $stmt->execute(); //thực thi
    $stmt->bind_result($ad_email, $ad_pwd, $ad_id); //gán kết quả
    $rs = $stmt->fetch();
    $_SESSION['ad_id'] = $ad_id; //gán session cho mã quản trị viên
    if ($rs) { //nếu thành công
        header("location:his_admin_dashboard.php");
    } else {
        $err = "Từ chối truy cập. Vui lòng kiểm tra lại thông tin đăng nhập";
    }
}
?>
<!--Kết thúc đăng nhập-->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <title>Hệ thống quản lý bệnh viện</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="MartDevelopers" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Biểu tượng trang -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- CSS ứng dụng -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Tải JavaScript của Sweet Alert-->

    <script src="assets/js/swal.js"></script>
    <!--Hiển thị thông báo Sweet Alert-->
    <?php if (isset($success)) { ?>
        <script>
            setTimeout(function() {
                    swal("Thành công", "<?php echo $success; ?>", "success");
                },
                100);
        </script>
    <?php } ?>

    <?php if (isset($err)) { ?>
        <script>
            setTimeout(function() {
                    swal("Thất bại", "<?php echo $err; ?>", "error");
                },
                100);
        </script>
    <?php } ?>
</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="../../index.php">
                                    <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Nhập địa chỉ email và mật khẩu của bạn để truy cập vào
                                    bảng điều khiển quản trị hệ thống.</p>
                            </div>

                            <form method='post'>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Địa chỉ Email</label>
                                    <input class="form-control" name="ad_email" type="email" id="emailaddress"
                                        required="" placeholder="Nhập địa chỉ email của bạn">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu</label>
                                    <input class="form-control" name="ad_pwd" type="password" required="" id="password"
                                        placeholder="Nhập mật khẩu">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" name="admin_login" type="submit"> Đăng
                                        nhập </button>
                                </div>

                            </form>

                            <!--
                            Hiện tại sẽ tạm ẩn phần này 
                            Chức năng sẽ được triển khai trong các phiên bản sau
                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Đăng nhập bằng</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div> 
                            -->

                        </div> <!-- kết thúc phần thân card -->
                    </div>
                    <!-- kết thúc card -->

                </div> <!-- kết thúc cột -->
            </div>
            <!-- kết thúc hàng -->
        </div>
        <!-- kết thúc container -->
    </div>
    <!-- kết thúc trang -->

    <?php include("assets/inc/footer1.php"); ?>

    <!-- JS từ nhà cung cấp -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- JS của ứng dụng -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>