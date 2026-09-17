<?php
require('inc/function.php');
$tblBread = mysqli_fetch_assoc(mysqli_query($conn,"SELECT brd_name,brd_image FROM `tbl_breadcrumb` WHERE `brd_id` = '2'"));
?>

<!DOCTYPE html>
<html lang="zxx">
   
<head>
        <?php require 'inc/head.php'; ?>

   </head>
   <body>
         <?php require 'inc/header.php'; ?>

       <div class="sisf-banner position-relative">
            <div class="banner-img">
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
      
      
        <!-- Location Map Section Start -->
      <div class="sis-contact-location-section">
         <div class="container-fluid p-0">
            <div class="row">
               <div class="col-12">
                  <div class="sis-contact-map" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="<?= $contact['con_map'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Location Map Section End -->
 
      
      
      
    
     
      <!-- Back to Top Button End -->
          <?php require 'inc/footer.php'; ?>
          <?php require 'inc/footer-data.php'; ?>

   </body>

</html>