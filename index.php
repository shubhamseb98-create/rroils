<?php
require 'inc/function.php';
$tblHomeExtraResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_home_extra"));

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <?php require 'inc/head.php'; ?>
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
   </head>
   <body>
    <?php require 'inc/header.php'; ?>
      <!-- main-banner end -->
 <?php
 $heroBanner = null;
 $heroBannerResult = mysqli_query($conn, "SELECT * FROM tbl_banner WHERE bnr_status='1' ORDER BY bnr_sort DESC, bnr_id DESC LIMIT 1");
 if ($heroBannerResult && mysqli_num_rows($heroBannerResult) > 0) {
     $heroBanner = mysqli_fetch_assoc($heroBannerResult);
 }
 $heroSubtitle = !empty($heroBanner['bnr_subtitle']) ? $heroBanner['bnr_subtitle'] : 'Renewable Energy Solutions';
 $heroTitle = !empty($heroBanner['bnr_title']) ? $heroBanner['bnr_title'] : 'One cold press.<br> A thousand labels.';
 $heroDescription = !empty($heroBanner['bnr_desc']) ? $heroBanner['bnr_desc'] : '';
 $heroImage = !empty($heroBanner['bnr_image']) ? 'uploads/banner/' . $heroBanner['bnr_image'] : '';
 $heroVideo = !empty($heroBanner['bnr_video']) ? 'uploads/banner/' . $heroBanner['bnr_video'] : '';
 ?>
 <!-- Hero Section Start -->
         <div class="sis-hero hero-slider sis-video-page sisf--hero-video">
            <div class="hero-slider-layout position-relative">
               <div class="hero-swiper">
                  <div class="hero-slide sis-hero-video align-items-end">
                     <?php if ($heroBanner && $heroBanner['bnr_type'] == 'video' && !empty($heroVideo)) { ?>
                     <div class="sis-hero-bg-video">
                        <video autoplay="" muted="" loop="" id="myVideo">
                           <source src="<?= $heroVideo; ?>" type="video/mp4">
                        </video>
                     </div>
                     <?php } elseif ($heroBanner && $heroBanner['bnr_type'] == 'image' && !empty($heroImage)) { ?>
                     <div class="sis-hero-bg-video" style="background-image:url('<?= $heroImage; ?>'); background-size:cover; background-position:center;"></div>
                     <?php } else { ?>
                     <div class="sis-hero-bg-video">
                        <video autoplay="" muted="" loop="" id="myVideo">
                           <source src="images/rroilnewone.mp4" type="video/mp4">
                        </video>
                     </div>
                     <?php } ?>
                     <!-- Content Start -->
                     <div class="container content-align">
                        <div class="row align-items-end">
                           <div class="col-lg-12 ms-auto me-auto">
                             
                              <!-- Hero Content Start -->
                              <div class="hero-content px-0 text-center">
                                 <!-- Hero Title Start -->
                                 <div class="sis-section-title mb-0">
                                    <span class="sisf-subtitle sisf--subtitle text-white sis-text-anime-style-3"><?= htmlspecialchars($heroSubtitle); ?></span>
                                    <h1 class="text-white sis-text-anime-style-3" data-cursor="-opaque"><?= nl2br(htmlspecialchars($heroTitle)); ?></h1>
                                    <?php if (!empty($heroDescription)) { ?><p class="text-white mt-3" style="font-size:1.05rem;line-height:1.85;"><?= strip_tags($heroDescription); ?></p><?php } ?>
                                 </div>
                                 <!-- Hero Title End -->
                              </div>
                              <!-- Hero Content End -->
                           </div>
                        </div>
                     </div>
                     <!-- Content End -->
                  </div>
               </div>
            </div>
         </div>
         <!-- Hero Section End -->
 

 <?php
 
 $tblHomeAboutResult = mysqli_query($conn, "SELECT * FROM tbl_home_about WHERE id='2' LIMIT 1");
 if(mysqli_num_rows($tblHomeAboutResult) > 0) {
     $tblHomeAbout = mysqli_fetch_assoc($tblHomeAboutResult);

 ?>

       <!-- About Us Section Start -->
      <div class="sis-about-us-section sis-comman-background section">
         <div class="container">
               
            <div class="row gy-4">
               <div class="col-lg-6">
                
                 <div class="sisf-sis-section-title sis-section-title">
                   <span class="about-label-box"><?= $tblHomeAbout['heading'] ?? '' ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"> <?= $tblHomeAbout['subheading'] ?? '' ?> </h2>
                     <div class="sisf-m-text">
                        <?= $tblHomeAbout['content'] ?? '' ?>
                     </div>
                  </div>

                  <!-- Button -->
                  <div class="pt-2" >
                     <a href="<?= SITE_URL ?>about" class="about-btn-know-more">
                        <span class="about-btn-text">KNOW MORE</span>
                        <span class="about-btn-icon"><i class="fa-solid fa-arrow-right"></i></span>
                     </a>  
                  </div>
               </div>
               <div class="col-lg-6 align-items-center d-flex">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="sisf-about-left-image position-relative">
                           <figure class="sis-image-anime sis-reveal mb-3 sis-radius about-height">
                              <img src="<?= SITE_URL ?>uploads/choose/<?= $tblHomeAbout['image'] ?? '' ?>" class="img-fluid w-100" alt="Oilix">
                           </figure>
                        
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
        
       
      </div>
      <!-- About Us Section End -->
<?php } ?>

 <?php
 
 $tblClient = mysqli_query($conn, "SELECT ach_image FROM tbl_client WHERE status = '1' ORDER BY `sort`");
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

      </div>

