<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>

<!DOCTYPE html>
<html lang="vi">
    
<?php include('assets/inc/head.php');?>

<body>

    <!-- Bắt đầu trang -->
    <div id="wrapper">

        <!-- Bắt đầu thanh điều hướng -->
            <?php include('assets/inc/nav.php');?>
        <!-- Kết thúc thanh điều hướng -->

        <!-- ========== Bắt đầu thanh bên trái ========== -->
            <?php include("assets/inc/sidebar.php");?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chính</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nhà thuốc</a></li>
                                        <li class="breadcrumb-item active">Xem Đơn thuốc</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Xem Đơn thuốc</h4>
                            </div>
                        </div>
                    </div>     
                    <!-- Kết thúc tiêu đề trang --> 

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Hiển thị tất cả</option>
                                                    <option value="Đã xuất viện">Đã xuất viện</option>
                                                    <option value="Ngoại trú">Ngoại trú</option>
                                                    <option value="Nội trú">Nội trú</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Tìm kiếm" class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th data-toggle="true">Họ tên bệnh nhân</th>
                                            <th data-hide="phone">Mã số bệnh nhân</th>
                                            <th data-hide="phone">Địa chỉ bệnh nhân</th>
                                            <th data-hide="phone">Chẩn đoán</th>
                                            <th data-hide="phone">Tuổi</th>
                                            <th data-hide="phone">Phân loại bệnh nhân</th>
                                            <th data-hide="phone">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            /*
                                                *Lấy thông tin tất cả bệnh nhân có đơn thuốc
                                                *
                                            */
                                            $ret="SELECT * FROM  his_prescriptions ORDER BY RAND() "; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                            {
                                        ?>

                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row->pres_pat_name;?></td>
                                                <td><?php echo $row->pres_pat_number;?></td>
                                                <td><?php echo $row->pres_pat_addr;?></td>
                                                <td><?php echo $row->pres_pat_ailment;?></td>
                                                <td><?php echo $row->pres_pat_age;?> Tuổi</td>
                                                <td><?php echo $row->pres_pat_type;?></td>
                                                <td>
                                                    <a href="his_admin_view_single_pres.php?pres_number=<?php echo $row->pres_number;?>&&pres_id=<?php echo $row->pres_id;?>" class="badge badge-success">
                                                        <i class="fas fa-eye"></i> Xem đơn thuốc
                                                    </a>
                                                </td>
                                            </tr>
                                           
                                        <?php  $cnt = $cnt +1 ; } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="active">
                                            <td colspan="8">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- kết thúc .table-responsive-->
                            </div> <!-- kết thúc card-box -->
                        </div> <!-- kết thúc col -->
                    </div>
                    <!-- kết thúc row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Bắt đầu chân trang -->
             <?php include('assets/inc/footer.php');?>
            <!-- Kết thúc chân trang -->

        </div>

        <!-- ============================================================== -->
        <!-- Kết thúc nội dung trang -->
        <!-- ============================================================== -->

    </div>
    <!-- KẾT THÚC wrapper -->

    <!-- Lớp phủ thanh bên phải -->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Khởi tạo bảng js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    
</body>

</html>
