<?php
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    @mkdir($sessionPath, 0755, true);
}
session_save_path($sessionPath);
session_start();

//  session_start();
if($_SERVER['SERVER_NAME']=="localhost")
{
    
$hostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="rroils";
@define('SITE_NAME', 'RROils');
@define('SITE_URL', 'http://localhost/rr-live-website-work/');
}
elseif (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'seotycoons.in') !== false)
{
$hostname = "localhost";
$dbusername = "seotycoo_rruser";
$dbpassword = 'D4W0tu+~y]%B';
$dbname="seotycoo_rroilsnew";
@define('SITE_NAME', 'RROils');
@define('SITE_URL', 'https://seotycoons.in/rroil/');
@define('SITE_EMAIL', 'rroils@gmail.com');
}
else
{
$hostname = "localhost";
$dbusername = "rroils_user";
$dbpassword = "tGAn&1+)ja[I";
$dbname="rroils_db";
@define('SITE_NAME', 'RROils');
@define('SITE_URL', 'https://rroils.com/');
@define('SITE_EMAIL', 'rroils@gmail.com');
}

$conn = mysqli_connect($hostname, $dbusername, $dbpassword,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$bannerTableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tbl_banner'");
if ($bannerTableCheck && mysqli_num_rows($bannerTableCheck) > 0) {
    $bannerColumnNames = [];
    $bannerColumnsResult = mysqli_query($conn, "SHOW COLUMNS FROM `tbl_banner`");
    while ($bannerColumn = mysqli_fetch_assoc($bannerColumnsResult)) {
        $bannerColumnNames[] = $bannerColumn['Field'];
    }

    if (!in_array('bnr_type', $bannerColumnNames, true)) {
        mysqli_query($conn, "ALTER TABLE `tbl_banner` ADD COLUMN `bnr_type` ENUM('image','video') NOT NULL DEFAULT 'image'");
    }

    if (!in_array('bnr_video', $bannerColumnNames, true)) {
        mysqli_query($conn, "ALTER TABLE `tbl_banner` ADD COLUMN `bnr_video` VARCHAR(255) NOT NULL DEFAULT ''");
    }
}

$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_contact` WHERE `con_id`='1'"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE `pro_id`='1'"));