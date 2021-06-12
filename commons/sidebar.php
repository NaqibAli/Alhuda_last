<?php 
$value = 'empty';
// 	if(isset($_COOKIE[$cookie_name]))
// 		$value =  $_COOKIE[$cookie_name]; 
	
?>
<body class="main-body app sidebar-mini <?php echo ($value) ?>" mode="" style="background-color:#e9e7f7;">
	
<!-- Loader -->
<div id="global-loader">
	<img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- main-sidebar opened -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
	<div class="main-sidebar-header">
		<a class="desktop-logo logo-light active" href="default_dashboard.php" class="text-center mx-auto"><img src="uploads/images/system/logo.png" class="main-logo" id="logo_d"></a>
		<a class="desktop-logo icon-logo active"href="default_dashboard.php"><img src="uploads/images/system/fav.png" class="logo-icon" id="favicon_d"></a>
		<a class="desktop-logo logo-dark active" href="default_dashboard.php"><img src="uploads/images/system/logo-white.png" class="main-logo dark-theme" alt="logo" id="logo_white_d"></a>
		<a class="logo-icon mobile-logo icon-dark active" href="default_dashboard.php"><img src="uploads/images/system/fav.png" class="logo-icon dark-theme" alt="logo" id="fav_white_d"></a>
	</div><!-- /logo -->
	<div class="main-sidebar-loggedin">
		<div class="app-sidebar__user">
			<div class="dropdown user-pro-body text-center">
				<div class="user-pic">
					<img src="uploads/images/<?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_photo']; ?>" alt="user-img" class="rounded-circle mCS_img_loaded">
				</div>
				<div class="user-info">
					<h6 class=" mb-0 text-dark"><?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_name']; ?></h6>
					<span class="text-muted app-sidebar__user-name text-sm"><?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_title']; ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="sidebar-navs">
		<ul class="nav  nav-pills-circle">
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings" aria-describedby="tooltip365540">
				<a class="nav-link text-center m-2" href="#" data-toggle="modal" data-target="#change_pass_modal">
					<i class="fe fe-settings"></i>
				</a>
				
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chat" aria-describedby="tooltip143427">
				<a class="nav-link text-center m-2" href='chat.php'>
					<i class="fe fe-mail"></i>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Followers">
				<a class="nav-link text-center m-2" href="employee_status.php">
					<i class="fe fe-user"></i>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
				<a href="logout.php" class="nav-link text-center m-2">
					<i class="fe fe-power"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="main-sidebar-body">
		<ul class="side-menu ">
			<li class="slide">
				<a class="side-menu__item" href="index.html"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" href="widgets.html"><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Widgets</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-mail menu-icons"></i><span class="side-menu__label">Mail</span><span class="badge badge-warning side-badge">5</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="mail.html">Mail</a></li>
					<li><a class="slide-item" href="mail-compose.html">Mail Compose</a></li>
					<li><a class="slide-item" href="mail-read.html">Read-mail</a></li>
					<li><a class="slide-item" href="mail-settings.html">mail-settings</a></li>
					<li><a class="slide-item" href="chat.html">Chat</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Apps</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="cards.html">Cards</a></li>
					<li><a class="slide-item" href="darggablecards.html">Darggablecards</a></li>
					<li><a class="slide-item" href="rangeslider.html">Range-slider</a></li>
					<li><a class="slide-item" href="calendar.html">Calendar</a></li>
					<li><a class="slide-item" href="contacts.html">Contacts</a></li>
					<li><a class="slide-item" href="image-compare.html">Image-compare</a></li>
					<li><a class="slide-item" href="notification.html">Notification</a></li>
					<li><a class="slide-item" href="widget-notification.html">Widget-notification</a></li>
					<li><a class="slide-item" href="treeview.html">Treeview</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" href="icons.html"><i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Icons</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-map-pin menu-icon"></i><span class="side-menu__label">Maps</span><span class="badge badge-pink side-badge">2</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="map-leaflet.html">Mapel Maps</a></li>
					<li><a class="slide-item" href="map-vector.html">Vector Maps</a></li>
				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layout"></i><span class="side-menu__label">Tables</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="table-basic.html">Basic Tables</a></li>
					<li><a class="slide-item" href="table-data.html">Data Tables</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layers "></i><span class="side-menu__label">Elements</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="alerts.html">Alerts</a></li>
					<li><a class="slide-item" href="avatar.html">Avatar</a></li>
					<li><a class="slide-item" href="breadcrumbs.html">Breadcrumbs</a></li>
					<li><a class="slide-item" href="buttons.html">Buttons</a></li>
					<li><a class="slide-item" href="badge.html">Badge</a></li>
					<li><a class="slide-item" href="dropdown.html">Dropdown</a></li>
					<li><a class="slide-item" href="thumbnails.html">Thumbnails</a></li>
					<li><a class="slide-item" href="images.html">Images</a></li>
					<li><a class="slide-item" href="list-group.html">List Group</a></li>
					<li><a class="slide-item" href="navigation.html">Navigation</a></li>
					<li><a class="slide-item" href="pagination.html">Pagination</a></li>
					<li><a class="slide-item" href="popover.html">Popover</a></li>
					<li><a class="slide-item" href="progress.html">Progress</a></li>
					<li><a class="slide-item" href="spinners.html">Spinners</a></li>
					<li><a class="slide-item" href="media-object.html">Media Object</a></li>
					<li><a class="slide-item" href="typography.html">Typography</a></li>
					<li><a class="slide-item" href="tooltip.html">Tooltip</a></li>
					<li><a class="slide-item" href="toast.html">Toast</a></li>
					<li><a class="slide-item" href="tags.html">Tags</a></li>
					<li><a class="slide-item" href="tabs.html">Tabs</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-package "></i><span class="side-menu__label">Advanced UI</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="accordion.html">Accordion</a></li>
					<li><a class="slide-item" href="carousel.html">Carousel</a></li>
					<li><a class="slide-item" href="collapse.html">Collapse</a></li>
					<li><a class="slide-item" href="modals.html">Modals</a></li>
					<li><a class="slide-item" href="timeline.html">Timeline</a></li>
					<li><a class="slide-item" href="sweet-alert.html">Sweet Alert</a></li>
					<li><a class="slide-item" href="rating.html">Ratings</a></li>
					<li><a class="slide-item" href="counters.html">Counters</a></li>
					<li><a class="slide-item" href="search.html">Search</a></li>
					<li><a class="slide-item" href="userlist.html">Userlist</a></li>
					<li><a class="slide-item" href="blog.html">Blog</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file"></i><span class="side-menu__label">Forms</span><span class="badge badge-info side-badge">6</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="form-elements.html">Form Elements</a></li>
					<li><a class="slide-item" href="form-advanced.html">Advanced Forms</a></li>
					<li><a class="slide-item" href="form-layouts.html">Form Layouts</a></li>
					<li><a class="slide-item" href="form-validation.html">Form Validation</a></li>
					<li><a class="slide-item" href="form-wizards.html">Form Wizards</a></li>
					<li><a class="slide-item" href="form-editor.html">WYSIWYG Editor</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bar-chart-2 "></i><span class="side-menu__label">Charts</span><span class="badge badge-danger side-badge">5</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="chart-morris.html">Morris Charts</a></li>
					<li><a class="slide-item" href="chart-flot.html">Flot Charts</a></li>
					<li><a class="slide-item" href="chart-chartjs.html">ChartJS</a></li>
					<li><a class="slide-item" href="chart-echart.html">Echart</a></li>
					<li><a class="slide-item" href="chart-sparkline.html">Sparkline</a></li>
					<li><a class="slide-item" href="chart-peity.html">Chart-peity</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-compass"></i><span class="side-menu__label">Pages</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="profile.html">Profile</a></li>
					<li><a class="slide-item" href="editprofile.html">Edit-Profile</a></li>
					<li><a class="slide-item" href="invoice.html">Invoice</a></li>
					<li><a class="slide-item" href="pricing.html">Pricing</a></li>
					<li><a class="slide-item" href="gallery.html">Gallery</a></li>
					<li><a class="slide-item" href="todotask.html">Todotask</a></li>
					<li><a class="slide-item" href="faq.html">Faqs</a></li>
					<li><a class="slide-item" href="empty.html">Empty Page</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Ecommerce</span><span class="badge badge-success side-badge">3</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="products.html">Products</a></li>
					<li><a class="slide-item" href="product-details.html">Product-Details</a></li>
					<li><a class="slide-item" href="product-cart.html">Cart</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-codepen "></i><span class="side-menu__label">Utilities</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="background.html">Background</a></li>
					<li><a class="slide-item" href="border.html">Border</a></li>
					<li><a class="slide-item" href="display.html">Display</a></li>
					<li><a class="slide-item" href="flex.html">Flex</a></li>
					<li><a class="slide-item" href="height.html">Height</a></li>
					<li><a class="slide-item" href="margin.html">Margin</a></li>
					<li><a class="slide-item" href="padding.html">Padding</a></li>
					<li><a class="slide-item" href="position.html">Position</a></li>
					<li><a class="slide-item" href="width.html">Width</a></li>
					<li><a class="slide-item" href="extras.html">Extras</a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-aperture"></i><span class="side-menu__label">Custom Pages</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item" href="signin.html">Sign In</a></li>
					<li><a class="slide-item" href="signup.html">Sign Up</a></li>
					<li><a class="slide-item" href="forgot.html">Forgot Password</a></li>
					<li><a class="slide-item" href="reset.html">Reset Password</a></li>
					<li><a class="slide-item" href="lockscreen.html">Lockscreen</a></li>
					<li><a class="slide-item" href="underconstruction.html">UnderConstruction</a></li>
					<li><a class="slide-item" href="404.html">404 Error</a></li>
					<li><a class="slide-item" href="500.html">500 Error</a></li>
				</ul>
			</li>
			<li class="slide ">
				<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Submenus</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li class="sub-slide">
						<a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Level1</span><i class="sub-angle fe fe-chevron-down"></i></a>
						<ul class="sub-slide-menu">
							<li><a class="sub-slide-item" href="#">Level01</a></li>
							<li><a class="sub-slide-item" href="#">Level02</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</aside>
<!-- main-sidebar closed -->