<?php
$tblHowWork = mysqli_query($conn, "SELECT * FROM `tbl_howwork` WHERE id='1' LIMIT 1");
if(mysqli_num_rows($tblHowWork) > 0) {
    $howWork = mysqli_fetch_assoc($tblHowWork);
?>
      <!-- About Us Section Start -->
      <div class="sis-about-us-section position-relative section pattern-bg-section">
        
         <div class="container"> 
            <div class="row justify-content-center align-items-center">
               <div class="col-md-7">
                 <div class="sisf-sis-section-title text-center sis-section-title">
                     <span class="sisf-m-subtitle white sis-text-anime-style-3"><?= $tblHomeExtraResult['work_heading'] ?? '' ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"><?= $howWork['heading1']; ?><br> <span class="sisf--e-colored"> <?= $howWork['heading2']; ?></span> </h2>
                     <div class="sisf-m-text w-70" data-aos="fade-up" data-aos-delay="100">
                        <?= $howWork['content']; ?>
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="row">
               <div class="col-lg-5">
                  <div class="sisf-about-image-left">
                     <figure class="sis-image-anime sis-radius">
                        <img src="<?= SITE_URL ?>uploads/works/<?= $howWork['image']; ?>" class="w-100" alt="Oilix">
                     </figure>
                  </div>
               </div>
               <div class="col-lg-7">
                  <div class="sisf-e-page-hover-contents sisf-about-contents sisf-sis-bottom-border pb-4" data-aos="fade-left" data-aos-delay="100">
                     <div class="sis-e-inner">
                        <div class="d-flex gap-4">
                           <div class="sisf-m-icon">
                              <figure class="d-flex align-items-center justify-content-center w-100 h-100">
                                 <img src="<?= SITE_URL ?>uploads/works/<?= $howWork['icon1']; ?>" class="img-fluid" alt="Icon 1">
                              </figure>
                           </div>
                           <div class="sisf-m-contents">
                              <div class="sis-e-title mb-2">
                                 <h3><?= $howWork['i_heading1']; ?></h3>
                              </div>
                              <div class="sis-e-text">
                                 <p class="mb-0"><?= $howWork['i_text1']; ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="sisf-e-page-hover-contents sisf-about-contents sisf-sis-bottom-border pb-4" data-aos="fade-left" data-aos-delay="300">
                     <div class="sis-e-inner">
                        <div class="d-flex gap-4">
                           <div class="sisf-m-icon">
                              <figure class="d-flex align-items-center justify-content-center w-100 h-100">
                                 <img src="<?= SITE_URL ?>uploads/works/<?= $howWork['icon2']; ?>" class="img-fluid" alt="Icon 2">
                              </figure>
                           </div>
                           <div class="sisf-m-contents">
                              <div class="sis-e-title mb-2">
                                 <h3><?= $howWork['i_heading2']; ?></h3>
                              </div>
                              <div class="sis-e-text">
                                 <p class="mb-0"><?= $howWork['i_text2']; ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="sisf-e-page-hover-contents sisf-about-contents" data-aos="fade-left" data-aos-delay="500">
                     <div class="sis-e-inner">
                        <div class="d-flex gap-4">
                           <div class="sisf-m-icon">
                              <figure class="d-flex align-items-center justify-content-center w-100 h-100">
                                 <img src="<?= SITE_URL ?>uploads/works/<?= $howWork['icon3']; ?>" class="img-fluid" alt="Icon 3">
                              </figure>
                           </div>
                           <div class="sisf-m-contents">
                              <div class="sis-e-title mb-2">
                                 <h3><?= $howWork['i_heading3']; ?></h3>
                              </div>
                              <div class="sis-e-text">
                                 <p class="mb-0"><?= $howWork['i_text3']; ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="sisf-m-button pt-4" data-aos="fade-left" data-aos-delay="700" data-aos-duration="1200">
                     <a href="<?= SITE_URL ?>about" class="sis-btn-default sisf--btn-default">Learn More About us <i
                        class="fa-solid fa-arrow-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- About Us Section End -->
<?php } ?>

