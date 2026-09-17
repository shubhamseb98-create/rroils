<?php

require('inc/function.php');
$tblBread = mysqli_fetch_assoc(mysqli_query($conn,"SELECT brd_name,brd_image FROM `tbl_breadcrumb` WHERE `brd_id` = '12'"));
?>

<!DOCTYPE html>
<html lang="zxx">
   
<head>
        <?php require 'inc/head.php'; ?>

   </head>
   <body>
         <?php require 'inc/header.php'; ?>

       <div class="sisf-banner position-relative">
            <div class="banner-img bread-height">
               <figure>
                  <img src="<?= SITE_URL ?>uploads/breadcrumb/<?= $tblBread['brd_image']; ?>" alt="Oilix">
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
                  <div class="sisf-m-content sisf-content-grid ">
                     <h1 class="sisf-m-title text-white sis-text-anime-style-3 entry-title"><?= $tblBread['brd_name']; ?></h1>
                  </div>
               </div>
            </div>
         </div>
      <!-- main-banner end -->
      
<?php
$tblAbout = mysqli_query($conn, "SELECT * FROM tbl_about");
if(mysqli_num_rows($tblAbout) > 0){
    $tblAboutData = mysqli_fetch_assoc($tblAbout);
?>
      <!-- About Us Section Start -->
      <div class="sis-about-us-section sis-comman-background section">
         <div class="container">
               
            <div class="row gy-4">
               <div class="col-lg-12">
                 
                 <div class="sisf-sis-section-title sis-section-title">
                     <!-- Image floated right -->
                     <div class="float-md-end ms-md-5 mb-4 col-md-5">
                         <div class="sisf-about-left-image position-relative">
                            <figure class="sis-image-anime sis-reveal mb-3 sis-radius">
                               <img src="<?= SITE_URL ?>uploads/about/<?= $tblAboutData['image'] ?>" class="w-100" alt="Oilix">
                            </figure>
                         </div>
                     </div>

                   <span class="about-label-box"><?= $tblAboutData['heading']; ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"> <?= $tblAboutData['subheading']; ?><span class="sisf-e-colored"><?= $tblAboutData['subheading1']; ?></span></h2>
                     <div class="sisf-m-text">
                        <?= $tblAboutData['content']; ?>
                     </div>
                  </div>

               </div>
            </div>
         </div>       
       
      </div>
      <!-- About Us Section End -->
<?php } ?>

<?php
$tblAchievement = mysqli_query($conn, "SELECT number,unit,operator,name FROM `tbl_acheivements` WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblAchievement) > 0){
?>

        <div class="bg-dot row" id="about_rrmo"see thuis>
         <div class="col-md-12">
           <div class="sisf-about-bottom-counters ">
            <div class="container">
               <div class="row">
<?php 
while($rowAchievements = mysqli_fetch_assoc($tblAchievement)){
?>
                  <div class="col-md-4 col-12 mb-4 mb-md-0">
                     <div class="about-bottom-counter-box text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1200">
                        <div class="about-counter-highlight"><?= $rowAchievements['number'] ?><?= $rowAchievements['unit'] ?><?= $rowAchievements['operator'] ?></div>
                        <div class="about-counter-desc text-uppercase"><?= $rowAchievements['name'] ?></div>
                     </div>
                  </div>
<?php } ?>
               </div>
            </div>
         </div>
         </div>
      </div>

<?php } ?>
      
