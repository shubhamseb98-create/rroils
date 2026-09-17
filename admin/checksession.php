<?php
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    @mkdir($sessionPath, 0755, true);
}
session_save_path($sessionPath);
session_start();

if(!isset($_SESSION['admin_ses']) || $_SESSION['admin_ses'] != "hvrs@#p9w84r".session_id())
{
  header("location:login.php");
  exit;
}
?>