<?php
$tblManufacturingCTA = mysqli_query($conn, "SELECT * FROM tbl_manufaturing WHERE id='1' LIMIT 1");
if(mysqli_num_rows($tblManufacturingCTA) > 0){
   
    $manufacturingCTA = mysqli_fetch_assoc($tblManufacturingCTA);
?>
      <!-- How we work Section Start -->
<div class="sis-how-we-section sisf--comman-bg-light section">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-7 col-12">
                  <!-- Setion Title Start -->
                  <div class="sisf-sis-section-title text-center sis-section-title">
                     <span class="sisf-m-subtitle white sis-text-anime-style-3"><?= $tblHomeExtraResult['manufac_subheading'] ?? '' ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"> <?= $manufacturingCTA['heading1']; ?> <br> <span class="sisf--e-colored"> <?= $manufacturingCTA['heading2']; ?></span> </h2>
                     <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <?= $manufacturingCTA['content']; ?>
                     </div>
                  </div>
                  <!-- Setion Title End -->
               </div>
            </div>
            <div class="row">
                <div class="col-lg-5 d-flex align-items-center">
                  <div class="sisf-about-image-left">
                     <figure class="sis-image-anime sis-radius">
                        <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['image']; ?>" class="w-100" alt="Oilix">
                     </figure>
                  </div>
               </div>   
               <div class="col-lg-6">
                  <div class="sisf-e-detail--page-content sisf-e-how-item" data-aos="fade-up" data-aos-delay="100">
                     <div class="sisf-e-inner d-flex position-relative gap-4">
                        <!-- Icon Start -->
                        <div class="sisf-how-icon-image">
                           <figure>
                              <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['icon1']; ?>" alt="Oilix">
                           </figure>
                        </div>
                        <!-- Icon End -->
                        <!-- Content Start -->
                        <div class="sisf-e-content">
                           <div class="sisf-sis-e-title mb-2">
                              <h3 class="sisf-e-title">
                                <?= $manufacturingCTA['i_heading1']; ?>
                              </h3>
                           </div>
                           <div class="sisf-sis-description">
                              <p class="mb-0"><?= $manufacturingCTA['i_text1']; ?></p>
                           </div>
                        </div>
                        <!-- Content End -->
                     </div>
                  </div>
                  <div class="sisf-e-detail--page-content sisf-e-how-item" data-aos="fade-up" data-aos-delay="300">
                     <div class="sisf-e-inner d-flex position-relative gap-4">
                        <!-- Icon Start -->
                        <div class="sisf-how-icon-image">
                           <figure>
                              <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['icon2']; ?>" alt="Oilix">
                           </figure>
                        </div>
                        <!-- Icon End -->
                        <!-- Content Start -->
                        <div class="sisf-e-content">
                           <div class="sisf-sis-e-title mb-2">
                              <h3 class="sisf-e-title">
                                 <?= $manufacturingCTA['i_heading2']; ?>
                              </h3>
                           </div>
                           <div class="sisf-sis-description">
                              <p class="mb-0"><?= $manufacturingCTA['i_text2']; ?></p>
                           </div>
                        </div>
                        <!-- Content End -->
                     </div>
                  </div>
                  <div class="sisf-e-detail--page-content sisf-e-how-item" data-aos="fade-up" data-aos-delay="500">
                     <div class="sisf-e-inner d-flex position-relative gap-4">
                        <!-- Icon Start -->
                        <div class="sisf-how-icon-image">
                           <figure>
                              <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['icon3']; ?>" alt="Oilix">
                           </figure>
                        </div>
                        <!-- Icon End -->
                        <!-- Content Start -->
                        <div class="sisf-e-content">
                           <div class="sisf-sis-e-title mb-2">
                              <h3 class="sisf-e-title">
                                 <?= $manufacturingCTA['i_heading3']; ?>
                              </h3>
                           </div>
                           <div class="sisf-sis-description">
                              <p class="mb-0"><?= $manufacturingCTA['i_text3']; ?></p>
                           </div>
                        </div>
                        <!-- Content End -->
                     </div>
                  </div>
                   <div class="sisf-e-detail--page-content sisf-e-how-item" data-aos="fade-up" data-aos-delay="700">
                     <div class="sisf-e-inner d-flex position-relative gap-4">
                        <!-- Icon Start -->
                        <div class="sisf-how-icon-image">
                           <figure>
                              <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['icon4']; ?>" alt="Oilix">
                           </figure>
                        </div>
                        <!-- Icon End -->
                        <!-- Content Start -->
                        <div class="sisf-e-content">
                           <div class="sisf-sis-e-title mb-2">
                              <h3 class="sisf-e-title">
                                 <?= $manufacturingCTA['i_heading4']; ?>   
                              </h3>
                           </div>
                           <div class="sisf-sis-description">
                              <p class="mb-0"><?= $manufacturingCTA['i_text4']; ?>

</p>
                           </div>
                        </div>
                        <!-- Content End -->
                     </div>
                  </div>
               
                  <div class="sisf-e-detail--page-content sisf-e-how-item mb-0" data-aos="fade-up" data-aos-delay="900">
                     <div class="sisf-e-inner d-flex position-relative gap-4">
                        <!-- Icon Start -->
                        <div class="sisf-how-icon-image">
                           <figure>
                              <img src="<?= SITE_URL ?>uploads/process/<?= $manufacturingCTA['icon5']; ?>" alt="Oilix">
                           </figure>
                        </div>
                        <!-- Icon End -->
                        <!-- Content Start -->
                        <div class="sisf-e-content">
                           <div class="sisf-sis-e-title mb-2">
                              <h3 class="sisf-e-title">
                                 <?= $manufacturingCTA['i_heading5']; ?>
                              </h3>
                           </div>
                           <div class="sisf-sis-description">
                              <p class="mb-0"><?= $manufacturingCTA['i_text5']; ?>
</p>
                           </div>
                        </div>
                        <!-- Content End -->
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
      </div>
<?php } ?>          
      

         </div>
      </div>
      <!-- How we work  Section End -->
        
