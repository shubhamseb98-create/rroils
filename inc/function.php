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

// Auto-migrate tbl_contact columns if not present
$contactColCheck = mysqli_query($conn, "SHOW COLUMNS FROM `tbl_contact` LIKE 'con_address2'");
if (!$contactColCheck || mysqli_num_rows($contactColCheck) == 0) {
    mysqli_query($conn, "ALTER TABLE `tbl_contact` ADD COLUMN `con_address2` TEXT NULL AFTER `con_address`");
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
    $defaultSub = "From our founding roots in 2003 to India's trusted edible oil manufacturer today,\r\nour journey is built on purity, tradition, and uncompromising quality.";
    mysqli_query($conn, "INSERT INTO `tbl_started_header` (`id`, `title`, `subtitle`, `status`) VALUES
        (1, 'How We Started', '" . mysqli_real_escape_string($conn, $defaultSub) . "', 1)");
}

// Auto-create tbl_started_milestones if not exists
$milestoneTableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'tbl_started_milestones'");
if (!$milestoneTableCheck || mysqli_num_rows($milestoneTableCheck) == 0) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `tbl_started_milestones` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `year` varchar(50) NOT NULL,
        `title` varchar(255) NOT NULL DEFAULT '',
        `color` varchar(50) NOT NULL DEFAULT '#133827',
        `icon` varchar(100) NOT NULL DEFAULT 'fa-solid fa-industry',
        `desc` text NOT NULL,
        `sort` int(11) NOT NULL DEFAULT 0,
        `status` tinyint(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
} else {
    // Ensure title column exists
    $titleColCheck = mysqli_query($conn, "SHOW COLUMNS FROM `tbl_started_milestones` LIKE 'title'");
    if (!$titleColCheck || mysqli_num_rows($titleColCheck) == 0) {
        mysqli_query($conn, "ALTER TABLE `tbl_started_milestones` ADD COLUMN `title` VARCHAR(255) NOT NULL DEFAULT '' AFTER `year`");
    }
}

// Check if milestones need migration to 2003+ Oil Mill data (if empty or contains old 1970 / dal mill seed data)
$checkOldSeed = mysqli_query($conn, "SELECT id FROM `tbl_started_milestones` WHERE `year` = '1970' OR `desc` LIKE '%pulses%' OR `desc` LIKE '%Dal Mill%' OR `desc` LIKE '%AgroPure%' LIMIT 1");
$countMilestones = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `tbl_started_milestones`"))[0] ?? 0;

if ($countMilestones == 0 || ($checkOldSeed && mysqli_num_rows($checkOldSeed) > 0)) {
    mysqli_query($conn, "TRUNCATE TABLE `tbl_started_milestones`");

    $oilMilestones = [
        ['2003', 'Foundation', '#133827', 'fa-solid fa-seedling', 'Laid the foundation for our Cotton Ginning & Cotton Seed Processing business.', 1],
        ['2005', 'Regional Expansion', '#2e7d32', 'fa-solid fa-map-location-dot', 'Expanded operations and strengthened our presence across Northern & Western India.', 2],
        ['2009', 'Diversification', '#558b2f', 'fa-solid fa-oil-well', 'Expanded into Kachi Ghani Mustard Oil (KGMO) manufacturing along with Mustard Cake production.', 3],
        ['2013', 'Brand Launch', '#c67c00', 'fa-solid fa-sun', 'Launched Mustard Cake under the “Sunstar” brand, marking our entry into branded products.', 4],
        ['2014', 'Consumer Retail', '#d85a00', 'fa-solid fa-bottle-droplet', 'Introduced Sunstar consumer retail packs in PET bottles, strengthening our presence in the retail market.', 5],
        ['2015', 'Food Safety & Quality', '#b71c1c', 'fa-solid fa-award', 'Achieved FSSAI food safety and quality certifications, reinforcing our commitment to quality and compliance.', 6],
        ['2017', 'Automated Packaging', '#e65100', 'fa-solid fa-boxes-packing', 'Commissioned automated multi-format packaging lines for tins, bottles, pouches and jars.', 7],
        ['2017', 'Private Labelling Venture', '#8d6e3f', 'fa-solid fa-tags', 'Started a dedicated KGMO private-labeling business, expanding our B2B capabilities.', 8],
        ['2019', 'B2B & Co-Packing Expansion', '#1b5e20', 'fa-solid fa-handshake', 'Expanded our B2B private-label and co-packing services with leading national brands.', 9],
        ['2020', 'Quality Assurance', '#00695c', 'fa-solid fa-flask-vial', 'Commissioned an in-house high-tech laboratory to strengthen quality control and ensure stringent zero-adulteration standards.', 10],
        ['2021', 'New Manufacturing Facility', '#133827', 'fa-solid fa-industry', 'Established a modern manufacturing facility at Agro Food Park, MIA, Alwar, Rajasthan, further enhancing our production capabilities.', 11],
        ['2022', 'Next-Generation Leadership', '#2e6b34', 'fa-solid fa-users-gear', 'The next generation of corporate leadership joined the business, driving modern manufacturing practices, digital systems and future growth.', 12],
        ['2024', 'Strategic B2B Expansion', '#ef6c00', 'fa-solid fa-briefcase', 'Expanded our B2B private-labeling business by onboarding new partners at our Alwar facility.', 13],
        ['2025+', 'Accelerating Growth', '#133827', 'fa-solid fa-chart-line', 'Rapidly expanding crushing capacity with the development of a third manufacturing unit in Alwar, supported by a trusted pan-India distribution network.', 14]
    ];

    foreach ($oilMilestones as $m) {
        $y = mysqli_real_escape_string($conn, $m[0]);
        $t = mysqli_real_escape_string($conn, $m[1]);
        $c = mysqli_real_escape_string($conn, $m[2]);
        $ic = mysqli_real_escape_string($conn, $m[3]);
        $d = mysqli_real_escape_string($conn, $m[4]);
        $s = (int)$m[5];
        mysqli_query($conn, "INSERT INTO `tbl_started_milestones` (`year`, `title`, `color`, `icon`, `desc`, `sort`, `status`) VALUES ('$y', '$t', '$c', '$ic', '$d', $s, 1)");
    }

    // Update Header subtitle to oil mill text starting in 2003
    $newSub = "From our founding roots in 2003 to India's trusted edible oil manufacturer today,\r\nour journey is built on purity, tradition, and uncompromising quality.";
    mysqli_query($conn, "UPDATE `tbl_started_header` SET `title` = 'How We Started', `subtitle` = '" . mysqli_real_escape_string($conn, $newSub) . "' WHERE `id` = 1");
}

$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_contact` WHERE `con_id`='1'"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE `pro_id`='1'"));