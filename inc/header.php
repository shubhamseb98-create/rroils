  <!-- Preloader Start -->
      <div class="sis-preloader">
         <div class="sis-loading-container">
            <div class="sis-loading"></div>
            <div class="sis-loading-icon">
               <figure class="sis-reveal">
                  <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="Logo">
               </figure>
            </div>
         </div>
      </div>
      <!-- Preloader End -->
      <!-- main-banner start -->
      <div class="sisf-page-background sis-main-banner">
           <!-- Header New Start -->
         <header id="sisf-page-header" class="sisf-main-header sisf-standerd-header position-relative">
            <div class="sis-header-top">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                         <div class="sis-header_col">
                            <div class="sisf-widget-holder d-flex justify-content-between align-items-center">
                               <div class="sisf-top-bar-widget d-flex align-items-center gap-4">
                                  <div class="sisf-icon-list-item sisf-icon--icon-pack">
                                     <a href="tel:<?= $contact['con_phone1'] ?>" target="_self">
                                     <span class="sisf-e-title-inner">
                                     <span class="sisf-e-title-text"><i class="fa-solid pe-2 fa-phone"></i> <?= $contact['con_phone1'] ?></span>
                                     </span>
                                     </a>
                                  </div>
                                  <div class="mail-us">
                                     <a href="mailto:<?= $contact['con_email1'] ?>"><span class="sisf-e-title-text"><i
                                        class="fa-regular fa-envelope pe-2"></i> <?= $contact['con_email1'] ?></span></a>
                                  </div>
                                  
                               </div>
                               
                               <div class="social-icons-link">
                                  <ul class="list-unstyled d-flex p-0 m-0">
                                     <li class="me-3"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                     <li class="me-3"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                     <li class="me-3"><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                     <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                  </ul>
                               </div>
                          
                            </div>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
             <div id="sisf-page-header-inner" class="sisf-skin--dark position-relative">
                <div class="container-fluid px-md-0 px-3">
                   <div class="sis-header-layout-wrapper d-flex align-items-center justify-content-between w-100">
                      
                      <!-- Left: Logo -->
                      <div class="sis-header-col sis-header-left">
                         <a class="navbar-brand sisf-header-logo-link" href="/">
                            <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="Logo">
                         </a>
                      </div>

                      <!-- Right: Hamburger Menu Icon -->
                      <div class="sis-header-col sis-header-right">
                         <button type="button" class="sis-burger-trigger-btn headerbtn" id="openSidebarBtn" aria-label="Open Menu">
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                            <span class="burger-line"></span>
                         </button>
                      </div>

                   </div>
                </div>
             </div>
          </header>
          
          <!-- Slide-in Sidebar (Drawer) Menu -->
          <div class="sis-sidebar-backdrop" id="sidebarBackdrop"></div>
          <div class="sis-sidebar-drawer" id="sidebarDrawer">
             <div class="sis-sidebar-header d-flex align-items-center justify-content-between">
                <div class="sis-sidebar-logo">
                   <a href="/">
                      <img src="<?= SITE_URL ?>uploads/<?= $profile['pro_logo'] ?>" alt="Logo">
                   </a>
                </div>
                <button type="button" class="sis-sidebar-close-btn" id="closeSidebarBtn" aria-label="Close Menu">
                   <i class="fa-solid fa-xmark"></i>
                </button>
             </div>
             <div class="sis-sidebar-body">
                <nav class="sis-sidebar-nav">
                   <ul class="list-unstyled">
                      <li><a href="<?= SITE_URL ?>" class="sis-sidebar-link">Home</a></li>
                      <li><a href="<?= SITE_URL ?>about" class="sis-sidebar-link">About Us</a></li>
                      <li><a href="<?= SITE_URL ?>manufacturing-process" class="sis-sidebar-link">Manufacturing</a></li>
                      <li><a href="<?= SITE_URL ?>private-labelling" class="sis-sidebar-link">Private Labelling</a></li>
                      <li><a href="<?= SITE_URL ?>quality-assurance" class="sis-sidebar-link">Quality Assurance</a></li>
                      <li><a href="<?= SITE_URL ?>contact" class="sis-sidebar-link">Contact us</a></li>
                   </ul>
                </nav>
                
                <!-- Sidebar Info Section -->
                <div class="sis-sidebar-info">
                   <h4 class="sis-info-title">Contact Details</h4>
                   <ul class="list-unstyled sis-info-list">
                      <li>
                         <a href="tel:<?= $contact['con_phone1'] ?>">
                            <i class="fa-solid fa-phone"></i> <?= $contact['con_phone1'] ?>
                         </a>
                      </li>
                      <li>
                         <a href="mailto:<?= $contact['con_email1'] ?>">
                            <i class="fa-regular fa-envelope"></i> <?= $contact['con_email1'] ?>
                         </a>
                      </li>
                      <li>
                         <i class="fa-solid fa-location-dot"></i> <span><?= $contact['con_address'] ?></span>
                      </li>
                   </ul>
                   
                   <!-- Social Media -->
                   <div class="sis-sidebar-socials">
      <?php
if(!empty($contact['con_facebook'])) {
      ?>
                      <a href="<?= $contact['con_facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
      <?php } ?>              
<?php
if(!empty($contact['con_linkedin'])) {
      ?>
                      <a href="<?= $contact['con_linkedin'] ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
      <?php } ?>
<?php
if(!empty($contact['con_instagram'])) {
      ?>        
                      <a href="<?= $contact['con_instagram'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
      <?php } ?>
<?php
if(!empty($contact['con_twitter'])) {
      ?>                      
                      <a href="<?= $contact['con_twitter'] ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
<?php } ?>
<?php
if(!empty($contact['con_youtube'])) {
      ?>                      
                      <a href="<?= $contact['con_youtube'] ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
      <?php } ?>                      
                   </div>
                </div>
             </div>
          </div>

          <!-- Fullscreen Search Overlay -->
          <div class="sis-search-overlay-wrapper" id="searchOverlay">
             <button type="button" class="sis-search-close-btn" id="closeSearchBtn" aria-label="Close Search">
                <i class="fa-solid fa-xmark"></i>
             </button>
             <div class="sis-search-form-container">
                <form role="search" method="get" class="sis-search-form" action="/">
                   <div class="sis-search-input-group">
                      <input type="search" class="sis-search-field" placeholder="Search products or services..." value="" name="s" id="searchField" autocomplete="off" />
                      <button type="submit" class="sis-search-submit-btn" aria-label="Submit Search">
                         <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                   </div>
                </form>
                <p class="sis-search-tip">Press ESC to close or click close button</p>
             </div>
          </div>
       
       </div>