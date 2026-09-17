<?php 
$directoryURI = $_SERVER['REQUEST_URI'] ?? '';
$path = parse_url($directoryURI, PHP_URL_PATH);
$first_part = basename($path ?: ($_SERVER['PHP_SELF'] ?? 'index.php'));

$sqqll ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resulltt = $conn->query($sqqll);
$rowww = $resulltt->fetch_assoc();
?>
<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image bg-light">
								<img src="../uploads/<?= $rowww['pro_favicon']; ?>" alt="<?= $adminrec['name'];?>" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								  <?= $adminrec['name'];?>
								<small><?= $adminrec['email'];?></small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="manage-profile.php"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="manage-contact.php"><i class="fa fa-edit"></i> Contact Setting</a></li>
							<li><a href="includes/logout.php" onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($first_part=="index.php") { echo "active"; } ?>">
						<a href="index.php">
							<b class="caret"></b>
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>

                      <li class="has-sub <?php if($first_part=="manage-banner.php" || $first_part=="add-banner.php" || $first_part=="edit-banner.php" || $first_part=="manage-clients.php" || $first_part=="add-clients.php" || $first_part=="edit-clients.php" || $first_part=="manage-testimonial-extra.php" || $first_part=="manage-catalog.php"|| $first_part=="manage-home-about.php" || $first_part=="manage-why-choose.php" || $first_part=="manage-started.php" || $first_part=="add-started.php" || $first_part=="edit-started.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Home Management</span> 
						</a>
						<ul class="sub-menu">
                        	<!--<li><a href="manage-banner.php">Banner Management </a></li> -->
                        	<li><a href="manage-banner.php">Banner Management </a></li> 
                        	<li><a href="manage-home-about.php">Home About </a></li> 
							<li><a href="manage-clients.php">Accreditation Mana.. </a></li> 
                        	<li><a href="manage-cta.php">CTA Management </a></li> 
                        	<li><a href="manage-why-choose.php">Work Management </a></li> 
                        	<li><a href="manage-manufacturing.php">Manufacturing Process </a></li> 
                        	<li><a href="manage-manufacturing-cta.php">Manufacturing CTA </a></li> 
                        	<li><a href="manage-started.php">How We Started </a></li>
                        	<li><a href="manage-home-contact.php">Home Form Contact </a></li> 
                        	<!-- <li><a href="manage-acheivements.php">Achievements Manag..</a></li> -->
							<li><a href="manage-home-extra.php">Home Text Management </a></li> 
						</ul>
					</li>

                    <li class="has-sub <?php if($first_part=="manage-about.php" || $first_part=="manage-acheivements.php" || $first_part=="manage-mill.php" || $first_part=="manage-foundation.php" || $first_part=="manage-core-values.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>About Management</span>
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-about.php">Main Content</a></li>
							<li><a href="manage-acheivements.php">Achievements Manag..</a></li>
                        	<li><a href="manage-mill.php">Mill Management</a></li>
                        	<li><a href="manage-foundation.php">Foundation Mana..</a></li>
                        	<li><a href="manage-core-values.php">Core Values</a></li>
                        	<li><a href="manage-choose.php">Why Choose Us</a></li>
						</ul>
					</li>						

                    <li class="has-sub <?php if( $first_part=="manage-philosophy.php" ){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Quality Assurance</span>
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-philosophy.php">Philosophy</a></li>
							<li><a href="manage-standards.php">Standards</a></li>
                        	<li><a href="manage-process.php">Process Management</a></li>
                        	<li><a href="manage-commit.php">Commit Management</a></li>
                        	<li><a href="manage-commit-standard.php">Commit Standard</a></li>
                        	<li><a href="manage-quality-extra.php">Extra Text</a></li>
						</ul>
					</li>						

                    <li class="has-sub <?php if($first_part=="manage-label-service.php" ){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Private Labeling</span>
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-label-service.php">Services Text</a></li>
							<li><a href="manage-many-services.php">Many Services</a></li>
                        	<li><a href="manage-work-with-us.php">Work With Us</a></li>
                        	<li><a href="manage-label-extra.php">Extra Content</a></li>
						</ul>
					</li>	 					

                    <li class="has-sub <?php if($first_part=="manage-manufacturing-content.php" ){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Manufacturing Process</span>
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-manufacturing-content.php">Manufacturing Text</a></li>
							<li><a href="manage-manufacturing-process.php">Manufacturing Process</a></li>
                        	<li><a href="manage-youtube-video.php">Youtube Video</a></li>
                        	<li><a href="manage-manufacturing-extra.php">Manufacturing Extra</a></li>
						</ul>
					</li>						

                    <li class="has-sub <?php if($first_part=="manage-package-variant.php" || $first_part=="edit-service-category.php" || $first_part=="manage-service.php" || $first_part=="add-service.php" || $first_part=="edit-service.php" || $first_part=="manage-subcategory.php" || $first_part=="add-subcategory.php" || $first_part=="edit-subcategory.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Package Variant</span> 
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-package-variant.php">Package Variant</a></li> 
                        	<li><a href="manage-package-var.php">Packing</a></li> 
							<!--<li><a href="manage-subcategory.php">Subcat Management </a></li> -->
                        	<!-- <li><a href="manage-service.php">Product management</a></li> -->
							<!--<li><a href="manage-home-extra.php">Home Text Management </a></li> -->
						</ul>
					</li>			

					 <li class="has-sub d-none <?php if($first_part=="manage-about.php"){ echo "active"; } ?>">
						<a href="manage-about.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>About Us Management</span> 
						</a>
					</li>
					
					 <li class="has-sub  d-none <?php if($first_part=="manage-distributer.php"){ echo "active"; } ?>">
						<a href="manage-distributer.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Distr. Management</span> 
						</a>
					</li>
					
					 <li class="has-sub  d-none <?php if($first_part=="manage-company-profile.php"){ echo "active"; } ?>">
						<a href="manage-company-profile.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>comp. pr. Management</span> 
						</a>
					</li>
					
					<!--<li class="has-sub <?php if($first_part=="manage-testimonial-extra.php" ||  $first_part=="manage-testimonial.php" || $first_part=="add-testimonial.php" || $first_part=="edit-testimonial.php"){ echo "active"; } ?>">-->
					<!--	<a href="manage-testimonial.php">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-home"></i>-->
					<!--		<span>Testimonial manage..</span> -->
					<!--	</a>-->
					<!--</li>-->
					<!--<li class="has-sub <?php if($first_part=="manage-gallery.php" || $first_part=="edit-gallery.php" ) { echo "active"; } ?>">-->
					<!--	<a href="manage-gallery.php">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-file-image-o"></i>-->
					<!--		<span>Gallery Manag..</span>-->
					<!--	</a>-->
					<!--</li>-->
					
					<!--<li class="has-sub <?php if($first_part=="manage-service-category.php" || $first_part=="edit-service-category.php" || $first_part=="manage-service.php" || $first_part=="add-service.php" || $first_part=="edit-service.php"){ echo "active"; } ?>">-->
					<!--	<a href="manage-service.php">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-home"></i>-->
					<!--		<span>Product management</span> -->
					<!--	</a>-->
					<!--</li>-->
					
                     <li class="has-sub  d-none <?php if($first_part=="manage-service-category.php" || $first_part=="edit-service-category.php" || $first_part=="manage-service.php" || $first_part=="add-service.php" || $first_part=="edit-service.php" || $first_part=="manage-subcategory.php" || $first_part=="add-subcategory.php" || $first_part=="edit-subcategory.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Product Management</span> 
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-service-category.php">Category Management</a></li> 
							<!--<li><a href="manage-subcategory.php">Subcat Management </a></li> -->
                        	<li><a href="manage-service.php">Product management</a></li>
							<!--<li><a href="manage-home-extra.php">Home Text Management </a></li> -->
						</ul>
					</li>						
					
					<!--<li class="has-sub <?php if($first_part=="manage-case-study.php" || $first_part=="manage-case-study.php" || $first_part=="add-case-study.php") { echo "active"; } ?>">-->
     <!--   				<a href="manage-case-study.php">-->
     <!--   					<b class="caret"></b>-->
     <!--   					<i class="fa fa-image "></i>-->
     <!--   					<span>Case Study Manag..</span> -->
     <!--   				</a>-->
     <!--   			</li>-->
					
					<li class="has-sub  d-none <?php if($first_part=="manage-blogs.php" || $first_part=="manage-blogs.php" || $first_part=="add-blogs.php") { echo "active"; } ?>">
        				<a href="manage-blogs.php">
        					<b class="caret"></b>
        					<i class="fa fa-image "></i>
        					<span>Blogs Management</span> 
        				</a>
        			</li>
					
					<!--<li class="has-sub <?php if($first_part=="manage-team.php" || $first_part=="add-team.php" || $first_part=="edit-team.php" ) { echo "active"; } ?>">-->
					<!--	<a href="manage-team.php">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-users"></i>-->
					<!--		<span>Team Manag..</span>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li class="has-sub <?php if($first_part=="manage-quick-links.php") { echo "active"; } ?>">-->
     <!--   				<a href="manage-quick-links.php">-->
     <!--   					<b class="caret"></b>-->
     <!--   					<i class="fa fa-image "></i>-->
     <!--   					<span>Manage Quick Links</span> -->
     <!--   				</a>-->
     <!--   			</li>-->
   <!--     			<li class="has-sub <?php if ($first_part == "manage-shipping.php") { echo "active"; } ?>">-->
			<!--	<a href="manage-shipping.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-truck"></i><span>Shipping Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub <?php if ($first_part == "manage-discount.php") { echo "active"; } ?>">-->
			<!--	<a href="manage-discount.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-percent"></i><span>Discount Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub  <?php if($first_part=="manage-users.php") { echo "active"; } ?>">-->
			<!--	<a href="manage-users.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-user"></i>-->
			<!--		<span>Users Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub <?php if ($first_part == "manage-orderdetail.php" || $first_part == "manage-order.php" || $first_part == "manage-online-success-orders.php" || $first_part == "manage-pending-orders.php" || $first_part == "manage-cos-success-orders.php") { echo "active"; } ?>">-->
			<!--	<a href="javascript:;">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-shopping-cart"></i>-->
			<!--		<span>Order Management</span>-->
			<!--	</a>-->
			<!--	<ul class="sub-menu">-->
			<!--		<li><a href="manage-order.php">COD Success Orders</a></li>-->
					<!--<li><a href="manage-cos-success-orders.php">Collect from Store</a></li>-->
			<!--		<li><a href="manage-online-success-orders.php">Online Success Orders</a></li>-->
			<!--		<li><a href="manage-pending-orders.php">Pending/Failed Orders</a></li>-->
			<!--	</ul>-->
			<!--</li>-->
                    <li class="has-sub <?php if($first_part=="manage-breadcrumb.php" || $first_part=="edit-breadcrumb.php" ) { echo "active"; } ?>">
						<a href="manage-breadcrumb.php">
							<b class="caret"></b>
							<i class="fa fa-file-image-o"></i>
							<span>Breadcrumb Manag..</span>
						</a>
					</li>
				    
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
<div class="sidebar-bg"></div>

