<?php
require('checksession.php'); 
include '../inc/function.php';     

$b=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_service_category` where `id`='$b'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
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
  $oldbimg = mysqli_real_escape_string($conn,$_POST['oldbimg']);
  $oldsizeone = mysqli_real_escape_string($conn,$_POST['oldsizeone']);
  $oldsizetwo = mysqli_real_escape_string($conn,$_POST['oldsizetwo']);
   
    $broadimage=$_FILES['broadimage']['name'];
    if($broadimage!='')
    {
      $broadimage=time()."_".$broadimage;      
      @unlink("../uploads/category/".$oldbimg); 
      move_uploaded_file($_FILES["broadimage"]["tmp_name"], "../uploads/category/".$broadimage);

    }
    else{
      $broadimage = $oldbimg;
    }
    
    $size_one=$_FILES['size_one']['name'];
    if($size_one!='')
    {
      $size_one=time()."_".$size_one;      
      @unlink("../uploads/category/".$oldsizeone); 
      move_uploaded_file($_FILES["size_one"]["tmp_name"], "../uploads/category/".$size_one);

    }
    else{
      $size_one = $oldsizeone;
    }
    
    $size_two=$_FILES['size_two']['name'];
    if($size_two!='')
    {
      $size_two=time()."_".$size_two;      
      @unlink("../uploads/category/".$oldsizetwo); 
      move_uploaded_file($_FILES["size_two"]["tmp_name"], "../uploads/category/".$size_two);

    }
    else{
      $size_two = $oldsizetwo;
    }
    
      $query=mysqli_query($conn,"UPDATE `tbl_service_category` SET `broadimage`='$broadimage',`name`='$name',`url`='$prourl',`title`='$metatag', `keyword`='$keyword', `metadesc`='$metadesc', `sort`='$position', `status`='$status', `size_one`='$size_one', `size_two`='$size_two' WHERE `id`='$b'");
  
      if($query==true)
        {
    $_SESSION['success']="Service Category updated successfully";
    header("refresh:3;url=manage-service-category.php");    
        }
        else 
        {
        // Message for unsuccessfull insertion
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
				<li class="breadcrumb-item active">Edit Service Category</li>
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
							<h4 class="panel-title">Edit Service Category</h4>
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
                  <input type="text"  name="name" class="form-control" id="heading" value="<?= $brec['name']; ?>">
                </div>
                </div>
                <div class="col-lg-6">
                 <div class="form-group">
                    <label for="heading">Service Category URL<code>Same as Service Category name & avoid Special Characters</code></label>
                    <input type="text" name="url" class="form-control" value="<?= $brec['url']; ?>" id="url" placeholder="Enter Service Category Url" required>
                </div>
                </div>
              
                <div class="col-lg-6">
                 <div class="form-group">
                  <label for="bannerlink">Breadcrumb Image File</label>
                  <input type="file"  name="broadimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldbimg"  value="<?= $brec['broadimage']; ?>">
                  <p class="help-block">Image dimension must be 1351 X 300 & must be jpg format</p>
                  <?php
                  if($brec['broadimage']>0){
                  ?>
                  <img src="../uploads/category/<?= $brec['broadimage']; ?>" width="30%" >
                <?php
                  }
                ?>
                </div>
                </div>
                
                <div class="col-lg-6">
                 <div class="form-group">
                  <label for="bannerlink">Size One Image File</label>
                  <input type="file"  name="size_one"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldsizeone"  value="<?= $brec['size_one']; ?>">
                  <p class="help-block">Image dimension must be 212 X 237 & must be jpg format</p>
                  <?php
                  if($brec['size_one']>0){
                  ?>
                  <img src="../uploads/category/<?= $brec['size_one']; ?>" width="30%" >
                <?php
                  }
                ?>
                </div>
                </div>
                
                <div class="col-lg-6">
                 <div class="form-group">
                  <label for="bannerlink">Size Two Image File</label>
                  <input type="file"  name="size_two"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldsizetwo"  value="<?= $brec['size_two']; ?>">
                  <p class="help-block">Image dimension must be 212 X 237 & must be jpg format</p>
                  <?php
                  if($brec['size_two']>0){
                  ?>
                  <img src="../uploads/category/<?= $brec['size_two']; ?>" width="30%" >
                <?php
                  }
                ?>
                </div>
                </div>
           
                <div class="col-lg-6">
                	<div class="form-group">
					<label for="exampleInputPassword1">Sort Number</label>
					<input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
				</div>
              </div>
              </div>
              

                <div class="form-group row m-b-10">
                  <label class="col-md-1 col-form-label">Status :-</label>
                  <div class="col-md-9">
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios4" value="1" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                      <label for="optionsRadios4">Active</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios3" value="0" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                      <label for="optionsRadios3">Inactive</label>
                    </div>
                  </div>
                </div>
              

                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" value="<?= $brec['title']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" class="form-control" ><?= $brec['keyword']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['metadesc']; ?></textarea>
                 </div>
                </div><br>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
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
		<!-- end #content -->
		
		
		
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
  defult();
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
CKEDITOR.replace('editor2', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
});
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

function defult()
{
 
    var inputValue = $('input[type="radio"]:checked').attr("value");
    if(inputValue=="Submenu")
    {
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    }
    else{
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    }
   
    
}

</script>
<!----Seo tool----->
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
<script>
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

</script>

</body>
</html>
