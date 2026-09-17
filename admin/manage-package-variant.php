<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_package_variant` WHERE `id` = '1'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {
	$heading1 = mysqli_real_escape_string($conn, $_POST['heading1']);
	$heading2 = mysqli_real_escape_string($conn,$_POST['heading2']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);


    $image1 = $_FILES['image1']['name'];
	if ($image1 != "") {
		$image1 = time() . "_" . $image1;
		@unlink("../uploads/package_variant/" . $brec['image']);
		move_uploaded_file($_FILES["image1"]["tmp_name"], "../uploads/package_variant/" . $image1);
	} else {
		$image1 = $brec['image'];
	} 

   
	$query = mysqli_query($conn, "UPDATE `tbl_package_variant` SET `heading1`='$heading1',`heading2`='$heading2',`content`='$content',`image`='$image1'"); 
	if ($query == true) {
		$_SESSION['success'] = "Why Choose Updated Successfully";
		header("refresh:3;url=manage-package-variant.php");
	} else {
		$_SESSION['error'] = "Something went wrong. Please try again";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="javascript:;">Package Variant Management</a></li>
			<li class="breadcrumb-item active">Edit Package Variant</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Package Variant</h1>
		<!-- begin row -->
		<div class="row">
			<!-- begin col-10 -->
			<div class="col-lg-12">
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<!-- begin panel-heading -->
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title">Edit Package Variant</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
							    <div class="row">

								<div class="form-group col-6">
									<label for="banner">Enter Heading 1</label>
									<input type="text" name="heading1" class="form-control" value="<?= $brec['heading1']; ?>" >
								</div>

								<div class="form-group col-6">
									<label for="banner">Enter Heading 2</label>
									<input type="text" name="heading2" class="form-control" value="<?= $brec['heading2']; ?>" >
								</div>
								
								<div class="form-group col-12">  
									<label for="banner">Enter Content</label>
									<textarea name="content" class="form-control" id="editor1"><?= $brec['content']; ?></textarea> 
								</div>	

                                <div class="col-6">
									<div class="form-group">
										<label for="exampleInputFile">Image 1</label>
										<input type="file" name="image1" class="form-control" id="exampleInputFile">
										<input type="hidden" name="oldimage1" value="<?= $brec['image']; ?>">
										<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
										<img src="../uploads/package_variant/<?= $brec['image']; ?>" style="width:30%; height:100px" class="bg-dark">
									</div>
								</div>								

								</div>
				

							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
								<!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
							</div>
						</form>
					</div>
					<!-- end panel-body -->
				</div>
				<!-- end panel -->
			</div>
			<!-- end col-10 -->
		</div>
		<!-- end row -->
	</div>
	<!-- begin scroll to top btn -->
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<?php require("includes/footer.php"); ?>

	<script>
		$(document).ready(function() {
			App.init();
			initSample();
			CKEDITOR.replace('editor1', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
			// CKEDITOR.replace('editor2', {
			// 	filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			// });
			// 	CKEDITOR.replace('editor3', {
			// 	filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			// });
			// 	CKEDITOR.replace('editor4', {
			// 	filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			// });

		});
	</script>

	<script>
		function myFunction() {
			var x = document.getElementById("myDIV");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>
	<script>
		function myGetlink() {
			var x = document.getElementById("myIMG");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

</body>

</html>

