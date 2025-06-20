<?php
session_start();
include('assets/inc/config.php');

if (isset($_POST['reset_pwd'])) {

    $email = $_POST['email'];
    $new_pwd = $_POST['pwd']; // mật khẩu mới từ form
    $hashed_pwd = sha1(md5($new_pwd)); // mã hóa

    // Cập nhật mật khẩu theo email
    $query = "UPDATE his_docs SET doc_pwd = ? WHERE doc_email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $hashed_pwd, $email);

    if ($stmt->execute()) {
        $success = "Mật khẩu đã được cập nhật. Hãy kiểm tra email để đăng nhập.";
    } else {
        $err = "Cập nhật mật khẩu thất bại. Vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hệ thống quản lý phòng khám</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Load Sweet Alert Javascript-->
    <script src="assets/js/swal.js"></script>
    <!--Inject SWAL-->
    <?php if (isset($success)) { ?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>

    <?php if (isset($err)) { ?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "Failed");
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
                                <a href="his_doc_reset_pwd.php">
                                    <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Nhập địa chỉ email của bạn, chúng tôi sẽ gửi hướng dẫn
                                    đặt lại mật khẩu đến email đó.</p>
                            </div>

                            <form method="post">

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Địa chỉ Email </label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required=""
                                        placeholder="Nhập email của bạn">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Mật khẩu mới</label>
                                    <input class="form-control" name="pwd" type="password" id="emailaddress" required=""
                                        placeholder="Nhập mật khẩu mới">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button name="reset_pwd" class="btn btn-primary btn-block" type="submit"> Đặt lại
                                        mật khẩu </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Quay lại Trang <a href="index.php" class="text-white ml-1"><b>Đăng
                                        Nhập</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <?php include("assets/inc/footer1.php"); ?>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>