<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_manufaturing` WHERE `id` = '1'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {
	$heading1 = mysqli_real_escape_string($conn, $_POST['heading1']);
	$heading2 = mysqli_real_escape_string($conn,$_POST['heading2']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$i_heading1 = mysqli_real_escape_string($conn,$_POST['i_heading1']);
	$i_text1 = mysqli_real_escape_string($conn, $_POST['i_text1']);
	$i_heading2 = mysqli_real_escape_string($conn,$_POST['i_heading2']);
	$i_text2 = mysqli_real_escape_string($conn, $_POST['i_text2']);
	$i_heading3 = mysqli_real_escape_string($conn,$_POST['i_heading3']);
	$i_text3 = mysqli_real_escape_string($conn, $_POST['i_text3']);
	$i_heading4 = mysqli_real_escape_string($conn,$_POST['i_heading4']);
	$i_text4 = mysqli_real_escape_string($conn, $_POST['i_text4']);
	$i_heading5 = mysqli_real_escape_string($conn,$_POST['i_heading5']);
	$i_text5 = mysqli_real_escape_string($conn, $_POST['i_text5']);

    $image1 = $_FILES['image1']['name'];
	if ($image1 != "") {
		$image1 = time() . "_" . $image1;
		@unlink("../uploads/process/" . $brec['image']);
		move_uploaded_file($_FILES["image1"]["tmp_name"], "../uploads/process/" . $image1);
	} else {
		$image1 = $brec['image'];
	} 

    $icon2 = $_FILES['icon2']['name'];
	if ($icon2 != "") {
		$icon2 = time() . "_" . $icon2;
		@unlink("../uploads/process/" . $brec['icon2']);
		move_uploaded_file($_FILES["icon2"]["tmp_name"], "../uploads/process/" . $icon2);
	} else {
		$icon2 = $brec['icon2'];
	} 

    $icon1 = $_FILES['icon1']['name'];
	if ($icon1 != "") {
		$icon1 = time() . "_" . $icon1;
		@unlink("../uploads/process/" . $brec['icon1']);
		move_uploaded_file($_FILES["icon1"]["tmp_name"], "../uploads/process/" . $icon1);
	} else {
		$icon1 = $brec['icon1'];
	} 


    $icon3 = $_FILES['icon3']['name'];
	if ($icon3 != "") {
		$icon3 = time() . "_" . $icon3;
		@unlink("../uploads/process/" . $brec['icon3']);
		move_uploaded_file($_FILES["icon3"]["tmp_name"], "../uploads/process/" . $icon3);
	} else {
		$icon3 = $brec['icon3'];
	} 	


    $icon4 = $_FILES['icon4']['name'];
	if ($icon4 != "") {
		$icon4 = time() . "_" . $icon4;
		@unlink("../uploads/process/" . $brec['icon4']);
		move_uploaded_file($_FILES["icon4"]["tmp_name"], "../uploads/process/" . $icon4);
	} else {
		$icon4 = $brec['icon4'];
	} 	


    $icon5 = $_FILES['icon5']['name'];
	if ($icon5 != "") {
		$icon5 = time() . "_" . $icon5;
		@unlink("../uploads/process/" . $brec['icon5']);
		move_uploaded_file($_FILES["icon5"]["tmp_name"], "../uploads/process/" . $icon5);
	} else {
		$icon5 = $brec['icon5'];
	} 	


	$query = mysqli_query($conn, "UPDATE `tbl_manufaturing` SET `heading1`='$heading1',`heading2`='$heading2',`content`='$content',`i_heading1`='$i_heading1',`i_text1`='$i_text1',`i_heading2`='$i_heading2',`i_text2`='$i_text2',`i_heading3`='$i_heading3',`i_text3`='$i_text3',`i_heading4`='$i_heading4',`i_text4`='$i_text4',`i_heading5`='$i_heading5',`i_text5`='$i_text5',`image`='$image1',`icon1`='$icon1',`icon2`='$icon2',`icon3`='$icon3',`icon4`='$icon4',`icon5`='$icon5'"); 
	if ($query == true) {
		$_SESSION['success'] = "Why Choose Updated Successfully";
		header("refresh:3;url=manage-manufacturing.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Manufacturing Management</a></li>
			<li class="breadcrumb-item active">Edit Manufacturing Process</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Manufacturing Process</h1>
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
						<h4 class="panel-title">Edit Manufacturing Process</h4>
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
										<img src="../uploads/process/<?= $brec['image']; ?>" style="width:30%; height:100px" class="bg-dark">
									</div>
								</div>								

								</div>
						
								<div class="row">
								
										<div class="form-group col-6">
											<label for="banner">Process Heading 1</label>
											<input type="text" name="i_heading1" class="form-control" value="<?= $brec['i_heading1']; ?>" >
										</div>

										<div class="col-6">
											<div class="form-group">
												<label for="exampleInputFile">Icon 1</label>
												<input type="file" name="icon1" class="form-control" id="exampleInputFile">
												<input type="hidden" name="oldicon1" value="<?= $brec['icon1']; ?>">
												<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
												<img src="../uploads/process/<?= $brec['icon1']; ?>" style="width:30%; height:100px" class="bg-dark">
											</div>
										</div>									
										
										<div class="form-group col-12">  
											<label for="banner">Enter Process Text 1</label>
											<textarea name="i_text1" class="form-control" id="editor1"><?= $brec['i_text1']; ?></textarea> 
										</div>									

								</div>
						
								<div class="row">
								
										<div class="form-group col-6">
											<label for="banner">Process Heading 2</label>
											<input type="text" name="i_heading2" class="form-control" value="<?= $brec['i_heading2']; ?>" >
										</div>

										<div class="col-6">
											<div class="form-group">
												<label for="exampleInputFile">Icon 2</label>
												<input type="file" name="icon2" class="form-control" id="exampleInputFile">
												<input type="hidden" name="oldicon2" value="<?= $brec['icon2']; ?>">
												<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
												<img src="../uploads/process/<?= $brec['icon2']; ?>" style="width:30%; height:100px" class="bg-dark">
											</div>
										</div>									
										
										<div class="form-group col-12">  
											<label for="banner">Enter Process Text 2</label>
											<textarea name="i_text2" class="form-control" id="editor1"><?= $brec['i_text2']; ?></textarea> 
										</div>									

								</div>
						
								<div class="row">
								
										<div class="form-group col-6">
											<label for="banner">Process Heading 3</label>
											<input type="text" name="i_heading3" class="form-control" value="<?= $brec['i_heading3']; ?>" >
										</div>

										<div class="col-6">
											<div class="form-group">
												<label for="exampleInputFile">Icon 3</label>
												<input type="file" name="icon3" class="form-control" id="exampleInputFile">
												<input type="hidden" name="oldicon3" value="<?= $brec['icon3']; ?>">
												<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
												<img src="../uploads/process/<?= $brec['icon3']; ?>" style="width:30%; height:100px" class="bg-dark">
											</div>
										</div>									
										
										<div class="form-group col-12">  
											<label for="banner">Enter Process Text 3</label>
											<textarea name="i_text3" class="form-control" id="editor1"><?= $brec['i_text3']; ?></textarea> 
										</div>									

								</div>
						
								<div class="row">
								
										<div class="form-group col-6">
											<label for="banner">Process Heading 4</label>
											<input type="text" name="i_heading4" class="form-control" value="<?= $brec['i_heading4']; ?>" >
										</div>

										<div class="col-6">
											<div class="form-group">
												<label for="exampleInputFile">Icon 4</label>
												<input type="file" name="icon4" class="form-control" id="exampleInputFile">
												<input type="hidden" name="oldicon4" value="<?= $brec['icon4']; ?>">
												<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
												<img src="../uploads/process/<?= $brec['icon4']; ?>" style="width:30%; height:100px" class="bg-dark">
											</div>
										</div>									
										
										<div class="form-group col-12">  
											<label for="banner">Enter Process Text 4</label>
											<textarea name="i_text4" class="form-control" id="editor1"><?= $brec['i_text4']; ?></textarea> 
										</div>									

								</div>
						
								<div class="row">
								
										<div class="form-group col-6">
											<label for="banner">Process Heading 5</label>
											<input type="text" name="i_heading5" class="form-control" value="<?= $brec['i_heading5']; ?>" >
										</div>

										<div class="col-6">
											<div class="form-group">
												<label for="exampleInputFile">Icon 5</label>
												<input type="file" name="icon5" class="form-control" id="exampleInputFile">
												<input type="hidden" name="oldicon5" value="<?= $brec['icon5']; ?>">
												<p class="help-block">Image dimension must be 395 × 436 px & must be jpg format</p>
												<img src="../uploads/process/<?= $brec['icon5']; ?>" style="width:30%; height:100px" class="bg-dark">
											</div>
										</div>									
										
										<div class="form-group col-12">  
											<label for="banner">Enter Process Text 5</label>
											<textarea name="i_text5" class="form-control" id="editor1"><?= $brec['i_text5']; ?></textarea> 
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

