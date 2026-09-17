<?php
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    @mkdir($sessionPath, 0755, true);
}
session_save_path($sessionPath);
session_start();

//  session_start();
if (($_SERVER['SERVER_NAME'] ?? '') == "localhost" || php_sapi_name() === 'cli')
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

// Auto-create tbl_started_header if not exists
$headerTableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tbl_started_header'");
if (!$headerTableCheck || mysqli_num_rows($headerTableCheck) == 0) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `tbl_started_header` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL DEFAULT 'How We Started',
        `subtitle` text NOT NULL,
        `status` tinyint(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    mysqli_query($conn, "INSERT INTO `tbl_started_header` (`id`, `title`, `subtitle`, `status`) VALUES
        (1, 'How We Started', 'From humble beginnings in 1970 to a global presence today,\\r\\nour journey is built on trust, quality and perseverance.', 1)");
}

// Auto-create tbl_started_milestones if not exists
$milestoneTableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tbl_started_milestones'");
if (!$milestoneTableCheck || mysqli_num_rows($milestoneTableCheck) == 0) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `tbl_started_milestones` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `year` varchar(50) NOT NULL,
        `color` varchar(50) NOT NULL DEFAULT '#2e7d32',
        `icon` varchar(100) NOT NULL DEFAULT 'fa-solid fa-industry',
        `desc` text NOT NULL,
        `sort` int(11) NOT NULL DEFAULT 0,
        `status` tinyint(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $initialMilestones = [
        ['1970', '#2e7d32', 'fa-solid fa-scissors', 'Established pulses processing business', 1],
        ['1981', '#2e6b34', 'fa-solid fa-industry', 'Set up a Chana Dal Mill in Delhi', 2],
        ['2001', '#c62828', 'fa-solid fa-rocket', 'AgroPure entered the market by launching Besan and Chana Dal', 3],
        ['2004', '#a06535', 'fa-solid fa-industry', 'Set up Masoor Dal Mill in Delhi', 4],
        ['2007', '#e64a19', 'fa-solid fa-industry', 'Set up Urad Mill in Delhi', 5],
        ['2012', '#f57c00', 'fa-solid fa-boxes-packing', 'Set up multiple packaging units in Delhi', 6],
        ['2014', '#d84315', 'fa-solid fa-industry', 'Set up Moong Dal Mill in Sonipat', 7],
        ['2015', '#9e6d38', 'fa-solid fa-robot', 'Set up a fully automated packing unit in Sonipat', 8],
        ['2017', '#f4511e', 'fa-solid fa-award', 'FSSC certification and Promising Brand Award', 9],
        ['2021', '#b71c1c', 'fa-solid fa-industry', 'Set up Toor Dal Mill in Sonipat', 10],
        ['2023', '#8d6e3f', 'fa-solid fa-industry', 'Set up Masoor Dal Mill at Mundra, Gujarat', 11],
        ['2024+', '#2e7d32', 'fa-solid fa-indian-rupee-sign', 'Group turnover crossed ₹3,000 Cr. (360 Million USD)', 12]
    ];

    foreach ($initialMilestones as $m) {
        $y = mysqli_real_escape_string($conn, $m[0]);
        $c = mysqli_real_escape_string($conn, $m[1]);
        $ic = mysqli_real_escape_string($conn, $m[2]);
        $d = mysqli_real_escape_string($conn, $m[3]);
        $s = (int)$m[4];
        mysqli_query($conn, "INSERT INTO `tbl_started_milestones` (`year`, `color`, `icon`, `desc`, `sort`, `status`) VALUES ('$y', '$c', '$ic', '$d', $s, 1)");
    }
}

$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_contact` WHERE `con_id`='1'"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE `pro_id`='1'"));