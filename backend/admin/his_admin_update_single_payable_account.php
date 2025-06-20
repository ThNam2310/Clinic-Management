<!-- Mã phía máy chủ để xử lý cập nhật Tài khoản phải trả -->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_acc']))
		{
			$acc_name=$_POST['acc_name'];
			$acc_desc=$_POST['acc_desc'];
			$acc_type=$_POST['acc_type'];
            $acc_number=$_GET['acc_number'];
            $acc_amount=$_POST['acc_amount'];

            // Câu lệnh SQL để cập nhật thông tin tài khoản
			$query="UPDATE  his_accounts SET acc_name=?, acc_desc=?, acc_type=?, acc_amount=? WHERE acc_number = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssss', $acc_name, $acc_desc, $acc_type, $acc_amount, $acc_number);
			$stmt->execute();

			// Khai báo biến để hiển thị thông báo
			if($stmt)
			{
				$success = "Đã cập nhật thông tin tài khoản phải trả";
			}
			else {
				$err = "Vui lòng thử lại sau";
			}
		}
?>
<!-- Kết thúc phía máy chủ -->
<!-- Kết thúc xử lý đăng ký bệnh nhân -->
<!DOCTYPE html>
<html lang="vi">
    
    <!--Phần đầu-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Bắt đầu trang -->
        <div id="wrapper">

            <!-- Thanh điều hướng trên cùng -->
            <?php include("assets/inc/nav.php");?>
            <!-- Kết thúc thanh điều hướng -->

            <!-- ========== Bắt đầu thanh bên trái ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Kết thúc thanh bên trái -->

            <!-- ============================================================== -->
            <!-- Bắt đầu nội dung trang -->
            <!-- ============================================================== -->
            <?php
                $acc_number=$_GET['acc_number'];
                $ret="SELECT  * FROM his_accounts WHERE acc_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$acc_number);
                $stmt->execute();
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
            {
            ?>
            <div class="content-page">
                <div class="content">

                    <!-- Bắt đầu nội dung -->
                    <div class="container-fluid">
                        
                        <!-- bắt đầu tiêu đề trang -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kế toán</a></li>
                                            <li class="breadcrumb-item active">Quản lý tài khoản phải trả</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Chi tiết tài khoản phải trả</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- kết thúc tiêu đề trang --> 
                        <!-- Hàng biểu mẫu -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Điền đầy đủ thông tin</h4>
                                        <!-- Biểu mẫu cập nhật tài khoản -->
                                        <form method="post">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Tên tài khoản</label>
                                                    <input type="text" required="required" value="<?php echo $row->acc_name;?>" name="acc_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Số tiền ($)</label>
                                                    <input type="text" required="required" value="<?php echo $row->acc_amount;?>" name="acc_amount" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                    <label for="inputPassword4" class="col-form-label">Mô tả tài khoản</label>
                                                    <textarea required="required" type="text" name="acc_desc" class="form-control"  id="editor"><?php echo $row->acc_desc;?></textarea>
                                            </div>

                                            <div class="form-group" style="display:none">
                                                <label for="inputAddress" class="col-form-label">Loại tài khoản</label>
                                                <input required="required" value="Tài khoản phải trả" type="text" class="form-control" name="acc_type" id="inputAddress">
                                            </div>

                                            <button type="submit" name="update_acc" class="ladda-button btn btn-warning" data-style="expand-right">Cập nhật tài khoản</button>

                                        </form>
                                        <!-- Kết thúc biểu mẫu -->
                                    </div> <!-- kết thúc card-body -->
                                </div> <!-- kết thúc card-->
                            </div> <!-- kết thúc col -->
                        </div>
                        <!-- kết thúc hàng -->

                    </div> <!-- container -->

                </div> <!-- nội dung -->
            <?php }?>
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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Khởi tạo nút tải -->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>
