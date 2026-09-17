<?php
require('inc/function.php');
$tblHomeExtraResult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_home_extra"));
$tblBread = mysqli_fetch_assoc(mysqli_query($conn,"SELECT metadesc,brd_name,brd_image FROM `tbl_breadcrumb` WHERE `brd_id` = '6'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require 'inc/head.php'; ?>
   <title><?= $tblBread['brd_name']; ?> | RR Oil Mill</title>
   <meta name="description" content="<?= $tblBread['metadesc']; ?>">

</head>

<body>
   <?php require 'inc/header.php'; ?>

   <!-- ===== Page Banner ===== -->
   <div class="sisf-banner position-relative">
      <div class="banner-img bread-height">
         <figure>
            <img src="<?= SITE_URL ?>uploads/breadcrumb/<?= $tblBread['brd_image']; ?>" alt="Private Labelling & Packaging">
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

   <!-- ===== Intro Section ===== -->
<?php 
$tblPrivateLabelService = mysqli_query($conn, "SELECT * FROM tbl_label_service");
if(mysqli_num_rows($tblPrivateLabelService) > 0){
   $privateLabel = mysqli_fetch_assoc($tblPrivateLabelService);
?>
   <!-- ===== Intro Section ===== -->
   <section class="pl-intro-section py-5">
      <div class="container mt-4">
         <div class="row justify-content-center">
            <div class="col-lg-10 text-center" data-aos="fade-up" data-aos-delay="100">
               <div class="sisf-sis-section-title sis-section-title mb-4">
                  <span class="about-label-box"><?= $privateLabel['subheading']; ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3"><?= $privateLabel['heading1']; ?> <span class="sisf-e-colored"><?= $privateLabel['heading2']; ?></span></h2>
               </div>
               <?= $privateLabel['content']; ?>
            </div>
         </div>
      </div>
   </section>
   <!-- ===== Intro Section End ===== -->
<?php } ?>
   <!-- ===== Intro Section End ===== -->

<?php 
$tblManyService = mysqli_query($conn, "SELECT * FROM tbl_many_service WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblManyService) > 0){
?>   
   <!-- ===== Steps Section ===== -->
   <section class="pl-steps-section">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-11">
<?php
$i=1;$j=1;
while($rowManyServices = mysqli_fetch_assoc($tblManyService)){
?>
<?php
if( $i % 2 != 0){
?>
               <!-- Step 1 -->
               <div class="pl-step-item" data-aos="fade-up" data-aos-delay="100">
                  <div class="pl-step-thumb">
                     <img src="<?= SITE_URL ?>uploads/many_services/<?= $rowManyServices['image'] ?>" alt="Step 1 - Let us know what you need">
                  </div>
                  <div class="pl-step-content">
                     <div class="pl-step-header">
                        <div class="pl-step-number"><?= $j ?></div>
                        <h4><?= $rowManyServices['title'] ?></h4>
                     </div>
                     <?= $rowManyServices['content'] ?>
                  </div>
               </div>
<?php } else { ?>
               <!-- Step 2 -->
               <div class="pl-step-item reverse" data-aos="fade-up" data-aos-delay="150">
                  <div class="pl-step-thumb">
                     <img src="<?= SITE_URL ?>uploads/many_services/<?= $rowManyServices['image'] ?>" alt="Step 2 - Send us your artwork and label design">
                  </div>
                  <div class="pl-step-content">
                     <div class="pl-step-header">
                        <div class="pl-step-number"><?= $j ?></div>
                        <h4><?= $rowManyServices['title'] ?></h4>
                     </div>
                     <?= $rowManyServices['content'] ?>
                  </div>
               </div>
               <?php } ?>
<?php $i++; $j++; } ?>
            </div>
         </div>
      </div>
   </section>
   <!-- ===== Steps Section End ===== -->
<?php } ?>    
<?php
$textforYou = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_labeltext"));
?>
   <!-- ===== Why Choose Private Labelling Section ===== -->
   <section class="pl-why-section">
      <div class="container">
         <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="100">
               <div class="sisf-sis-section-title sis-section-title mb-0">
                  <span class="about-label-box"><?= $textforYou['subheading'] ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3"><?= $textforYou['heading1'] ?> <span class="sisf-e-colored"><?= $textforYou['heading2'] ?></span></h2>
               </div>
            </div>
         </div>
         <div class="row gy-4">
<?php
$tblWorkWithUs = mysqli_query($conn, "SELECT * FROM tbl_workwithus WHERE `status` = '1' ORDER BY `sort`");
if(mysqli_num_rows($tblWorkWithUs) > 0){
   while($rowWorkWithUs = mysqli_fetch_assoc($tblWorkWithUs)){
?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
               <div class="pl-feature-card">
                  <div class="pl-feature-icon">
                     <img src="<?= SITE_URL ?>uploads/work_with_us/<?= $rowWorkWithUs['icon'] ?>" alt="<?= $rowWorkWithUs['title'] ?>">
                  </div>
                  <h5><?= $rowWorkWithUs['title'] ?></h5>
                  <p><?= $rowWorkWithUs['content'] ?></p>
               </div>
            </div>
<?php } } ?>
         </div>
      </div>
   </section>
   <!-- ===== Why Choose Section End ===== -->

<?php
$tblPackageVariant = mysqli_query($conn, "SELECT * FROM tbl_package_variant LIMIT 1");
if(mysqli_num_rows($tblPackageVariant) > 0) {
    $packageVariant = mysqli_fetch_assoc($tblPackageVariant);
?>
   <!-- Benefits / Package Variants Section Start -->
   <div class="sis-benefits-section sis-comman-background section pattern-bg-section">
      <div class="container">
         <div class="row justify-content-center align-items-center">
            <div class="col-md-7">
              <div class="sisf-sis-section-title text-center sis-section-title">
                  <span class="sisf-m-subtitle white sis-text-anime-style-3"><?= $tblHomeExtraResult['variant_heading'] ?? '' ?></span>
                  <h2 class="sisf-m-title sis-text-anime-style-3"><?= $packageVariant['heading1']; ?><br> <span class="sisf--e-colored"> <?= $packageVariant['heading2']; ?></span> </h2>
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
   <!-- Benefits / Package Variants Section End -->
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
                           <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="RR Oil Mill" style="width: 75px; transform: translate(11px, -3px);">
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
                        <form id="enquiryForm" class="p-0 m-0" action="#" method="POST" data-toggle="validator" data-wow-delay="0.5s">
                           <div class="row g-3">
                              
                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Full Name *</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" id="fullName" name="fullName" placeholder="Your full name" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>
                              
                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Company / Brand Name</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" id="companyName" name="companyName" placeholder="Your company or brand name" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Email Address *</label>
                                    <input type="email" class="form-control bg-white border rounded-3 px-3 py-2" id="email" name="email" placeholder="you@company.com" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Phone Number *</label>
                                    <input type="tel" class="form-control bg-white border rounded-3 px-3 py-2" id="phone" name="phone" placeholder="+91 98765 43210" required="" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Inquiry Type</label>
                                    <select id="inquiryType" class="form-control bg-white border rounded-3 px-3 py-2 text-muted" style="border-color: #dee2e6 !important; appearance: auto;">
                                       <option value="Private Label / Own Brand">Private Label / Own Brand</option>
                                       <option value="Bulk Supply">Bulk Supply</option>
                                       <option value="Contract Manufacturing">Contract Manufacturing</option>
                                    </select>
                                 </div>
                              </div>
                                <div class="col-12 col-md-6">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-1" style="font-size: 0.9rem;">Monthly Quantity Requirement</label>
                                    <input type="text" class="form-control bg-white border rounded-3 px-3 py-2" id="quantity" name="quantity" placeholder="e.g. 10,000 units/month" style="border-color: #dee2e6 !important;">
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="form-group mb-0">
                                    <label class="form-label fw-bold text-dark mb-2 d-block" style="font-size: 0.9rem;">Category of Interest *</label>
                                    <div class="d-flex flex-wrap gap-2">
                                       <input type="radio" class="btn-check" name="category" id="cat1" autocomplete="off" checked>
                                       <label class="btn btn-outline-warning rounded-pill px-4 py-1" for="cat1" style="font-size: 0.85rem; border-color: #eee; color:#fcb700;">Hygiene</label>
                                       
                                       <input type="radio" class="btn-check" name="category" id="cat2" autocomplete="off">
                                       <label class="btn btn-outline-warning rounded-pill px-4 py-1" for="cat2" style="font-size: 0.85rem; border-color: #eee; color: #fcb700;">Home Care</label>
                                       
                                       <input type="radio" class="btn-check" name="category" id="cat3" autocomplete="off">
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
                                    <textarea id="message" class="form-control bg-white border rounded-3 px-3 py-2" name="message" placeholder="Tell us about your requirements..." rows="4" style="border-color: #dee2e6 !important;"></textarea>
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

   <!-- Form Submission Script -->
   <script>
      (function () {
         'use strict';
         var form = document.getElementById('privateLabelInquiryForm');
         if (form) {
            form.addEventListener('submit', function (e) {
               var valid = true;
               var requiredFields = form.querySelectorAll('[required]');
               requiredFields.forEach(function (field) {
                  if (!field.value.trim()) {
                     valid = false;
                     field.style.borderColor = '#e74c3c';
                     field.style.boxShadow = '0 0 0 3px rgba(231,76,60,0.15)';
                  } else {
                     field.style.borderColor = '';
                     field.style.boxShadow = '';
                  }
               });
               if (!valid) {
                  e.preventDefault();
                  var firstError = form.querySelector('[required]:invalid, [required][style*="e74c3c"]');
                  if (firstError) firstError.focus();
               }
            });

            // Remove error styles on input
            form.querySelectorAll('.pl-form-control').forEach(function (field) {
               field.addEventListener('input', function () {
                  this.style.borderColor = '';
                  this.style.boxShadow = '';
               });
            });
         }
      })();
   </script>

</body>

</html>