<?php
$tblManufacturingCTA2 = mysqli_query($conn, "SELECT * FROM tbl_manufacture_cta WHERE id='1' LIMIT 1");
if(mysqli_num_rows($tblManufacturingCTA2) > 0){
    $manufacturingCTA2 = mysqli_fetch_assoc($tblManufacturingCTA2);
?>
         <!-- Global Outreach Section Start -->
      <div class="sis-global-outreach-section sisf-sis-comman-background sis-br-radius section">
         <div class="container">
            <div class="row align-items-end gy-4">
               <div class="col-lg-7">
                  <div class="sisf-sis-section-title sis-section-title">
                     <span class="sisf-m-subtitle text-white sis-text-anime-style-3"><?= $manufacturingCTA2['subheading']; ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3 text-white"><?= $manufacturingCTA2['heading']; ?></h2>
                     <div class="sisf-m-text" data-aos="fade-up" data-aos-delay="100">
                        <p class="text-white"><?= $manufacturingCTA2['content']; ?></p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5 text-lg-end">
                  <div class="sisf-global-badge" data-aos="fade-up" data-aos-delay="200">
                     <span class="sisf-global-badge-icon"><i class="fa-solid fa-industry"></i></span>
                     <span><?= $manufacturingCTA2['main_heading']; ?></span>
                  </div>
               </div>
            </div>
            <div class="row g-4 mt-1">
     <?php
$tblMillPhone = mysqli_query($conn, "SELECT heading,subheading1,content,id FROM tbl_mill WHERE status = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblMillPhone) > 0) {
    while($tblMillPhoneRow = mysqli_fetch_assoc($tblMillPhone)) {
     ?>
     
               <div class="col-lg-6">
                  <div class="sisf-global-e-page-contents" data-aos="fade-right" data-aos-delay="100">
                     <div class="sisf-global-card-top">
                        <div class="sisf-global-icon">
                           <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div class="sisf-global-meta">
                           <h3><?= $tblMillPhoneRow['heading']; ?> <?= $tblMillPhoneRow['subheading1']; ?></h3>
                        </div>
                     </div>
                     <p class="sisf-global-address"><?= strip_tags(substr($tblMillPhoneRow['content'], 0, 420)); ?><a href="about.php#<?= $tblMillPhoneRow['id']; ?>" class="sis-text-yellow"> ...read more</a></p>                    
                  </div>
               </div>   

<?php } } ?>

            </div>
            </div>
      </div>
<?php } ?>


