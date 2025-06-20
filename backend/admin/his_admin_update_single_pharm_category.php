<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical_category']))
		{
			$pharm_cat_name = $_GET['pharm_cat_name'];
			$pharm_cat_vendor = $_POST['pharm_cat_vendor'];
			$pharm_cat_desc=$_POST['pharm_cat_desc'];

            // câu lệnh SQL để cập nhật giá trị đã nhập
			$query="UPDATE  his_pharmaceuticals_categories SET  pharm_cat_vendor=?, pharm_cat_desc=? WHERE pharm_cat_name = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss',   $pharm_cat_vendor, $pharm_cat_desc, $pharm_cat_name);
			$stmt->execute();

			// khai báo biến để hiển thị thông báo
			if($stmt)
			{
				$success = "Đã cập nhật danh mục dược phẩm";
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
                $pharm_cat_name=$_GET['pharm_cat_name'];
                $ret="SELECT  * FROM his_pharmaceuticals_categories WHERE pharm_cat_name=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$pharm_cat_name);
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Bảng điều khiển</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dược phẩm</a></li>
                                            <li class="breadcrumb-item active">Quản lý danh mục dược phẩm</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->pharm_cat_name;?></h4>
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
                                        <!-- Biểu mẫu cập nhật danh mục -->
                                        <form method="post">
                                            <div class="form-row" >
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputEmail4" class="col-form-label">Tên danh mục dược phẩm</label>
                                                    <input  type="text" value="<?php echo $row->pharm_cat_name;?>" required="required" name="pharm_cat_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">Nhà cung cấp dược phẩm</label>
                                                    <input required="required" value="<?php echo $row->pharm_cat_vendor;?>" type="text" name="pharm_cat_vendor" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Mô tả danh mục dược phẩm</label>
                                                <textarea required="required" type="text" class="form-control" name="pharm_cat_desc" id="editor"><?php echo $row->pharm_cat_desc;?></textarea>
                                            </div>

                                           <button type="submit" name="update_pharmaceutical_category" class="ladda-button btn btn-danger" data-style="expand-right">Cập nhật danh mục</button>

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

            <!-- ============================================================== -->
            <!-- Kết thúc nội dung trang -->
            <!-- ============================================================== -->
                <?php }?>

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
