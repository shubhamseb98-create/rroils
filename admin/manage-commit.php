<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_commitment`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
	$heading1 = mysqli_real_escape_string($conn, $_POST['heading1']);
	$heading2 = mysqli_real_escape_string($conn, $_POST['heading2']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);

        // $image = $_FILES['image']['name'];
        // if ($image != "") {
        // 	$image = time() . "_" . $image;
        // 	@unlink("../uploads/about/" . $brec['image']);
        // 	move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/about/" . $image);
        // } else {
        // 	$image = $brec['image'];
        // } 

	$query = mysqli_query($conn, "UPDATE `tbl_commitment` SET `subheading`='$subheading',`heading1`='$heading1',`heading2`='$heading2',`content`='$content'");
	if ($query == true) {
		$_SESSION['success'] = "Updated Successfully";
		header("refresh:3;url=manage-commit.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Commitment Management</a></li>
			<li class="breadcrumb-item active">Edit Commitment</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Commitment</h1>
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
						<h4 class="panel-title"> Edit Commitment</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">

							<div class="row">

								<div class="form-group col-md-6">
									<label for="banner">Enter Subheading</label>
									<input type="text" name="subheading" class="form-control" value="<?= $brec['subheading']; ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="banner">Enter Heading 1</label>
									<input type="text" name="heading1" class="form-control" value="<?= $brec['heading1']; ?>">
								</div>
							</div>	
								
								<div class="form-group">
									<label for="banner">Enter Heading 2</label>
									<input type="text" name="heading2" class="form-control" value="<?= $brec['heading2']; ?>">
								</div>
								
								<div class="form-group">
									<label for="banner">Enter Content</label>
									<textarea name="content" class="form-control" ><?= $brec['content']; ?></textarea>
								</div>
		
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
								<!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button>
								<button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button> -->
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





