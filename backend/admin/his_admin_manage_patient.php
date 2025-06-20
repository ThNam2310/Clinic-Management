<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "delete from his_patients where pat_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Hồ sơ bệnh nhân đã được xóa";
    } else {
        $err = "Vui lòng thử lại sau";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bệnh nhân</a></li>
                                        <li class="breadcrumb-item active">Quản lý Bệnh nhân</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Quản lý Thông Tin Bệnh Nhân</h4>
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
                                            <div class="form-group mr-2">
                                                <select id="demo-foo-filter-status"
                                                    class="custom-select custom-select-sm">
                                                    <option value="">Hiển thị tất cả</option>
                                                    <option value="Nội Trú">Nội Trú</option>
                                                    <option value="Ngoại Trú">Ngoại Trú</option>
                                                    <option value="Xuất viện">Xuất viện</option>
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
                                                <th data-toggle="true">Bệnh Nhân</th>
                                                <th data-hide="phone">Mã Số</th>
                                                <th data-hide="phone">Địa Chỉ</th>
                                                <th data-hide="phone">Phân Loại</th>
                                                <th data-hide="phone">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                            $ret = "SELECT * FROM  his_patients ORDER BY RAND() ";
                                            //sql code to get to ten docs  randomly
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>


                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                    <td><?php echo $row->pat_number; ?></td>
                                                    <td><?php echo $row->pat_addr; ?></td>
                                                    <td><?php echo $row->pat_type; ?></td>

                                                    <td>
                                                        <a href="his_admin_manage_patient.php?delete=<?php echo $row->pat_id; ?>"
                                                            class="badge badge-danger"><i
                                                                class=" mdi mdi-trash-can-outline "></i> Xoá</a>
                                                        <a href="his_admin_view_single_patient.php?pat_id=<?php echo $row->pat_id; ?>&&pat_number=<?php echo $row->pat_number; ?>"
                                                            class="badge badge-success"><i class="mdi mdi-eye"></i> Xem</a>
                                                        <a href="his_admin_update_single_patient.php?pat_id=<?php echo $row->pat_id; ?>"
                                                            class="badge badge-primary"><i
                                                                class="mdi mdi-check-box-outline "></i> Cập nhật</a>
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