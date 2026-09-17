<?php
require('checksession.php'); 
require '../inc/function.php';     

if(isset($_POST['submit']))
{   
    $name = mysqli_real_escape_string($conn,$_POST['name']); 
     $producturl = mysqli_real_escape_string($conn, $_POST['url']);
    $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%','=',':','?','[',']','~','+','`','{','}','|'), '-', $producturl);
    $prourl = strtolower($purl);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']); 
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']); 
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadescription']); 
	$position = mysqli_real_escape_string($conn,$_POST['position']); 
	$status = mysqli_real_escape_string($conn,$_POST['status']); 
	
    $broadimage=$_FILES['bnr_broadimage']['name'];
	if($broadimage!='')
	{
		$broadimage=time()."_".$broadimage;
		move_uploaded_file($_FILES["bnr_broadimage"]["tmp_name"], "../uploads/category/".$broadimage);
	}
	else{
		$broadimage='';
	}
	
    $size_one = $_FILES['size_one']['name'];
	if($size_one!='')
	{
		$size_one=time()."_".$size_one;
		move_uploaded_file($_FILES["size_one"]["tmp_name"], "../uploads/category/".$size_one);
	}
	else{
		$size_one='';
	}
	
    $size_two = $_FILES['size_two']['name'];
	if($size_two!='')
	{
		$size_two=time()."_".$size_two;
		move_uploaded_file($_FILES["size_two"]["tmp_name"], "../uploads/category/".$size_two);
	}
	else{
		$size_two='';
	}
	

	
	$query=mysqli_query($conn,"INSERT INTO `tbl_service_category`(`name`, `title`, `keyword`, `metadesc`,`url`, `sort`,`broadimage`, `status`, `size_one`, `size_two`) VALUES ('$name','$metatag','$keyword','$metadesc','$prourl','$position','$broadimage','$status','$size_one','$size_two')");
	if($query==true)
	{
	$_SESSION['success']="Service Category inserted successfully";
	header("refresh:3;url=manage-service-category.php");	
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
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Service Category Management</a></li>
				<li class="breadcrumb-item active">Add Service Category</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
				<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Service Category </h1>
		
			<!-- end page-header -->
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
							<h4 class="panel-title">Add  Service Category</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                  <div class="row">
				<div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Service Category Name</label>
                  <input type="text"  name="name" class="form-control" id="heading" placeholder="Enter Service Category Name" required>
                </div>
                </div>
				<div class="col-lg-6">
                <div class="form-group">
                    <label for="heading">Service Category URL<code>Same as Service Category name & avoid Special Characters</code></label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Service Category Url" required>
                </div>
                </div>
			
				<div class="col-lg-6">
		        <div class="form-group">
                  <label for="exampleInputFile">Breadcrumb Image</label>
                  <input type="file" name="bnr_broadimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 1351 X 300 & must be webp format</p>
                </div>
                </div>
                
				<div class="col-lg-6">
		        <div class="form-group">
                  <label for="exampleInputFile">Size One Image</label>
                  <input type="file" name="size_one" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 212 X 237 & must be webp format</p>
                </div>
                </div>
                
				<div class="col-lg-6">
		        <div class="form-group">
                  <label for="exampleInputFile">Size Two Image</label>
                  <input type="file" name="size_two" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 212 X 237 & must be webp format</p>
                </div>
                </div>
                
                <div class="col-lg-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Sort Number</label>
					<input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
				</div>
				</div>	
				</div>	
          
                <div class="form-group row m-b-10">
					<label class="col-md-1 col-form-label">Status :-</label>
					<div class="col-md-9">
						<div class="radio radio-css radio-inline">
							<input type="radio" name="status" id="optionsRadios4" value="1" checked>
							<label for="optionsRadios4">Active</label>
						</div>
						<div class="radio radio-css radio-inline">
							<input type="radio" name="status" id="optionsRadios3" value="0">
							<label for="optionsRadios3">Inactive</label>
						</div>
					</div>
				</div>
 
				  
				<div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                  <div class="form-group">
                    <label for="metatag">Meta Title</label>
                    <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" >
                  </div>
                 
                  <div class="form-group">
                    <label for="keyword">Meta Keyword</label>
                    <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ></textarea>
                 </div>
                 
                  <div class="form-group">
                    <label for="metadescription">Meta Description</label>
                    <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                 </div> 
                 </div>  <br/>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
				<input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
                
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
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

</script>
<!------------------>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<!----Seo tool----->	
<script type="text/javascript">
$(function () {
   $("#btnPassport").click(function () {
      if ($(this).val() == "Use Seo tools") {
            $("#dvPassport").show();
            $(this).val("Close Seo tools");
        } else {
            $("#dvPassport").hide();
            $(this).val("Use Seo tools");
        }
    });
});
</script>	
<!----Get Image----->
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
<!----End Get Image----->	
</body>
</html>
