<?php

require('checksession.php'); 
include '../inc/function.php'; 
if(isset($_POST['Dectivate'])  && isset($_POST['bb']))
{
     $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_gallery set glry_status='0' where glry_id='$act'");
		}
}

		
if(isset($_POST['Activate'])  && isset($_POST['bb']))
{
     $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_gallery set glry_status='1' where glry_id='$act'");
		}
}
		

if(isset($_POST['Delete'])  && isset($_POST['bb']))
{
     $bb = $_POST['bb'];
		foreach($bb as $act)
		{
			mysqli_query($conn,"delete from tbl_gallery where glry_id='$act'");
		}
}

		$mqry="select * from tbl_gallery order by glry_sort asc ";
		


if(isset($_POST['submit']))
{  

    $name = mysqli_real_escape_string($conn,$_POST['name']);
	$position = mysqli_real_escape_string($conn,$_POST['position']);
	$status = mysqli_real_escape_string($conn,$_POST['status']);
	
	    foreach($_FILES['pimages']['tmp_name'] as $key => $tmp_name )
        {
               $file_name = time()."_".$_FILES['pimages']['name'][$key];
               $file[]=$file_name;
               $file_size =$_FILES['pimages']['size'][$key];
               $file_tmp =$_FILES['pimages']['tmp_name'][$key];
               $file_type=$_FILES['pimages']['type'][$key];    
              
               $desired_dir="../uploads/gallery/";
               if(is_dir($desired_dir)==false)
               {
                mkdir("$desired_dir", 0700);        // Create directory/path if it does not exist
               }
               move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
        }
        $pimages=implode(",",$file);
        
        $images=explode(",",$pimages);
        for($i=0;$i<count($images);$i++)
        {
            $query=mysqli_query($conn,"INSERT INTO `tbl_gallery`(`glry_name`,`glry_image`, `glry_status`, `glry_sort`) VALUES ('$name','$images[$i]','$status','$position')");
            	$_SESSION['success']="Gallery Inserted successfully";
        }
	
		if($query==true)
		{
		$_SESSION['success']="Gallery Inserted successfully";
		header("refresh:3;url=manage-gallery.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Gallery Management</a></li>
				<li class="breadcrumb-item active">Manage Gallery</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a>Manage Gallery </h1>
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
							<h4 class="panel-title">Manage Gallery</h4>
						</div>
						
							<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter Name">
                </div>  
                 <div class="form-group">
                  <label for="exampleInputPassword1">Image File</label>
                  <input type="file" name="pimages[]" class="form-control" id="exampleInputPassword1" multiple>
                  <p class="help-block">Image dimension must be 410 × 460 px & must be jpg format</p>
                </div>
                
                   <div class="form-group">
                    <label for="exampleInputPassword1">Sort Number</label>
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
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
						</div>
						<!-- end panel-heading -->
                       <form name="myform" method="post" action=""> 
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
							</button>
						<div class="btn-group btn-group-justified">
                              <input type="Submit" name="Activate" value="Activate" class="btn btn-info btn-flat"> 
                              <input type="Submit" name="Dectivate" value="Dectivate" class="btn btn-warning btn-flat"> 
                              <input type="Submit" name="Delete" class="btn btn-danger btn-flat" value="Delete" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }">
                            </div>
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%">S.No.</th>
										<th width="1%" data-orderable="false">Image</th>
										<th class="text-nowrap">Status</th>
										<th class="text-nowrap">Edit</th>
										<th class="text-nowrap">Delete</th>
                                        <th width="1%">
											 <input type="checkbox" id="select_all">
                                         </th>
									</tr>
								</thead>
								<tbody>
                                <?php $count=1; $fetch=mysqli_query($conn,$mqry);
			                          while($web=mysqli_fetch_array($fetch)) { 
									
			                    ?>
									<tr class="odd gradeX">
										<td width="1%" class="f-s-600 text-inverse"><?php echo $count;?></td>
										<td width="10%" class="with-img"><?php if($web['glry_image']==''){ ?><img src="../uploads/no_img.jpg" class="img-rounded height-50" /><?php }else{ ?><img src="../uploads/gallery/<?php echo $web['glry_image']; ?>" class="img-rounded height-60" /><?php } ?></td>
                                   
												
                                        <td><div class="switcher">
                                              <input type="checkbox" onClick="updateId('<?php echo $web['glry_id']; ?>')" name="switcher_checkbox_1" id="switcher_checkbox_<?php echo $count;?>" <?php if( $web['glry_status']=='1'){ echo "checked"; }else {} ?> value="1">
                                              <label for="switcher_checkbox_<?php echo $count;?>"></label>
                                            </div>
                                        </td>
										
										<td><a href="edit-gallery.php?cid=<?php echo $web['glry_id'];?>" class='label label-sm label-primary' title="Edit"><i class="fa fa-edit"></i> Edit</a></td>
										<td><a href="delete/gallery.php?cid=<?php echo $web['glry_id'];?>" class='label label-sm label-danger' onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }" title="Delete"><i class="fa fa-trash"></i> Delete</a></td>
                                        <td>
                                          <input type="checkbox" class="checkbox" value="<?php echo $web['glry_id']; ?>" name="bb[]" id="bb[]">
                                        </td>
									</tr>
								<?php $count++; }?>	
                                    
								</tbody>
							</table>
						</div>
						<!-- end panel-body -->
                        </form>
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
			TableManageResponsive.init();
		});
	</script>
<!------------------------------>    
 <script>
function updateId(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            //alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "status/gallery.php?id=" +id, true);
    xmlhttp.send();
}
</script>
 <!--------------------------------------->  
	<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
    </script>
</body>
</html>
