<?php
$aid = $_SESSION['ad_id'];
$ret = "select * from his_admin where ad_id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_object()) {
?>
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <!-- <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li> -->
        <!-- phân cấp menu -->
        <!-- <style>
                .dropdown-submenu {
                    position: relative;
                }

                .dropdown-submenu .dropdown-menu {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 100%;
                }

                .dropdown-submenu:hover .dropdown-menu {
                    display: block;
                }
            </style> -->


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <img src="assets/images/users/<?php echo $row->ad_dpic; ?>" alt="Ảnh đại diện" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php echo $row->ad_lname; ?> <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a href="his_admin_logout_partial.php" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="his_admin_dashboard.php" class="logo text-center">
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="18">
            </span>
            <span class="logo-sm">
                <img src="assets/images/logo-sm-white.png" alt="" height="24">
            </span>
        </a>
    </div>

    <!-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                Tạo mới
                <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="dropdown-menu">
                <a href="his_admin_add_employee.php" class="dropdown-item">
                    <i class="fe-users mr-1"></i>
                    <span>Nhân viên</span>
                </a> -->
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                Tạo mới
                <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="dropdown-menu">

                <!-- Menu cha "Nhân viên" -->
                <div class="dropdown-submenu">
                    <a href="his_admin_add_employee.php" class="dropdown-item">
                        <i class="fe-users mr-1"></i>
                        <span>Nhân viên</span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="nhanvien_a.php" class="dropdown-item">Nhân viên A</a>
                        <a href="nhanvien_b.php" class="dropdown-item">Nhân viên B</a>
                        <a href="nhanvien_c.php" class="dropdown-item">Nhân viên C</a>
                    </div>
                </div>


                <a href="his_admin_register_patient.php" class="dropdown-item">
                    <i class="fe-activity mr-1"></i>
                    <span>Bệnh nhân</span>
                </a>

                <a href="his_admin_add_payroll.php" class="dropdown-item">
                    <i class="fe-layers mr-1"></i>
                    <span>Bảng lương</span>
                </a>

                <a href="his_admin_add_vendor.php" class="dropdown-item">
                    <i class="fe-shopping-cart mr-1"></i>
                    <span>Nhà cung cấp</span>
                </a>

                <a href="his_admin_add_medical_record.php" class="dropdown-item">
                    <i class="fe-list mr-1"></i>
                    <span>Hồ sơ bệnh án</span>
                </a>

                <a href="his_admin_lab_report.php" class="dropdown-item">
                    <i class="fe-hard-drive mr-1"></i>
                    <span>Báo cáo xét nghiệm</span>
                </a>

                <a href="his_admin_surgery_records.php" class="dropdown-item">
                    <i class="fe-anchor mr-1"></i>
                    <span>Báo cáo phẫu thuật/phòng mổ</span>
                </a>

                <div class="dropdown-divider"></div>
            </div>
        </li>
    </ul>
</div>
<?php } ?>