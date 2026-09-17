<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_commit_standards where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);

$data=mysqli_query($conn,"DELETE FROM `tbl_commit_standards` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Record Deleted successfully";
	header("location:../manage-commit-standard.php");
}
?>





