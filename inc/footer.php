  <!-- Footer Start -->
      <footer class="main-footer">
         <div class="sisf-page-footer-inner-area sis-primary-background">
            <div class="sisf-page-footer-middle-area border-0 ">
               <div class="container">
                 
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                         <div class="footer-logo d-flex" data-aos="fade-up" data-aos-delay="100">
                              <a href="<?= SITE_URL ?>">
                              <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="RR Oil Mill" class="footer-logo-image">
                              </a>
                           </div>
                        <div class="sis-m-text">
                           <p class="text-white"><?= $contact['con_detail'] ?></p>
                        </div>
                        <div class="footer-social-icons-link sisf--footer-social-icons-link page d-flex" data-aos="fade-up" data-aos-delay="300">
                              <ul class="list-unstyled d-flex align-items-center justify-content-center gap-2 p-0 m-0">
                                 <?php
if(!empty($contact['con_facebook'])) { ?>

                                 <li><a href="<?= $contact['con_facebook'] ?>" class="mb-0"><i class="fa-brands fa-facebook-f"></i></a></li>
                                 <?php } ?>
                                 <?php
if(!empty($contact['con_twitter'])) { ?>
                                 <li><a href="<?= $contact['con_twitter'] ?>" class="mb-0"><i class="fa-brands fa-x-twitter"></i></a></li>
                                 <?php } ?>
                                 <?php
if(!empty($contact['con_instagram'])) { ?>
                                 <li><a href="<?= $contact['con_instagram'] ?>" class="mb-0"><i class="fa-brands fa-instagram"></i></a></li>
                                 <?php } ?>
                                 <?php
if(!empty($contact['con_youtube'])) { ?>
                                 <li><a href="<?= $contact['con_youtube'] ?>" class="mb-0"><i class="fa-brands fa-youtube"></i></a></li>
                                 <?php } ?>
<?php if(!empty($contact['con_linkedin'])) { ?>
                                 <li><a href="<?= $contact['con_linkedin'] ?>" class="mb-0"><i class="fa-brands fa-linkedin"></i></a></li>
                                 <?php } ?>

                              </ul>
                           </div>
                     </div>
                     <div class="col-lg-5 col-md-6">
                        <!-- Links Start -->
                        <div class="footer-links page">
                           <h3 class="text-white">Quick Links</h3>
                           <ul class="list-unstyled">
                              <li class="mb-2"><a href="<?= SITE_URL ?>" class="text-white">Home</a></li>
                              <li class="mb-2"><a href="<?= SITE_URL ?>about" class="text-white">About Us</a></li>
                              <li class="mb-2"><a href="<?= SITE_URL ?>manufacturing-process" class="text-white">Manufacturing</a></li>
                              <li class="mb-2"><a href="<?= SITE_URL ?>private-labelling" class="text-white">Private Labelling</a></li>
                              <li class="mb-2"><a href="<?= SITE_URL ?>quality-assurance" class="text-white">Quality Assurance</a></li>
                              <li class="mb-2"><a href="<?= SITE_URL ?>contact" class="text-white">Contact Us</a></li>
                           </ul>
                        </div>
                        <!-- Links End -->
                     </div>
                     <div class="col-lg-3 col-md-6 d-none">
                        <!-- Links Start -->
                        <div class="footer-links page">
                           <h3 class="text-white">Products</h3>
                           <ul>
                              <li><a href="javascript:void(0)" class="text-white">Kachi Ghani Mustard Oil Bottle (Small)</a></li>
                              <li><a href="javascript:void(0)" class="text-white">Essure Refined Soyabean Oil Pouch</a></li>
                              <li><a href="javascript:void(0)" class="text-white">Kachi Ghani Mustard Oil Bottle (Large)</a></li>
                              <li><a href="javascript:void(0)" class="text-white">Kachi Ghani Mustard Oil Pouch</a></li>
                              <li><a href="javascript:void(0)" class="text-white">Kachi Ghani Mustard Oil 5L Jerry Can</a></li>
                           </ul>
                        </div>
                        <!-- Links End -->
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <!-- Links Start -->
                        <div class="footer-links page">
                           <h3 class="text-white">Contact Details</h3>
                           <ul class="list-unstyled">
                              <li class="d-flex gap-3 mb-3">
                                 <i class="fa-solid fa-envelope mt-1" style="color: var(--main-color, #fcb700);"></i>
                                 <a href="mailto:<?= $contact['con_email1'] ?>" class="text-white"><?= $contact['con_email1'] ?></a>
                              </li>
                              <li class="d-flex gap-3 mb-3">
                                 <i class="fa-solid fa-phone mt-1" style="color: var(--main-color, #fcb700);"></i>
                                 <a href="tel:<?= $contact['con_phone1'] ?>" class="text-white"><?= $contact['con_phone1'] ?></a>
                              </li>
                              <li class="d-flex gap-3 mb-3">
                                 <i class="fa-solid fa-location-dot mt-1" style="color: var(--main-color, #fcb700);"></i>
                                 <span class="text-white"><?= $contact['con_address'] ?></span>
                              </li>
                           </ul>
                        </div>
                        <!-- Links End -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="sisf-page-footer-bottom-area sisf--page-footer-bottom-area ">
               <div class="container">
                  <!-- Footer Copyright Section Start -->
                  <div class="footer-copyright py-4">
                     <div class="row">
                        <div class="col-lg-6">
                           <!-- Footer Copyright Start -->
                           <div class="footer-copyright-text">
                              <p class="mb-0 text-white">&copy; <?= date('Y'); ?> RR Oil Mill. All Rights Reserved.</p>
                           </div>
                           <!-- Footer Copyright End -->
                        </div>
                        <div class="col-lg-6">
                           <div class="footer-privacy-policy">
                              <ul class="list-unstyled d-flex align-items-center justify-content-end gap-4 p-0 m-0">
                                 <!--<li><a href="#" class="text-white">Privacy Policy</a></li>-->
                                 <!--<li><a href="#" class="text-white">Terms & Conditions</a></li>-->
                                 <li><span class="text-white">Designed By <a href="https://www.thewebtycoons.com/" class="text-white" target="_blank" style="text-decoration: underline;">Web Tycoons</a></span></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Footer Copyright Section End -->
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer End -->
      <!-- Cursor Start -->
      <div class="sisf-cursor sisf-js-cursor">
         <div class="sisf-cursor-wrapper">
            <div class="sisf-cursor--follower sisf-js-follower"></div>
            <div class="sisf-cursor--label sisf-js-label"></div>
            <div class="sisf-cursor--drap sisf-js-drap"></div>
            <div class="sisf-cursor--icon sisf-js-icon"></div>
         </div>
      </div>
      <!-- Cursor End -->
      <!-- Back to Top Button Start -->
      <div class="sis-back-to-top-button">
         <button class="sis-back-to-top" id="backToTop">
         <span class="mt-1"><i class="fa fa-chevron-up"></i></span>
         </button>
      </div>
      <!-- Back to Top Button End -->