<?php

$tblPackageVariant = mysqli_query($conn, "SELECT * FROM tbl_package_variant LIMIT 1");
if(mysqli_num_rows($tblPackageVariant) > 0) {
    $packageVariant = mysqli_fetch_assoc($tblPackageVariant);

?>
       <!-- Benefits Section Start -->
      <div class="sis-benefits-section sis-comman-background  section pattern-bg-section">
         <div class="container">
            <div class="row justify-content-center align-items-center">
               <div class="col-md-7">
                 <div class="sisf-sis-section-title text-center sis-section-title">
                     <span class="sisf-m-subtitle white sis-text-anime-style-3"><?= $tblHomeExtraResult['variant_heading'] ?? '' ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"><?= $packageVariant['heading1']; ?><br> <span class="sisf--e-colored">  <?= $packageVariant['heading2']; ?></span> </h2>
                     <div class="sisf-m-text w-70" data-aos="fade-up" data-aos-delay="100">
                       <?= $packageVariant['content']; ?>
                     </div>
                  </div>
               </div>
            </div>   
            <div class="row align-items-center">
            <div class="col-lg-4">
<?php
$tblPackageVariantDetails = mysqli_query($conn, "SELECT packname,pack_weight FROM `tbl_package_var` WHERE status = '1' ORDER BY `sort` LIMIT 0, 5");
if(mysqli_num_rows($tblPackageVariantDetails) > 0) {
    while($tblPackageVariantDetailsRow = mysqli_fetch_assoc($tblPackageVariantDetails)) {
?>
                <!-- Card 1 -->
<div class="sisf-e-page-hover-contents sisf-sis-bottom-border pb-1 mb-2" data-aos="fade-right" data-aos-delay="100">
   <div class="sis-e-inner">
      <div class="d-flex gap-4 justify-content-end">
        
         <div class="sisf-m-contents">
            <div class="sis-e-title mb-1">
               <h3><?= $tblPackageVariantDetailsRow['packname'] ?></h3>
            </div>
            <div class="sis-e-text text-lg-end">
               <p class="mb-0"><?= $tblPackageVariantDetailsRow['pack_weight'] ?></p>
            </div>
         </div>
          <div class="sisf-m-icon">
            <figure>
               <img src="<?= SITE_URL ?>images/oilsize.png" class="img-fluid">
            </figure>
         </div>
      </div>
   </div>
</div>

<?php } } ?>
                 
               </div>

               <div class="col-lg-4">
                  <div class="sis-benefit-image-center position-relative" data-aos="fade-up" data-aos-delay="500">
                     <figure class="sis-reveal sis-radius">
                        <img src="<?= SITE_URL ?>uploads/package_variant/<?= $packageVariant['image'] ?>" class="w-100" alt="Oilix"> 
                     </figure>
                   
                  </div>
               </div>

               <div class="col-lg-4 mt-4 mt-md-0">

<?php
$tblPackageVariantDetails1 = mysqli_query($conn, "SELECT packname,pack_weight FROM `tbl_package_var` WHERE status = '1' ORDER BY `sort` LIMIT 5, 5");
if(mysqli_num_rows($tblPackageVariantDetails1) > 0) {
    while($tblPackageVariantDetailsRow1 = mysqli_fetch_assoc($tblPackageVariantDetails1)) {
?>               

                 <!-- Card 6 -->
<div class="sisf-e-page-hover-contents sisf-sis-bottom-border pb-1 mb-2" data-aos="fade-left" data-aos-delay="350">
   <div class="sis-e-inner">
      <div class="d-flex gap-4">
         <div class="sisf-m-icon">
            <figure>
                <img src="<?= SITE_URL ?>images/oilsize.png" class="img-fluid">
            </figure>
         </div>
         <div class="sisf-m-contents">
            <div class="sis-e-title mb-1">
               <h3><?= $tblPackageVariantDetailsRow1['packname'] ?></h3>
            </div>
            <div class="sis-e-text">
               <p class="mb-0"><?= $tblPackageVariantDetailsRow1['pack_weight'] ?></p>
            </div>
         </div>
      </div>
   </div>
</div>

<?php } } ?>

               </div>
            </div>
         </div>
      </div>
      <!-- Benefits Section End -->
<?php } ?>

     
      <?php
