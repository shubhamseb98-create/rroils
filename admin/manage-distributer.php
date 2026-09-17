<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_distributer`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$title = mysqli_real_escape_string($conn,$_POST['title']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);
    $oldimage = mysqli_real_escape_string($conn,$_POST['oldimage']);
    $alt = mysqli_real_escape_string($conn,$_POST['alt']);

    $image = $_FILES['image']['name'];
	if ($image != "") {
		$image = time() . "_" . $image;
		@unlink("../uploads/distributer/" . $oldimage);
		move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/distributer/" . $image);
	} else {
		$image = $brec['image'];
	} 


	$query = mysqli_query($conn, "UPDATE `tbl_distributer` SET `image`='$image',`alt`='$alt',`subheading`='$subheading',`heading`='$heading',`title`='$title',`content`='$content'");
	if ($query == true) {
		$_SESSION['success'] = "About Updated Successfully";
		header("refresh:3;url=manage-distributer.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Distributer Management</a></li>
			<li class="breadcrumb-item active">Edit Distributer</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Distributer</h1>
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
						<h4 class="panel-title"> Edit Distributer</h4>
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
								
								<div class="form-group">
									<label for="banner">Enter Title</label>
									<input type="text" name="title" class="form-control" value="<?= $brec['title']; ?>">
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
                                <div class="col-6">
                                <div class="form-group">
									<label for="exampleInputFile">Image File</label>
									<input type="file" name="image" class="form-control" id="exampleInputFile">
									<input type="hidden" name="oldimage" value="<?= $brec['image']; ?>">
									<p class="help-block">Image dimension must be 444 × 380 px & must be jpg format</p>
									<img src="../uploads/distributer/<?= $brec['image']; ?>" style="width:30%; height:100px" class="bg-dark">
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