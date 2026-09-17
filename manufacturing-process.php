<?php 

require('inc/function.php');
$manufacturingExtra = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_manufacturing_text"));
$tblBread = mysqli_fetch_assoc(mysqli_query($conn,"SELECT brd_name,brd_image,metadesc FROM `tbl_breadcrumb` WHERE `brd_id` = '3'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php require 'inc/head.php'; ?>
   <title><?= $tblBread['brd_name'] ?> | RR Oil Mill</title>
   <meta name="description" content="<?= $tblBread['metadesc'] ?>">
   
</head>

<body>
   <?php require 'inc/header.php'; ?>

   <!-- ===== Page Banner ===== -->
   <div class="sisf-banner position-relative">
      <div class="banner-img bread-height">
         <figure>
            <img src="<?= SITE_URL ?>uploads/breadcrumb/<?= $tblBread['brd_image']; ?>" alt="Manufacturing Process">
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

<?php 
$tblManufacturingResult = mysqli_query($conn, "SELECT * FROM tbl_manufacturing_content");
if(mysqli_num_rows($tblManufacturingResult) > 0){
   $manufacturing = mysqli_fetch_assoc($tblManufacturingResult);
?>
   <!-- ===== Intro Section ===== -->
   <section class="pl-intro-section py-5">
      <div class="container mt-4">
         <div class="row justify-content-center">
            <div class="col-lg-10 text-center" data-aos="fade-up" data-aos-delay="100">
               <div class="sisf-sis-section-title sis-section-title mb-4">
                  <span class="about-label-box"><?= $manufacturing['subheading']; ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3"><?= $manufacturing['heading1']; ?> <span class="sisf-e-colored"><?= $manufacturing['heading2']; ?></span></h2>
               </div>
               <?= $manufacturing['content']; ?>
            </div>
         </div>
      </div>
   </section>
   <!-- ===== Intro Section End ===== -->
<?php } ?>

   <!-- ===== Steps Section ===== -->
<?php 
$tblManufacturingProcess = mysqli_query($conn, "SELECT * FROM tbl_manufacturing_process WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblManufacturingProcess) > 0){
?>
   <section class="pl-steps-section pb-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-11">
<?php
$i=1; $j=1;
while($rowManufacturingProcess = mysqli_fetch_assoc($tblManufacturingProcess)){
?>
<?php 
if($i % 2 != 0){
?>
               <!-- Step Odd -->
               <div class="pl-step-item" data-aos="fade-up" data-aos-delay="100">
                  <div class="pl-step-thumb">
                     <img src="<?= SITE_URL ?>uploads/manufacturing_process/<?= $rowManufacturingProcess['image'] ?>" alt="<?= htmlspecialchars($rowManufacturingProcess['title']) ?>">
                  </div>
                  <div class="pl-step-content">
                     <div class="pl-step-header">
                        <div class="pl-step-number"><?= $j ?></div>
                        <h4><?= $rowManufacturingProcess['title'] ?></h4>
                     </div>
                     <p class="text-muted" style="font-size: 1.05rem;">
                        <?= strip_tags($rowManufacturingProcess['content']); ?>
                     </p>
                  </div>
               </div>
<?php } else { ?>
               <!-- Step Even -->
               <div class="pl-step-item reverse" data-aos="fade-up" data-aos-delay="150">
                  <div class="pl-step-thumb">
                     <img src="<?= SITE_URL ?>uploads/manufacturing_process/<?= $rowManufacturingProcess['image'] ?>" alt="<?= htmlspecialchars($rowManufacturingProcess['title']) ?>">
                  </div>
                  <div class="pl-step-content">
                     <div class="pl-step-header">
                        <div class="pl-step-number"><?= $j ?></div>
                        <h4><?= $rowManufacturingProcess['title'] ?></h4>
                     </div>
                     <p class="text-muted" style="font-size: 1.05rem;">
                        <?= strip_tags($rowManufacturingProcess['content']); ?>
                     </p>
                  </div>
               </div>
<?php } ?>
<?php $i++; $j++; } // end while ?>
            </div>
         </div>
      </div>
   </section>
<?php } ?>
   <!-- ===== Steps Section End ===== -->


   <!-- ===== YouTube Video Section ===== -->
   <section class="pl-youtube-section py-5 overflow-hidden" style="background-color: #f8f9fa;">
      <div class="container py-4">
         <div class="row justify-content-center mb-4">
             <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="100">
               <div class="sisf-sis-section-title sis-section-title mb-0">
                  <span class="about-label-box"><?= $manufacturingExtra['subheading'] ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3"><?= $manufacturingExtra['heading1'] ?> <span class="sisf-e-colored"><?= $manufacturingExtra['heading2'] ?></span></h2>
               </div>
            </div>
         </div>
         <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 sis-comman-swiper-slider">
               <!-- Swiper -->
               <div class="swiper">
                  <div class="swiper-wrapper pb-5">
                     
<?php
$tblYoutubeVideo = mysqli_query($conn, "SELECT * FROM tbl_youtubevideo WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblYoutubeVideo) > 0){
   while($rowYoutubeVideo = mysqli_fetch_assoc($tblYoutubeVideo)){
?>
                     <!-- Slide 1 -->
                     <div class="swiper-slide">
                        <div class="video-wrapper swiper-no-swiping rounded-4 overflow-hidden shadow-sm position-relative" style="background: #000; border: 2px solid #fff; height: 350px;">
                           <iframe class="w-100 h-100" src="https://www.youtube.com/embed/<?= $rowYoutubeVideo['video']; ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>
<?php } } ?>
                  </div>
                  <!-- Add Pagination & Navigation -->
                  <style>
                     .custom-video-nav .swiper-button-next,
                     .custom-video-nav .swiper-button-prev {
                        width: 45px;
                        height: 45px;
                        border-radius: 50%;
                        background-color: var(--main-color);
                        color: #fff;
                        position: static;
                        margin-top: 0;
                     }
                     .custom-video-nav .swiper-button-next::after,
                     .custom-video-nav .swiper-button-prev::after {
                        font-size: 18px;
                        font-weight: bold;
                     }
                  </style>
                  <div class="d-flex justify-content-center align-items-center mt-4 position-relative custom-video-nav" style="gap: 15px;">
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-pagination position-static w-auto mx-3 mt-0"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ===== YouTube Video Section End ===== -->

   <!-- ===== CTA Section ===== -->
   <section class="py-5" style="background-color: rgba(252, 183, 0, 0.05);">
      <div class="container py-4">
         <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0 text-center text-lg-start" data-aos="fade-right">
               <h3 class="mb-2"><?= $manufacturingExtra['b_heading'] ?></h3>
               <p class="text-muted mb-0"><?= $manufacturingExtra['b_content'] ?></p>
            </div>
            <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
               <a href="<?= SITE_URL ?>contact" class="sis-btn-default sisf-e-radius d-inline-flex justify-content-center align-items-center" style="background-color: var(--main-color); color: white; padding: 12px 30px; border-radius: 8px;">
                  Contact Us Today <i class="fa-solid fa-arrow-right ms-2"></i>
               </a>
            </div>
         </div>
      </div>
   </section>
   <!-- ===== CTA Section End ===== -->

   <?php require 'inc/footer.php'; ?>
   <?php require 'inc/footer-data.php'; ?>

</body>
</html>