$tblHomeCTA = mysqli_query($conn, "SELECT * FROM tbl_cta");
if(mysqli_num_rows($tblHomeCTA) > 0) {
   $tblHomeCTAData = mysqli_fetch_assoc($tblHomeCTA);
      ?>
       <!-- Watch our story Section Start -->
      <div class="sis-watch-our-section sis-br-radius section" style="background-image: url('uploads/cta/<?= $tblHomeCTAData['image'] ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
         <div class="container" style="position: relative; z-index: 1;">
            <div class="row align-items-center">
               <div class="col-12">
                  <!-- Setion Title Start -->
                  <div class="sisf-sis-section-title sis-section-title">
                     
                     <div class="row justify-content-center align-items-center">
                        <div class="col-md-7 text-center">
                           <span class="sisf-m-subtitle text-white sis-text-anime-style-3 sis-m-subtitle-dark"><?= $tblHomeCTAData['m_heading'] ?></span>
                     <h2 class="sisf-m-title text-white sis-text-anime-style-3"><?= $tblHomeCTAData['heading'] ?> <span class="sisf-e-colored"> <?= $tblHomeCTAData['subheading'] ?></span></h2>
                   
                     <div class="sisf-m-button pt-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <a href="<?= SITE_URL ?>contact" class="sis-btn-default sisf-e-radius">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
                     </div>
                     </div>
                     </div>
                  </div>
                 
               </div>   
            </div>
         </div>
      </div>
      <!-- Real Protection Section End -->
<?php } ?>