<?php
$tblMill = mysqli_query($conn, "SELECT * FROM tbl_mill WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblMill) > 0){
   $i=1;
   while($rowMill = mysqli_fetch_assoc($tblMill)){
?>
<?php if($i % 2 != 0){ ?>


  <!-- About Us Section Start -->
      <div class="sis-about-us-section sis-comman-background section sisf--comman-bg-light" id="<?= $rowMill['id'] ?>">
         <div class="container">               
            <div class="row gy-4">               
               <div class="col-lg-6 align-items-center d-flex justify-content-center">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="sisf-about-left-image position-relative">
                           <figure class="sis-image-anime sis-reveal mb-3 sis-radius about-height">
                              <img src="<?= SITE_URL ?>uploads/mill/<?= $rowMill['image'] ?>" class="img-fluid w-100" alt="Pure Mustard Oil Pouring">
                           </figure>
                        
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="col-lg-6">
                
                 <div class="sisf-sis-section-title sis-section-title">
                   <span class="about-label-box"><?= $rowMill['subheading']; ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"><?= $rowMill['heading']; ?> <span class="sisf-e-colored"><?= $rowMill['subheading1']; ?></span></h2>
                     <div class="sisf-m-text">
                        <p><?= $rowMill['content']; ?></p>
                     </div>
                  </div>

                     </div>
                  </div>
               </div>       
            </div>
      <!-- About Us Section End -->
<!---------------------->

       <!-- About Us Section Start -->
      
      <!-- About Us Section End -->
<?php } else { ?>
       <div class="sis-about-us-section sis-comman-background section" id="<?= $rowMill['id'] ?>">
         <div class="container">
               
            <div class="row gy-4">
               <div class="col-lg-6">
                
                 <div class="sisf-sis-section-title sis-section-title">
                   <span class="about-label-box"><?= $rowMill['subheading']; ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"><?= $rowMill['heading']; ?> <span class="sisf-e-colored"><?= $rowMill['subheading1']; ?></span></h2>
                     <div class="sisf-m-text">
                        <?= $rowMill['content']; ?>
                     </div>
                  </div>
              
               </div>
               <div class="col-lg-6 align-items-center d-flex">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="sisf-about-left-image position-relative">
                           <figure class="sis-image-anime sis-reveal mb-3 sis-radius about-height">
                              <img src="<?= SITE_URL ?>uploads/mill/<?= $rowMill['image'] ?>" class="img-fluid w-100" alt="RR Oil Mill Facility">
                           </figure>                        
                        </div>
                     </div>                     
                  </div>
               </div>
            </div>
         </div>
        
       
      </div>
       <?php } ?>
<?php $i++; } } ?>

      <!-- Modern Philosophy Bento Box Section Start -->
      <div class="sis-philosophy-section section py-5 sisf--comman-bg-light">
         <div class="container">
            
<?php
$tblFoundationMill = mysqli_query($conn, "SELECT * FROM `tbl_foundation`");
if(mysqli_num_rows($tblFoundationMill) > 0){
   $rowFoundation = mysqli_fetch_assoc($tblFoundationMill);
?>
            <div class="row mb-5 text-center justify-content-center">
               <div class="col-lg-8">
                  <div class="sisf-sis-section-title sis-section-title mb-0">
                     <span class="about-label-box"><?= $rowFoundation['subheading'] ?></span>
                     <h2 class="sisf-m-title sis-text-anime-style-3"><?= $rowFoundation['heading'] ?> <span class="sisf-e-colored"><?= $rowFoundation['heading1'] ?></span></h2>
                  </div>
               </div>
            </div>
            
            <!-- Top Row: Mission & Vision -->
            <div class="row mb-4 align-items-stretch gy-4">
               
               <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                  <div class="h-100 p-5 sis-radius shadow-sm d-flex flex-column justify-content-center" style="background: var(--primary-color); position: relative; overflow: hidden;">
                     <div style="position: absolute; right: -20px; top: -20px; opacity: 0.05;">
                        <i class="fa-solid fa-rocket fa-10x text-white"></i>
                     </div>
                     <div class="position-relative" style="z-index: 1;">
                        <h3 class="text-white mb-4" style="font-size: 32px; font-weight: 700;">
                           <span style="color: #fcb700; font-size: 20px; vertical-align: middle; margin-right: 10px;">01.</span> <?= $rowFoundation['c_heading1'] ?>
                        </h3>
                        <p class="text-white opacity-75 mb-0" style="font-size: 1.15rem; line-height: 1.8;">
                          <?= $rowFoundation['c_content1'] ?>
                        </p>
                     </div>
                  </div>
               </div>
               
               <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                  <div class="h-100 p-5 sis-radius shadow-sm d-flex flex-column justify-content-center bg-white" style="border: 1px solid rgba(0,0,0,0.05);">
                     <h3 class="mb-4" style="font-size: 32px; font-weight: 700; color: var(--primary-color);">
                        <span style="color: var(--main-color); font-size: 20px; vertical-align: middle; margin-right: 10px;">02.</span> <?= $rowFoundation['c_heading2'] ?>
                     </h3>
                     <p class="mb-0" style="font-size: 1.15rem; line-height: 1.8; color: var(--text-color);">
                        <?= $rowFoundation['c_content2'] ?>
                     </p>
                  </div>
               </div>
               
            </div>
<?php } ?>      

            <!-- Bottom Row: Values & Why Choose Us -->
            <div class="row align-items-stretch gy-4">
               
               <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="h-100 p-4 p-md-5 sis-radius shadow-sm bg-white" style="border-top: 4px solid var(--main-color); border: 1px solid rgba(0,0,0,0.05);">
                     <h3 class="mb-4" style="font-size: 28px; font-weight: 700; color: var(--primary-color);">
                        Our Core Values
                     </h3>
                     <ul class="list-unstyled" style="font-size: 1.05rem; line-height: 2; color: var(--text-color);">
