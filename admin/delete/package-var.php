<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_package_var where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);

$data=mysqli_query($conn,"DELETE FROM `tbl_package_var` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Package Variant Deleted successfully";
	header("location:../manage-package-var.php");
}
?>





