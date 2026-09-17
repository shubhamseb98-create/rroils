<?php
require('../../inc/function.php');
$b = $_REQUEST['bid'] ?? 0;

$data = mysqli_query($conn, "DELETE FROM `tbl_started_milestones` WHERE `id` = '$b'");
if ($data) {
    $_SESSION['warning'] = "Record Deleted successfully";
} else {
    $_SESSION['error'] = "Failed to delete record";
}
header("location:../manage-started.php");
exit;
