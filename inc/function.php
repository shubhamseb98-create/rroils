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
// Live setup subfolder: https://rroils.com/move/
$isMoveFolder = (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/move') !== false) || (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], '/move') !== false);
@define('SITE_URL', $isMoveFolder ? 'https://rroils.com/move/' : 'https://rroils.com/move/');
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
    $defaultSub = "From our founding roots in 1970 to India's trusted edible oil manufacturer today,\\r\\nour journey is built on purity, tradition, and uncompromising quality.";
    mysqli_query($conn, "INSERT INTO `tbl_started_header` (`id`, `title`, `subtitle`, `status`) VALUES
        (1, 'How We Started', '$defaultSub', 1)");
}

// Auto-create tbl_started_milestones if not exists
$milestoneTableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tbl_started_milestones'");
if (!$milestoneTableCheck || mysqli_num_rows($milestoneTableCheck) == 0) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `tbl_started_milestones` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `year` varchar(50) NOT NULL,
        `color` varchar(50) NOT NULL DEFAULT '#133827',
        `icon` varchar(100) NOT NULL DEFAULT 'fa-solid fa-industry',
        `desc` text NOT NULL,
        `sort` int(11) NOT NULL DEFAULT 0,
        `status` tinyint(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

// Check if milestones need migration to Oil Mill data (if empty or contains old dal mill seed data)
$checkOldSeed = mysqli_query($conn, "SELECT id FROM `tbl_started_milestones` WHERE `desc` LIKE '%pulses%' OR `desc` LIKE '%Dal Mill%' OR `desc` LIKE '%AgroPure%' LIMIT 1");
$countMilestones = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `tbl_started_milestones`"))[0] ?? 0;

if ($countMilestones == 0 || ($checkOldSeed && mysqli_num_rows($checkOldSeed) > 0)) {
    mysqli_query($conn, "TRUNCATE TABLE `tbl_started_milestones`");

    $oilMilestones = [
        ['1970', '#133827', 'fa-solid fa-seedling', 'Foundations laid by Late Shri Ramniwas Ji Agarwal with a vision for pure edible oils', 1],
        ['1985', '#2e7d32', 'fa-solid fa-industry', 'First traditional cold-press (Kachi Ghani) oil extraction mill established in Rajasthan', 2],
        ['1998', '#558b2f', 'fa-solid fa-tractor', "Built direct procurement network across Rajasthan's finest mustard farming belts", 3],
        ['2005', '#8d6e3f', 'fa-solid fa-filter', 'Introduced multi-stage double filtration system to preserve natural pungency & aroma', 4],
        ['2010', '#c67c00', 'fa-solid fa-bottle-droplet', 'Launched consumer retail packs in pouches and premium PET bottles', 5],
        ['2015', '#d85a00', 'fa-solid fa-boxes-packing', 'Commissioned automated multi-format tin, bottle, and jar packaging lines', 6],
        ['2018', '#b71c1c', 'fa-solid fa-award', 'Accredited with Agmark Grade-1 & FSSAI food safety quality certifications', 7],
        ['2020', '#133827', 'fa-solid fa-building', 'Set up modern manufacturing facility at Agro Food Park, MIA Alwar, Rajasthan', 8],
        ['2021', '#2e6b34', 'fa-solid fa-users-gear', 'Next-gen corporate leadership joined to drive modern manufacturing & digital systems', 9],
        ['2022', '#a06535', 'fa-solid fa-flask-vial', 'Commissioned in-house high-tech laboratory for zero-adulteration quality assurance', 10],
        ['2023', '#e65100', 'fa-solid fa-handshake', 'Expanded B2B private labelling & co-packing services for premier national brands', 11],
        ['2024+', '#133827', 'fa-solid fa-chart-line', 'Rapidly expanding crushing capacity with a trusted pan-India distribution network', 12]
    ];

    foreach ($oilMilestones as $m) {
        $y = mysqli_real_escape_string($conn, $m[0]);
        $c = mysqli_real_escape_string($conn, $m[1]);
        $ic = mysqli_real_escape_string($conn, $m[2]);
        $d = mysqli_real_escape_string($conn, $m[3]);
        $s = (int)$m[4];
        mysqli_query($conn, "INSERT INTO `tbl_started_milestones` (`year`, `color`, `icon`, `desc`, `sort`, `status`) VALUES ('$y', '$c', '$ic', '$d', $s, 1)");
    }

    // Update Header subtitle to oil mill text
    $newSub = "From our founding roots in 1970 to India's trusted edible oil manufacturer today,\r\nour journey is built on purity, tradition, and uncompromising quality.";
    mysqli_query($conn, "UPDATE `tbl_started_header` SET `title` = 'How We Started', `subtitle` = '" . mysqli_real_escape_string($conn, $newSub) . "' WHERE `id` = 1");
}

$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_contact` WHERE `con_id`='1'"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE `pro_id`='1'"));