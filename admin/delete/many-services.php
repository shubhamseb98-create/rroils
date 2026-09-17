<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_many_service where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);

$data=mysqli_query($conn,"DELETE FROM `tbl_many_service` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Record Deleted successfully";
	header("location:../manage-many-services.php");
}
?>





