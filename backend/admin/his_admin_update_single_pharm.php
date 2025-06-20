<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical']))
		{
			$phar_name = $_POST['phar_name'];
			$phar_desc = $_POST['phar_desc'];
            $phar_qty = $_POST['phar_qty'];
            $phar_cat = $_POST['phar_cat'];
            $phar_bcode = $_GET['phar_bcode'];
            $phar_vendor = $_POST['phar_vendor'];
                
            // câu lệnh SQL để cập nhật dữ liệu đã nhập
			$query="UPDATE  his_pharmaceuticals SET phar_name = ?, phar_desc = ?, phar_qty = ?, phar_cat = ?, phar_vendor = ? WHERE phar_bcode = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $phar_name, $phar_desc, $phar_qty, $phar_cat, $phar_vendor, $phar_bcode);
			$stmt->execute();

			// khai báo biến thông báo
			if($stmt)
			{
				$success = "Cập nhật thuốc thành công";
			}
			else {
				$err = "Vui lòng thử lại sau";
			}
		}
?>
<!-- Kết thúc phía máy chủ -->
<!-- Kết thúc đăng ký bệnh nhân -->
<!DOCTYPE html>
<html lang="vi">
    
    <!--Phần đầu-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Bắt đầu trang -->
        <div id="wrapper">

            <!-- Bắt đầu thanh điều hướng -->
            <?php include("assets/inc/nav.php");?>
            <!-- Kết thúc thanh điều hướng -->

            <!-- ========== Bắt đầu thanh bên trái ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Kết thúc thanh bên trái -->

            <!-- ============================================================== -->
            <!-- Bắt đầu nội dung trang -->
            <!-- ============================================================== -->
            <?php
                $phar_bcode = $_GET['phar_bcode'];
                $ret="SELECT  * FROM his_pharmaceuticals WHERE phar_bcode=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$phar_bcode);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dược phẩm</a></li>
                                                <li class="breadcrumb-item active">Quản lý thuốc</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Cập nhật #<?php echo $row->phar_bcode;?> - <?php echo $row->phar_name;?></h4>
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
                                            <!-- Biểu mẫu cập nhật thuốc -->
                                            <form method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">Tên thuốc</label>
                                                        <input type="text" required="required" value="<?php echo $row->phar_name;?>" name="phar_name" class="form-control" id="inputEmail4" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Số lượng thuốc (Thùng)</label>
                                                        <input required="required" type="text" value="<?php echo $row->phar_qty;?>" name="phar_qty" class="form-control"  id="inputPassword4">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress" class="col-form-label">Mô tả thuốc</label>
                                                    <textarea required="required"  type="text" class="form-control" name="phar_desc" id="editor"><?php echo $row->phar_desc;?></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Nhà cung cấp thuốc</label>
                                                        <input required="required" type="text" value="<?php echo $row->phar_vendor;?>" name="phar_vendor" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputState" class="col-form-label">Danh mục thuốc</label>
                                                        <select id="inputState" required="required" name="phar_cat" class="form-control">
                                                        <!--Lấy tất cả danh mục thuốc-->
                                                        <?php
                                                            $ret="SELECT * FROM  his_pharmaceuticals_categories ORDER BY RAND() "; 
                                                            $stmt= $mysqli->prepare($ret) ;
                                                            $stmt->execute();
                                                            $res=$stmt->get_result();
                                                            $cnt=1;
                                                            while($row=$res->fetch_object())
                                                            {
                                                        ?>
                                                            <option><?php echo $row->pharm_cat_name;?></option>
                                                        <?php }?>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" name="update_pharmaceutical" class="ladda-button btn btn-warning" data-style="expand-right">Cập nhật thuốc</button>
                                            </form>
                                        </div> <!-- kết thúc card-body -->
                                    </div> <!-- kết thúc card-->
                                </div> <!-- kết thúc col -->
                            </div>
                            <!-- kết thúc hàng -->

                        </div> <!-- container -->

                    </div> <!-- nội dung -->

                    <!-- Bắt đầu chân trang -->
                    <?php include('assets/inc/footer.php');?>
                    <!-- Kết thúc chân trang -->

                </div>
            <?php }?>
            <!-- ============================================================== -->
            <!-- Kết thúc nội dung trang -->
            <!-- ============================================================== -->

        </div>
        <!-- KẾT THÚC wrapper -->

        <!-- Tải CKEditor -->
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
       
        <!-- Lớp phủ thanh bên phải -->
        <div class="rightbar-overlay"></div>

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
