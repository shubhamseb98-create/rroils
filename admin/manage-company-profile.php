<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_company_profile`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$tbl_desc = mysqli_real_escape_string($conn,$_POST['tbl_desc']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);
    $oldimage = mysqli_real_escape_string($conn,$_POST['oldimage']);
    $alt = mysqli_real_escape_string($conn,$_POST['alt']);

    $image = $_FILES['image']['name'];
	if ($image != "") {
		$image = time() . "_" . $image;
		@unlink("../uploads/company_profile/" . $oldimage);
		move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/company_profile/" . $image);
	} else {
		$image = $brec['image'];
	} 


	$query = mysqli_query($conn, "UPDATE `tbl_company_profile` SET `image`='$image',`alt`='$alt',`subheading`='$subheading',`heading`='$heading',`tbl_desc`='$tbl_desc',`content`='$content'");
	if ($query == true) {
		$_SESSION['success'] = "Company Profile Updated Successfully";
		header("refresh:3;url=manage-company-profile.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Company Profile Management</a></li>
			<li class="breadcrumb-item active">Edit Company Profile</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Company Profile</h1>
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
						<h4 class="panel-title"> Edit Company Profile</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">

								<div class="form-group">
									<label for="banner">Enter Subheading</label>
									<input type="text" name="subheading" class="form-control" value="<?= $brec['subheading']; ?>">
								</div>
								
								<div class="form-group">
									<label for="banner">Enter Heading</label>
									<input type="text" name="heading" class="form-control" value="<?= $brec['heading']; ?>">
								</div>

								<div class="row">
								<div class="col-sm-12">
								<div class="form-group">
									<label for="bannerlink"> Enter Content</label>
									<textarea name="content" id="editor1" class="form-control" rows="3"><?= $brec['content']; ?></textarea>
								</div>
                                </div>
                                </div>
                                
								<div class="row">
								<div class="col-sm-12">
								<div class="form-group">
									<label for="bannerlink"> Enter Table Description</label>
									<textarea name="tbl_desc" id="editor2" class="form-control" rows="3"><?= $brec['tbl_desc']; ?></textarea>
								</div>
                                </div>
                                </div>
                                
								<div class="row">
                                <div class="col-6">
                                <div class="form-group">
									<label for="exampleInputFile">Image File</label>
									<input type="file" name="image" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimage" value="<?= $brec['image']; ?>">
									<p class="help-block">Image dimension must be 465 × 414 px & must be jpg format</p>
									<img src="../uploads/company_profile/<?= $brec['image']; ?>" style="width:30%; height:100px" class="bg-dark">
								</div>
								</div>
								
								<div class="col-6">
								<div class="form-group">
									<label for="banner">Image Alt</label>
									<input type="text" name="alt" class="form-control" value="<?= $brec['alt']; ?>">
								</div>
								</div>
								</div>

							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
								<button type="reset" name="reset" class="btn btn-danger">Reset</button>
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
			CKEDITOR.replace('editor2', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});

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