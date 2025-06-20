<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
if (isset($_GET['delete_pay_number'])) {
    $id = $_GET['delete_pay_number'];

    $adn = "DELETE FROM his_payrolls WHERE pay_number = ?";
    $stmt = $mysqli->prepare($adn);

    if ($stmt) {
        $stmt->bind_param('s', $id);
        $exec_result = $stmt->execute();
        $stmt->close();

        if ($exec_result) {
            $success = "✅ Payroll Record Deleted";
        } else {
            $err = "❌ Execute failed: " . $stmt->error;
        }
    } else {
        $err = "❌ Prepare failed: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chính</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng lương</a></li>
                                        <li class="breadcrumb-item active">Quản lý bảng lương</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Chi tiết Nhân Viên</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status"
                                                    class="custom-select custom-select-sm">
                                                    <option value="">Hiển thị tất cả</option>
                                                    <option value="Đã xuất viện">Đã xuất viện</option>
                                                    <option value="Ngoại trú">Ngoại trú</option>
                                                    <option value="Nội trú">Nội trú</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Tìm kiếm"
                                                    class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
                                        data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Họ tên nhân viên</th>
                                                <th data-toggle="true">Mã số nhân viên</th>
                                                <th data-hide="phone">Mã bảng lương</th>
                                                <th data-hide="phone">Mức lương</th>
                                                <th data-hide="phone">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $ret = "SELECT * FROM  his_payrolls ORDER BY RAND() ";
                                            //sql code to get to ten docs  randomly
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                                // Kiểm tra xem pay_doc_number có tồn tại trong his_docs không
                                                $check = $mysqli->prepare("SELECT COUNT(*) FROM his_docs WHERE doc_number = ?");
                                                $check->bind_param("s", $row->pay_doc_number);
                                                $check->execute();
                                                $check->bind_result($count);
                                                $check->fetch();
                                                $check->close();
                                                $doc_exists = $count > 0;
                                            ?>


                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row->pay_doc_name; ?></td>
                                                <td><?php echo $row->pay_doc_number; ?></td>
                                                <td><?php echo $row->pay_number; ?></td>
                                                <td>$ <?php echo $row->pay_emp_salary; ?></td>

                                                <td>
                                                    <a href="his_admin_manage_payrolls.php?delete_pay_number=<?php echo $row->pay_number; ?>"
                                                        class="badge badge-danger"><i class="fas fa-trash"></i>
                                                        Xóa</a>
                                                    <?php if ($doc_exists): ?>
                                                    <a href="his_admin_update_single_employee_payroll.php?pay_number=<?php echo $row->pay_number; ?>"
                                                        class="badge badge-success"><i class="fas fa-edit "></i>Sửa
                                                        lương
                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <?php $cnt = $cnt + 1;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul
                                                            class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0">
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
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

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>