<?php
$tblCoreValues = mysqli_query($conn, "SELECT name FROM `tbl_core_values` WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblCoreValues) > 0){
   while($rowCoreValues = mysqli_fetch_assoc($tblCoreValues)){
?>
                        <li class="mb-3 border-bottom pb-2"><i class="fa-solid fa-check me-2" style="color: #fcb700;"></i> <?= $rowCoreValues['name'] ?></li>
<?php } } ?>

                     </ul>
                  </div>
               </div>
               
               <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400">
                  <div class="h-100 p-4 p-md-5 sis-radius shadow-sm sisf--comman-bg-light">
                     <h3 class="mb-4" style="font-size: 28px; font-weight: 700; color: var(--primary-color);">
                        Why Choose Us?
                     </h3>
                     <div class="row">
                        <div class="col-md-6">
                           <ul class="list-unstyled" style="font-size: 1.05rem; line-height: 1.8; color: var(--text-color);">
<?php
$tblWhyChooseWale = mysqli_query($conn, "SELECT name FROM `tbl_choose` WHERE `status` = '1' ORDER BY `sort` LIMIT 0,5");
if(mysqli_num_rows($tblWhyChooseWale) > 0){
   while($rowWhyChooseWale = mysqli_fetch_assoc($tblWhyChooseWale)){
?>
                              <li class="mb-3 d-flex"><i class="fa-solid fa-arrow-right-long mt-2 me-3" style="color: var(--main-color);"></i> <span><?= $rowWhyChooseWale['name'] ?></span></li>
<?php } } ?>
                          
                           </ul>
                        </div>
                        <div class="col-md-6">
                           <ul class="list-unstyled" style="font-size: 1.05rem; line-height: 1.8; color: var(--text-color);">
<?php
$tblWhyChooseWale1 = mysqli_query($conn, "SELECT name FROM `tbl_choose` WHERE `status` = '1' ORDER BY `sort` LIMIT 5,5");
if(mysqli_num_rows($tblWhyChooseWale1) > 0){
   while($rowWhyChooseWale1 = mysqli_fetch_assoc($tblWhyChooseWale1)){
?>
                              <li class="mb-3 d-flex"><i class="fa-solid fa-arrow-right-long mt-2 me-3" style="color: var(--main-color);"></i> <span><?= $rowWhyChooseWale1['name'] ?></span></li>
<?php } } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
            
         </div>
      </div>
      <!-- Modern Philosophy Bento Box Section End -->
          <?php require 'inc/footer.php'; ?>
          <?php require 'inc/footer-data.php'; ?>

   </body>

</html>

