<?php

require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_youtubevideo where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);

$data=mysqli_query($conn,"DELETE FROM `tbl_youtubevideo` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Record Deleted successfully";
	header("location:../manage-youtube-video.php");
}

?>





