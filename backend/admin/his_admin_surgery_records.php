<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  /*Lets commet this code
  if(isset($_GET['delete_s_number']))
  {
        $id=intval($_GET['delete_s_number']);
        $adn="delete from his_surgery where s_number=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Surgery Patient's  Records Deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Phẫu thuật | Phòng mổ</a></li>
                                            <li class="breadcrumb-item active">Hồ sơ phẫu thuật bệnh nhân</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Hồ sơ bệnh nhân phẫu thuật</h4>
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
                                            <div class="col-12 text-sm-center form-inline" >
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
                                                <th data-toggle="true">Họ và Tên Bệnh Nhân</th>
                                                <th data-hide="phone">Mã Số Bệnh Nhân</th>
                                                <th data-hide="phone">Chẩn Đoán</th>
                                                <th data-hide="phone">Bác Sĩ Phẫu Thuật </th>
                                                <th data-hide="phone">Ngày Phẫu Thuật</th>
                                                <th data-hide="phone">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_surgery ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                                    $mysqlDateTime = $row->s_pat_date;
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->s_pat_name;?></td>
                                                    <td><?php echo $row->s_pat_number;?></td>
                                                    <td><?php echo $row->s_pat_ailment;?></td>
                                                    <td><?php echo $row->s_doc;?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($mysqlDateTime));?></td>

                                                    
                                                    <td>
                                                        <a href="his_admin_view_single_patient_surgery.php?s_number=<?php echo $row->s_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> Xem</a>
                                                        <!--<a href="his_admin_manage_theatre_patient.php?delete_s_number=<?php echo $row->s_number?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete Record</a>-->
                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
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
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                 <?php include('assets/inc/footer.php');?>
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