<?php
$tblHomeContact = mysqli_query($conn, "SELECT * FROM tbl_home_contact WHERE id='1' LIMIT 1");
if(mysqli_num_rows($tblHomeContact) > 0) {
    $tblHomeContactData = mysqli_fetch_assoc($tblHomeContact);
?>

   <!-- Contact Us Section Start -->
      <div class="sis-contact-section section  pattern-bg-section">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <!-- Setion Title Start -->
                <div class="row justify-content-center align-items-center mb-5">
                   <div class="col-md-7">
                       
                     <div class="sisf-sis-section-title text-center sis-section-title mb-0">
                         <span class="sisf-m-subtitle white sis-text-anime-style-3"><?= $tblHomeExtraResult['con_heading'] ?? '' ?></span>
                         <h2 class="sisf-m-title sis-text-anime-style-3"><?= $tblHomeContactData['heading1'] ?><br> <span class="sisf--e-colored"> <?= $tblHomeContactData['heading2'] ?></span> </h2>
                         <div class="sisf-m-text w-70 mx-auto" data-aos="fade-up" data-aos-delay="100">
                            <p><?= $tblHomeContactData['text'] ?></p>
                         </div>
                      </div>
                   </div>
                </div>
                  <!-- Setion Title End -->
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <div class="sis-right-contact-image position-relative h-100 d-flex flex-column justify-content-center">
                     <figure class="sis-reveal sis-image-anime rounded-4 overflow-hidden mb-4 shadow position-relative" style="height: 600px;">
                        <div class="contact-image-logo" style="position: absolute; width:100px; height:100px; top: 20px; left: 20px; z-index: 10; background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); padding: 0px; border-radius: 50%; border: 1px solid rgba(255, 255, 255, 0.5); box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                           <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="RR Oil Mill" class="contect-logo-image" style="">
                        </div>
                        <img src="<?= SITE_URL ?>uploads/contact/<?= $tblHomeContactData['image'] ?>" class="w-100 h-100" style="object-fit: cover;" alt="Contact Us">
                     </figure>
                     <div class="sisf-sis-contact-information p-4 rounded-4 shadow-sm w-100" style="background-color: #fcfcfc; border: 1px solid #e9ecef;">
                        <div class="row g-4">
                           <!-- Phone -->
                           <div class="col-sm-6">
                              <div class="sisf-contact-box d-flex align-items-center gap-3 w-100">
                                 <div class="sisf-icon d-flex justify-content-center align-items-center rounded-circle flex-shrink-0" style="width: 50px; height: 50px; background-color: var(--main-color);">
                                    <a href="tel:<?= $contact['con_phone1'] ?>" style="color: #fcb700; font-size: 1.2rem; display: flex;"><i class="fa-solid fa-phone-volume"></i></a>
                                 </div>
                                 <div class="sisf-sis-e-content">
                                    <span class="sis-title d-block fw-bold mb-1" style="color: #495057; font-size: 0.85rem; letter-spacing: 0.5px;">PHONE</span>
                                    <a href="tel:<?= $contact['con_phone1'] ?>" class="text-dark text-decoration-none" style="font-size: 0.95rem;"><?= $contact['con_phone1'] ?></a>
                                 </div>
                              </div>
                           </div>
                           <!-- Email -->
                           <div class="col-sm-6">
                              <div class="sisf-contact-box d-flex align-items-center gap-3 w-100">
                                 <div class="sisf-icon d-flex justify-content-center align-items-center rounded-circle flex-shrink-0" style="width: 50px; height: 50px; background-color: var(--main-color);">
                                    <a href="mailto:<?= $contact['con_email1'] ?>" style="color: #fcb700; font-size: 1.2rem; display: flex;"><i class="fa-regular fa-envelope"></i></a>
                                 </div>
                                 <div class="sisf-sis-e-content">
                                    <span class="sis-title d-block fw-bold mb-1" style="color: #495057; font-size: 0.85rem; letter-spacing: 0.5px;">EMAIL</span>
                                    <a href="mailto:<?= $contact['con_email1'] ?>" class="text-dark text-decoration-none" style="font-size: 0.95rem;"><?= $contact['con_email1'] ?></a>
                                 </div>
                              </div>
                           </div>
                           <!-- Location -->
                           <div class="col-sm-6">
                              <div class="sisf-contact-box d-flex align-items-center gap-3 w-100">

                                 <div class="sisf-icon d-flex justify-content-center align-items-center rounded-circle flex-shrink-0" style="width: 50px; height: 50px; background-color: var(--main-color);">
                                    <a href="tel:+17674539988" style="color: #fcb700; font-size: 1.2rem; display: flex;"><i class="fa-solid fa-location-dot"></i></a>
                                 </div>

                                 <div class="sisf-sis-e-content">
                                    <span class="sis-title d-block fw-bold mb-1" style="color: #495057; font-size: 0.85rem; letter-spacing: 0.5px;">LOCATION</span>
                                    <span class="text-dark" style="font-size: 0.95rem;"><?= $contact['con_address'] ?></span>
                                 </div>
                              </div>
                           </div>
                           <!-- Office Hours -->
                           <div class="col-sm-6">
                              <div class="sisf-contact-box d-flex align-items-center gap-3 w-100">
                              <div class="sisf-icon d-flex justify-content-center align-items-center rounded-circle flex-shrink-0" style="width: 50px; height: 50px; background-color: var(--main-color);">
                                    <a href="tel:+17674539988" style="color: #fcb700; font-size: 1.2rem; display: flex;"><i class="fa-regular fa-clock"></i></a>
                                 </div>

                                 <div class="sisf-sis-e-content">
                                    <span class="sis-title d-block fw-bold mb-1" style="color: #495057; font-size: 0.85rem; letter-spacing: 0.5px;">OFFICE HOURS</span>
                                    <span class="text-dark" style="font-size: 0.95rem;"><?= $contact['con_office_hours'] ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="sis-contect-right sisf-e-contact-right p-4 p-md-5 pt-md-4 rounded-4 shadow-lg bg-white mt-4 mt-md-0 border h-100 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                     <!-- Setion Title Start -->
                     <div class="sisf-sis-section-title sis-section-title mb-0 pb-2 border-bottom">
                         <span class="about-label-box mb-0">Contact Us</span>
                        <h2 class="sisf-m-title sis-text-anime-style-3 h3 mb-2" style="font-size: 2rem;"><?= $tblHomeContactData['form_heading'] ?></h2>
                        <div class="sisf-m-text">
                           <p class="text-muted mb-0 mt-0"><?= $tblHomeContactData['form_text'] ?></p>
                        </div>
                     </div>
                     <!-- Setion Title End -->
                     <div class="form-section mt-2">
                        <!-- Form Start -->
                        <form class="p-0 m-0" action="<?= SITE_URL ?>mail/mail" method="POST" data-toggle="validator" data-wow-delay="0.5s">
                           <div class="row g-3">
                              
                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Full Name *</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" name="name" placeholder="Your full name" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>
                              
                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Company / Brand Name</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" name="cb_name" placeholder="Your company or brand name" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Email Address *</label>
                                    <input type="email" class="form-control bg-white border rounded-3 px-3 py-2" name="email" placeholder="you@company.com" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Phone Number *</label>
                                    <input type="tel" class="form-control bg-white border rounded-3 px-3 py-2" name="phone" placeholder="+91 98765 43210" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Inquiry Type</label>
                                    <select class="form-control bg-white border rounded-3 px-3 py-2 text-muted" name="type" style="border-color: #dee2e6 !important; appearance: auto;">
                                       <option value="Private Label / Own Brand">Private Label / Own Brand</option>
                                       <option value="Bulk Supply">Bulk Supply</option>
                                       <option value="Contract Manufacturing">Contract Manufacturing</option>
                                    </select>
                                 </div>
                              </div>
                                <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Monthly Quantity Requirement</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" name="quantity" placeholder="e.g. 10,000 units/month" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-2 d-block" style="font-size: 0.9rem;">Category of Interest *</label>
                                    <div class="d-flex flex-wrap gap-2">
                                       <input type="radio" class="btn-check" name="category" id="cat1" value="Hygiene" autocomplete="off" checked>
                                        <label class="btn btn-outline-warning rounded-pill px-4 py-1" for="cat1" style="font-size: 0.85rem; border-color: #eee; color:#fcb700;">Hygiene</label>
                                        
                                        <input type="radio" class="btn-check" name="category" id="cat2" value="Home Care" autocomplete="off">
                                        <label class="btn btn-outline-warning rounded-pill px-4 py-1" for="cat2" style="font-size: 0.85rem; border-color: #eee; color: #fcb700;">Home Care</label>
                                        
                                        <input type="radio" class="btn-check" name="category" id="cat3" value="Healthcare" autocomplete="off">
                                        <label class="btn btn-outline-warning rounded-pill px-4 py-1" for="cat3" style="font-size: 0.85rem; border-color: #eee; color: #fcb700;">Healthcare</label>
                                    </div>
                                    <style>
                                       .btn-check:checked + .btn-outline-warning {
                                          background-color: var(--main-color);
                                          border-color: var(--main-color);
                                          color: white;
                                       }
                                    </style>
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Your Message</label>
                                    <textarea class="form-control bg-white border rounded-3 px-3 py-2" name="message" placeholder="Tell us about your requirements..." rows="4" style="border-color: #dee2e6 !important;"></textarea>
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="form-group mb-0">
                                    <div class="g-recaptcha" data-sitekey="6LczRIAtAAAAANVDyPiqSfh7ZdYTg0DBlW8GNHBq"></div>
                                 </div>
                              </div>

                              <div class="col-12 mt-4 pt-2">
                                 <div class="sisf-m-btn">
                                    <button type="submit" class="sis-btn-default sisf-e-radius w-100 d-flex justify-content-center align-items-center " style="background-color: var(--main-color); border-color: var(--main-color); color: white;">Send My Requirement <i class="fa-solid fa-arrow-right ms-2"></i></button>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!-- Form End -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      <!-- Contact Us Section End -->
       
<?php } ?>

    
        <?php require 'inc/footer.php'; ?>
        <?php require 'inc/footer-data.php'; ?>

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



