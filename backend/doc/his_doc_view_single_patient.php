<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();

  $doc_id=$_SESSION['doc_id'];
  //$doc_number = $_SERVER['doc_number'];
?>

<!DOCTYPE html>
    <html lang="en">

    <?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
             <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <!--Get Details Of A Single User And Display Them Here-->
            <?php
                $pat_number=$_GET['pat_number'];
                $pat_id=$_GET['pat_id'];
                $ret="SELECT  * FROM his_patients WHERE pat_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$pat_id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
            {
                $mysqlDateTime = $row->pat_date_joined;
            ?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Trang Chủ</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bệnh Nhân</a></li>
                                            <li class="breadcrumb-item active">Thông tin bệnh nhân</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Hồ sơ của <?php echo $row->pat_fname;?> <?php echo $row->pat_lname;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    
                                    <div class="text-left mt-3">
                                        
                                        <p class="text-muted mb-2 font-13"><strong>Họ và Tên :</strong> <span class="ml-2"><?php echo $row->pat_fname;?> <?php echo $row->pat_lname;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Điện Thoại :</strong><span class="ml-2"><?php echo $row->pat_phone;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Địa Chỉ :</strong> <span class="ml-2"><?php echo $row->pat_addr;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Ngày Sinh :</strong> <span class="ml-2"><?php echo $row->pat_dob;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Tuổi :</strong> <span class="ml-2"><?php echo $row->pat_age;?> Years</span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Bệnh :</strong> <span class="ml-2"><?php echo $row->pat_ailment;?></span></p>
                                        <hr>
                                        <p class="text-muted mb-2 font-13"><strong>Ngày ghi :</strong> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime));?></span></p>
                                        <hr>




                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            
                            <?php }?>
                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Đơn thuốc
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                 Tình trạng cơ thể
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Hồ sơ xét nghiệm
                                            </a>
                                        </li>
                                    </ul>
                                    <!--Medical History-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="aboutme">
                                             <ul class="list-unstyled timeline-sm">
                                                <?php
                                                    $pres_pat_number =$_GET['pat_number'];
                                                    $ret="SELECT  * FROM his_prescriptions WHERE pres_pat_number = '$pres_pat_number'";
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    // $stmt->bind_param('i',$pres_pat_number );
                                                    $stmt->execute() ;//ok
                                                    $res=$stmt->get_result();
                                                    //$cnt=1;
                                                    
                                                    while($row=$res->fetch_object())
                                                        {
                                                    $mysqlDateTime = $row->pres_date; //trim timestamp to date

                                                ?>
                                                    <li class="timeline-sm-item">
                                                        <span class="timeline-sm-date"><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></span>
                                                        <h5 class="mt-0 mb-1"><?php echo $row->pres_pat_ailment;?></h5>
                                                        <p class="text-muted mt-2">
                                                            <?php echo $row->pres_ins;?>
                                                        </p>

                                                    </li>
                                                <?php }?>
                                            </ul>
                                           
                                        </div> <!-- end tab-pane -->
                                        <!-- end Prescription section content -->

                                        <div class="tab-pane show " id="timeline">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Nhiệt độ cơ thể</th>
                                                            <th>Nhịp tim</th>
                                                            <th>Nhịp hô hấp</th>
                                                            <th>Huyết áp</th>
                                                            <th>Ngày ghi</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $vit_pat_number =$_GET['pat_number'];
                                                        $ret="SELECT  * FROM his_vitals WHERE vit_pat_number = '$vit_pat_number'";
                                                        $stmt= $mysqli->prepare($ret) ;
                                                        // $stmt->bind_param('i',$vit_pat_number );
                                                        $stmt->execute() ;//ok
                                                        $res=$stmt->get_result();
                                                        //$cnt=1;
                                                        
                                                        while($row=$res->fetch_object())
                                                            {
                                                        $mysqlDateTime = $row->vit_daterec; //trim timestamp to date

                                                    ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $row->vit_bodytemp;?>°C</td>
                                                                <td><?php echo $row->vit_heartpulse;?>BPM</td>
                                                                <td><?php echo $row->vit_resprate;?>bpm</td>
                                                                <td><?php echo $row->vit_bloodpress;?>mmHg</td>
                                                                <td><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></td>
                                                            </tr>
                                                        </tbody>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end vitals content-->

                                        <div class="tab-pane" id="settings">
                                            <ul class="list-unstyled timeline-sm">
                                                <?php
                                                    $lab_pat_number =$_GET['pat_number'];
                                                    $ret="SELECT  * FROM his_laboratory WHERE  	lab_pat_number  ='$lab_pat_number'";
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    // $stmt->bind_param('i',$lab_pat_number);
                                                    $stmt->execute() ;//ok
                                                    $res=$stmt->get_result();
                                                    //$cnt=1;
                                                    
                                                    while($row=$res->fetch_object())
                                                        {
                                                    $mysqlDateTime = $row->lab_date_rec; //trim timestamp to date

                                                ?>
                                                    <li class="timeline-sm-item">
                                                        <span class="timeline-sm-date"><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></span>
                                                        <h3 class="mt-0 mb-1"><?php echo $row->lab_pat_ailment;?></h3>
                                                        <hr>
                                                        <h5>
                                                           Kiểm tra xét nghiệm
                                                        </h5>
                                                        
                                                        <p class="text-muted mt-2">
                                                            <?php echo $row->lab_pat_tests;?>
                                                        </p>
                                                        <hr>
                                                        <h5>
                                                           Kết quả xét nghiệm
                                                        </h5>
                                                        
                                                        <p class="text-muted mt-2">
                                                            <?php echo $row->lab_pat_results;?>
                                                        </p>
                                                        <hr>

                                                    </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                        </div>
                                        <!-- end lab records content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

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

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>