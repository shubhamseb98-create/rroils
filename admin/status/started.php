<?php
require('../../inc/function.php');
$qs = $_REQUEST['id'] ?? 0;

$data = mysqli_query($conn, "SELECT `status` FROM `tbl_started_milestones` WHERE `id` = '$qs'");
if ($data && mysqli_num_rows($data) > 0) {
    $rec = mysqli_fetch_array($data);
    $newStatus = ($rec['status'] == 1) ? 0 : 1;
    mysqli_query($conn, "UPDATE `tbl_started_milestones` SET `status` = '$newStatus' WHERE `id` = '$qs'");
}
