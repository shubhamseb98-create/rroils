<?php
require('inc/function.php');
$tblHomeExtraResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_home_extra"));
$tblHomeExtraquality = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_quality_content"));
$tblBread = mysqli_fetch_assoc(mysqli_query($conn,"SELECT brd_name,brd_image,metadesc FROM `tbl_breadcrumb` WHERE `brd_id` = '8'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php require 'inc/head.php'; ?>
   <link rel="stylesheet" href="css/swiper-bundle.min.css">
   <title><?= $tblBread['brd_name']; ?> | RR Oil Mill</title>
   <meta name="description" content="<?= $tblBread['metadesc']; ?>">
   
</head>

<body>
   <?php require 'inc/header.php'; ?>

   <!-- ===== Page Banner ===== -->
   <div class="sisf-banner position-relative">
      <div class="banner-img bread-height">
         <figure>
            <img src="<?= SITE_URL ?>uploads/breadcrumb/<?= $tblBread['brd_image']; ?>" alt="Quality Assurance">
         </figure>
      </div>
      <div class="sisf-page-title sisf-m sisf-title--standard sisf-alignment--center">
         <div class="sisf-m-inner container">
            <div class="sisf-breadcrumbs mb-2">
               <a class="sisf-breadcrumbs-link text-white" href="<?= SITE_URL ?>">
                  <span>Home</span>
               </a>
               <span class="sisf-breadcrumbs-separator text-white mx-2"><i class="fa-solid fa-chevron-right"></i></span>
               <span class="sisf-breadcrumbs-current text-white"><?= $tblBread['brd_name']; ?></span>
            </div>
            <div class="sisf-m-content sisf-content-grid">
               <h1 class="sisf-m-title text-white sis-text-anime-style-3 entry-title"><?= $tblBread['brd_name']; ?></h1>
            </div>
         </div>
      </div>
   </div>
   <!-- ===== Page Banner End ===== -->

   <!-- ============================================================
        SUCCESS REQUIRES QUALITY — tagline
   ============================================================ -->
<?php
$tblQualityAssurance = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `tbl_philosophy`"));
?>
   <section class="qa-tagline-section">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
               <span class="qa-section-label"><?= $tblQualityAssurance['subheading']; ?></span>
               <h2><?= $tblQualityAssurance['heading1']; ?> <em><?= $tblQualityAssurance['heading2']; ?></em> <?= $tblQualityAssurance['heading3']; ?></h2>
               <div class="qa-gold-bar"></div>
               <?= $tblQualityAssurance['content']; ?>
            </div>
         </div>
      </div>
   </section>

   <!-- ============================================================
        CERTIFIED & QUALITY-ASSURED — image + text (like reference)
   ============================================================ -->
   <?php
$tblQualityStandard = mysqli_query($conn,"Select * FROM `tbl_standards`");
if(mysqli_num_rows($tblQualityStandard) > 0){
   $rowQualityStandard = mysqli_fetch_assoc($tblQualityStandard);
   ?>
   <section class="qa-story-section">
      <div class="container">
         <div class="row align-items-center gy-5">

            <!-- Left: Image -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
               <div class="qa-story-img-wrap">
                  <img src="<?= SITE_URL ?>uploads/about/<?= $rowQualityStandard['image']; ?>" alt="Quality Control Lab"
                       onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                  <div class="qa-story-img-fallback" style="display:none;align-items:center;justify-content:center;width:100%;padding:80px;">
                     <i class="fa-solid fa-flask-vial"></i>
                  </div>
                  <div class="qa-story-badge">
                     <i class="fa-solid fa-shield-halved"></i> <?= $rowQualityStandard['tag']; ?>
                  </div>
               </div>
            </div>

            <!-- Right: Text -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
               <div class="qa-story-content">
                  <div class="sisf-sis-section-title sis-section-title">
                     <span class="about-label-box"><?= $rowQualityStandard['subheading']; ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3">
                        <?= $rowQualityStandard['heading1']; ?> &amp; <span class="sisf-e-colored"><?= $rowQualityStandard['heading2']; ?></span>
                     </h2>
                  </div>
                  <?= $rowQualityStandard['content']; ?>
                  <ul class="qa-checklist">
                  <?php
                  $manyTags = json_decode($rowQualityStandard['certifieds']);
                  foreach($manyTags as $m){
                  ?>
                     <li>
                        <div class="qa-check-icon"><i class="fa-solid fa-check"></i></div>
                        <span><?= $m ?></span>
                     </li>
                  <?php } ?>
                  </ul>
                  <a href="<?= SITE_URL ?>contact" class="qa-btn" id="qaStoryCtaBtn">
                     <i class="fa-solid fa-paper-plane"></i> Get In Touch
                  </a>
               </div>
            </div>

         </div>
      </div>
   </section>
<?php } ?>

   <?php
$tblQualityProcess = mysqli_query($conn,"Select * FROM `tbl_process` WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblQualityProcess) > 0){
   
   ?>
   <!-- ============================================================
        QC PROCESS — 4 numbered steps
   ============================================================ -->
   <section class="qa-process-section">
      <div class="container">
         <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="100">
               <span class="qa-section-label"><?= $tblHomeExtraquality['subheading']; ?></span>
               <h2 class="sisf-m-title sis-text-anime-style-3" style="margin-top:10px;">
                  <?= $tblHomeExtraquality['heading1']; ?> <span class="sisf-e-colored"><?= $tblHomeExtraquality['heading2']; ?></span>
               </h2>
               <p class="mt-3" style="color:var(--text-color,#666);font-size:1.05rem;line-height:1.85;">
                  <?= $tblHomeExtraquality['content']; ?>
               </p>
            </div>
         </div>
         <div class="row gy-5 justify-content-center">
<?php
$i=1;
while($rowQualityProcess = mysqli_fetch_assoc($tblQualityProcess)){
?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
               <div class="qa-process-card">
                  <div class="qa-step-num"><?= $i ?></div>
                  <div class="qa-process-icon"><img src="<?= SITE_URL ?>uploads/process/<?= $rowQualityProcess['icon'] ?>"></div>
                  <h5><?= $rowQualityProcess['title']; ?></h5>
                  <p><?= $rowQualityProcess['content']; ?></p>
               </div>
            </div>
<?php $i++; } ?>
         </div>
      </div>
   </section>

<?php } ?>
  
<?php
 $tblClient = mysqli_query($conn, "SELECT * FROM tbl_client WHERE status = '1' ORDER BY `sort`");
 if(mysqli_num_rows($tblClient) > 0) {
 ?>

   <section class="qa-cta-section">
     <div class="container">

         <!-- Heading -->

          <div class="row justify-content-center ">
            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="100">
               <span class="qa-section-label" style="color:#ffffff; background-color:transparent;"><?= $tblHomeExtraResult['acc_subheading'] ?? '' ?></span>
               <h2 class="sisf-m-title sis-text-anime-style-3" style="margin-top:10px;">
                  <?= $tblHomeExtraResult['acc_heading'] ?? '' ?>
               </h2>
               <p class="mt-3" style="color:#ffffff;font-size:1.05rem;line-height:1.85;">
                 <?= $tblHomeExtraResult['acc_content'] ?? '' ?>
               </p>
            </div>
         </div>
   

         <!-- Swiper Carousel Wrapper -->
         <div class="qa-swiper-nav-wrapper" data-aos="fade-up" data-aos-delay="150">
            <div class="swiper qa-cert-swiper">
               <div class="swiper-wrapper">
<?php
while($tblClientRow = mysqli_fetch_assoc($tblClient)) {
?>
                  <div class="swiper-slide">
                     <div class="qa-cert-logo">
                        <img src="<?= SITE_URL ?>uploads/client/<?= $tblClientRow['ach_image'] ?? '' ?>" alt="Certification 1">
                     </div>
                  </div>
<?php } ?>
               </div><!-- .swiper-wrapper -->
            </div><!-- .swiper -->
         </div>

      </div>
   </section>

<?php } ?>

<?php
$tblCommitment = mysqli_query($conn,"SELECT * FROM `tbl_commitment`");
if(mysqli_num_rows($tblCommitment) > 0){
$rowCommitment = mysqli_fetch_assoc($tblCommitment);
?>
   <!-- ============================================================
        QUALITY COMMITMENTS — What We Promise
   ============================================================ -->
   <section class="qa-promise-section">
      <div class="container">
         <div class="row gy-5 align-items-start">

            <!-- Left: Intro -->
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
               <div class="sisf-sis-section-title sis-section-title">
                  <span class="about-label-box"><?= $rowCommitment['subheading']; ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3">
                     <?= $rowCommitment['heading1']; ?> <span class="sisf-e-colored"><?= $rowCommitment['heading2']; ?></span>
                  </h2>
               </div>
               <p style="color:var(--text-color,#666);font-size:1.04rem;line-height:1.85;margin-top:14px;">
                 <?= $rowCommitment['content']; ?>
               </p>
               <a href="<?= SITE_URL ?>contact" class="qa-btn mt-4 d-inline-flex" id="qaPromiseCtaBtn">
                  <i class="fa-solid fa-headset"></i> Partner With Us
               </a>
            </div>

            <!-- Right: Promise List -->
            <div class="col-lg-8" data-aos="fade-left" data-aos-delay="150">
 <?php
 
 $tblstandards = mysqli_query($conn, "SELECT * FROM tbl_commit_standards WHERE status = '1' ORDER BY `sort`");
 if(mysqli_num_rows($tblstandards) > 0) {
   while($rowStandards = mysqli_fetch_assoc($tblstandards)){
 ?>
               <div class="qa-promise-item">
                  <div class="qa-promise-icon-box"><img src="<?= SITE_URL ?>uploads/process/<?= $rowStandards['icon']; ?>"> </div>
                  <div class="qa-promise-text">
                     <h5><?= $rowStandards['title']; ?></h5>
                     <p><?= $rowStandards['content']; ?></p>
                  </div>
               </div>
<?php } } ?>
            </div>

         </div>
      </div>
   </section>
<?php } ?>
   <!-- ============================================================
        CTA BANNER
   ============================================================ -->
   

   <?php require 'inc/footer.php'; ?>
   <?php require 'inc/footer-data.php'; ?>

   <!-- ============================================================
        SWIPER INIT — Certifications Carousel
   ============================================================ -->
   <script src="js/swiper-bundle.min.js"></script>
   <script>
      (function () {
         'use strict';

         var certSwiper = new Swiper('.qa-cert-swiper', {
            loop: true,
            loopedSlides: 6,
            slidesPerView: 2,
            spaceBetween: 20,
            autoplay: {
               delay: 0,
               disableOnInteraction: false
            },
            speed: 4000,
            breakpoints: {
               576: { slidesPerView: 2, spaceBetween: 20 },
               768: { slidesPerView: 3, spaceBetween: 30 },
               992: { slidesPerView: 5, spaceBetween: 40 }
            }
         });

      })();
   </script>

</body>
</html>
