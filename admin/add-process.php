<?php
require('checksession.php'); 
include '../inc/function.php'; 

if(isset($_POST['submit']))
{ 
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
	$position = mysqli_real_escape_string($conn,$_POST['position']);
	$status = mysqli_real_escape_string($conn,$_POST['status']);

//=============|image|============//

	$bimages=$_FILES['ach_image']['name'];
	if($bimages!="")
	{
		$bimage=time()."_".$bimages;
		move_uploaded_file($_FILES["ach_image"]["tmp_name"], "../uploads/process/".$bimage); 
	}
	else
	{
		$bimage="";	
	}



	$query=mysqli_query($conn,"INSERT INTO `tbl_process`(`title`,`content`,`icon`,`sort`, `status`) VALUES ('$title','$content','$bimage','$position','$status')");
    if($query==true)
    {
        $_SESSION['success']="Records Inserted successfully";
        header("refresh:3;url=manage-process.php");
    }
    else 
    {
        $_SESSION['error']="Something went wrong. Please try again";
      
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
	<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;"> Manage Process</a></li>
				<li class="breadcrumb-item active">Add Process</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Process</h1>
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
							<h4 class="panel-title">Add Process</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">
			<form role="form"  method="POST"  enctype="multipart/form-data">          

              <div class="box-body">
				  
				<div class="form-group">
					<label for="banner"> Enter Title</label>
					<input type="text" name="title" class="form-control" placeholder="Enter Title" >
				</div>
				  
				<div class="form-group">
					<label for="banner"> Enter Content</label>
					<textarea name="content" class="form-control" placeholder="Enter Content" ></textarea>
				</div>						

            <div class="form-group">
                <label for="exampleInputFile">Icon</label>
                <input type="file" name="ach_image" class="form-control" id="exampleInputFile">
                <p class="help-block">Image dimension must be 180 X 60 PX & must be jpg format</p>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Position</label>
                <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
            </div>                 
                
            <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
            </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
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
	$(document).ready(function() {
		App.init();
	});
</script>

</body>
</html>



