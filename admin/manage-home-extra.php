<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_home_extra`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$acc_subheading = mysqli_real_escape_string($conn, $_POST['acc_subheading']);
	$acc_heading = mysqli_real_escape_string($conn, $_POST['acc_heading']);
	$acc_content = mysqli_real_escape_string($conn, $_POST['acc_content']);
	$work_heading = mysqli_real_escape_string($conn, $_POST['work_heading']);
	$manufac_subheading = mysqli_real_escape_string($conn, $_POST['manufac_subheading']);
	$manu_heading = mysqli_real_escape_string($conn, $_POST['manu_heading']);
	$variant_heading = mysqli_real_escape_string($conn, $_POST['variant_heading']);
	$con_heading = mysqli_real_escape_string($conn, $_POST['con_heading']);

	$query = mysqli_query($conn, "UPDATE `tbl_home_extra` SET `acc_subheading`='$acc_subheading',`acc_heading`='$acc_heading',`acc_content`='$acc_content',`work_heading`='$work_heading',`manufac_subheading`='$manufac_subheading',`manu_heading`='$manu_heading',`variant_heading`='$variant_heading',`con_heading`='$con_heading'");
	if ($query == true) {
		$_SESSION['success'] = "Updated Successfully";
		header("refresh:3;url=manage-home-extra.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Home Extra Management</a></li>
			<li class="breadcrumb-item active">Edit Home Extra</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Home Extra</h1>
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
						<h4 class="panel-title"> Edit Home Extra</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Accreditation Sub Title</label>
        									<input type="text" name="acc_subheading" class="form-control" id="" value="<?= $brec['acc_subheading']; ?>">
        								</div>
							     	</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Accreditation Heading</label>
        									<input type="text" name="acc_heading" class="form-control" id="" value="<?= $brec['acc_heading']; ?>">
        								</div>
    								</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Accreditation Content</label>
        									<input type="text" name="acc_content" class="form-control" value="<?= $brec['acc_content']; ?>">
        								</div>
    								</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Work Heading</label>
        									<input type="text" name="work_heading" class="form-control" value="<?= $brec['work_heading']; ?>">
        								</div>
    								</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Manufacturing SubHeading</label>
        									<input type="text" name="manufac_subheading" class="form-control" id="" value="<?= $brec['manufac_subheading']; ?>">
        								</div>
    								</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Manufacturing Heading</label>
        									<input type="text" name="manu_heading" class="form-control" id="" value="<?= $brec['manu_heading']; ?>">
        								</div>
    						     	</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Variant Heading</label>
        									<input type="text" name="variant_heading" class="form-control" id="" value="<?= $brec['variant_heading']; ?>">
        								</div>
    								</div>
    								<div class="col-md-6">
        								<div class="form-group">
        									<label for="banner"> Enter Contact Heading</label>
        									<input type="text" name="con_heading" class="form-control" id="" value="<?= $brec['con_heading']; ?>">
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