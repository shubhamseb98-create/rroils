<?php
require('../../inc/function.php');
$b=$_REQUEST['cid'];

$banner=mysqli_query($conn,"select * from tbl_gallery where glry_id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
@unlink("../../uploads/gallery/".$bannerData["glry_image"]); 


$data=mysqli_query($conn,"DELETE FROM `tbl_gallery` WHERE `glry_id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Gallery Deleted successfully";
	header("location:../manage-gallery.php");
}
?>