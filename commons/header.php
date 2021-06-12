	<!-- main-content -->
	<div class="main-content" style="background: #0b8457; height: 250px;">

	    <!-- main-header -->
	    <div class="main-header side-header">
	        <div class="container-fluid">
	            <div class="main-header-left ">
	                <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
	                    <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
	                    <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
	                </div>
	                <div class="responsive-logo">
	                    <a href="index.html"><img src="uploads/images/system/logo_white.png" class="logo-1"></a>
	                    <a href="index.html"><img src="assets/img/brand/logo.png" class="logo-11"></a>
	                    <a href="index.html"><img src="uploads/images/system/logo_white.png" class="logo-2"></a>
	                    <a href="index.html"><img src="assets/img/brand/favicon.png" class="logo-12"></a>
	                </div>

	            </div>
	            <div class="main-header-center ">

	                <div class="responsive-logo">
	                    <a href="index.html"><img src="uploads/images/system/logo_white.png" class="logo-1"></a>
	                    <a href="index.html"><img src="assets/img/brand/logo.png" class="logo-11"></a>
	                    <a href="index.html"><img src="uploads/images/system/logo_white.png" class="logo-2"></a>
	                    <a href="index.html"><img src="assets/img/brand/favicon.png" class="logo-12"></a>
	                </div>

	            </div>
	            <div class="main-header-right">

	                <div class="nav nav-item  navbar-nav-right ml-auto">
	                    <div class="nav-item full-screen fullscreen-button">
	                        <a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></span></a>
	                    </div>
                        <div class="dropdown  nav-item main-header-message ">
	                        <!-- <a class="new nav-link" href="#"><i class="fe fe-mail"></i><span
	                                class=" pulse-danger"></span></a> -->
	                        <div class="dropdown-menu">
	                            <div class="menu-header-content bg-primary-gradient text-left d-flex">
	                                <div class="">
	                                    <h6 class="menu-header-title text-white mb-0">New Messages</h6>
	                                </div>
	                               
	                            </div>
	                            <div class="main-message-list chat-scroll">
	                               
	                               

	                            </div>
	                            <div class="text-center dropdown-footer">
	                                <a href="#">VIEW ALL</a>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="dropdown nav-item main-header-notification">
	                        <!-- <a class="new nav-link" href="#"><i class="fe fe-bell"></i><span class=" pulse"></span></a> -->
	                        <div class="dropdown-menu">
	                            <div class="menu-header-content bg-primary-gradient text-left d-flex">
	                                <div class="">
	                                    <h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
	                                </div>
	                                <div class="my-auto ml-auto">
	                                    <a class="badge badge-pill badge-warning float-right" href="#">Mark All Read</a>
	                                </div>
	                            </div>
	                            <div class="main-notification-list Notification-scroll">
	                                <a class="d-flex p-3 border-bottom" href="#">
	                                    <div class="notifyimg bg-success-transparent">
	                                        <i class="la la-shopping-basket text-success"></i>
	                                    </div>
	                                    <div class="ml-3">
	                                        <h5 class="notification-label mb-1">New Order Received</h5>
	                                        <div class="notification-subtext">1 hour ago</div>
	                                    </div>
	                                    <div class="ml-auto">
	                                        <i class="las la-angle-right text-right text-muted"></i>
	                                    </div>
	                                </a>
	                                <a class="d-flex p-3 border-bottom" href="#">
	                                    <div class="notifyimg bg-danger-transparent">
	                                        <i class="la la-user-check text-danger"></i>
	                                    </div>
	                                    <div class="ml-3">
	                                        <h5 class="notification-label mb-1">22 verified registrations</h5>
	                                        <div class="notification-subtext">2 hour ago</div>
	                                    </div>
	                                    <div class="ml-auto">
	                                        <i class="las la-angle-right text-right text-muted"></i>
	                                    </div>
	                                </a>
	                                <a class="d-flex p-3 border-bottom" href="#">
	                                    <div class="notifyimg bg-primary-transparent">
	                                        <i class="la la-check-circle text-primary"></i>
	                                    </div>
	                                    <div class="ml-3">
	                                        <h5 class="notification-label mb-1">Project has been approved</h5>
	                                        <div class="notification-subtext">4 hour ago</div>
	                                    </div>
	                                    <div class="ml-auto">
	                                        <i class="las la-angle-right text-right text-muted"></i>
	                                    </div>
	                                </a>


	                                <a class="d-flex p-3" href="#">
	                                    <div class="notifyimg bg-purple-transparent">
	                                        <i class="la la-gem text-purple"></i>
	                                    </div>
	                                    <div class="ml-3">
	                                        <h5 class="notification-label mb-1">Updates Available</h5>
	                                        <div class="notification-subtext">2 days ago</div>
	                                    </div>
	                                    <div class="ml-auto">
	                                        <i class="las la-angle-right text-right text-muted"></i>
	                                    </div>
	                                </a>
	                            </div>
	                            <div class="text-center dropdown-footer">
	                                <a href="#">VIEW ALL</a>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="dropdown main-profile-menu nav nav-item nav-link">

	                        <a class="profile-user d-flex" href=""><img
	                                src="uploads/images/<?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_photo']; ?>"
	                                alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

	                        <div class="dropdown-menu">
	                            <div class="main-header-profile header-img">
	                                <div class="main-img-user"><img alt=""
	                                        src="uploads/images/<?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_photo']; ?>">
	                                </div>
	                                <h6><?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_name']; ?></h6>
	                                <span><?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_title']; ?></span>
	                            </div>
	                            <a class="dropdown-item" href="employee_status"><i class="far fa-user"></i>My
	                                Profile</a>
	                            <a class="dropdown-item" href="" val="dark-theme" id="mode_dark"><i
	                                    class="fa fa-lightbulb"></i>Dark Mode</a>
	                            <a class="dropdown-item" href="" val="" id="mode_light"><i
	                                    class="fa fa-lightbulb"></i>Light Mode</a>
	                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_pass_modal">
	                                <i class="dropdown-icon  mdi mdi-settings"></i> Change Password
	                            </a>
	                            <a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
	                        </div>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /main-header -->



	    <div class="modal fade" id="change_pass_modal" tabindex="-1" role="dialog" aria-hidden="true">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="example-Modal3">Change Password</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>

	                <form id="form_change_user" method="post" class="m-form m-form--state">
	                    <div class="modal-body">

	                        <input type="hidden" id="user_id_side" name="user_id_side"
	                            value="<?php echo $_SESSION['jst_user_id']?>">

	                        <div class="form-group">
	                            <label for="name" class="form-control-label">
	                                Username:
	                            </label>
	                            <input type="text" class="form-control m-input" id="username_side" name="username_side"
	                                required="true" value="<?php echo $_SESSION['jst_username']?>">
	                        </div>

	                        <div class="form-group">
	                            <label for="new_password" class="form-control-label">
	                                New Password
	                            </label>
	                            <div class="input-group date">
	                                <input class="form-control" type="password" id="new_password" autocomplete="off"
	                                    name="new_password" required="true" value="">

	                            </div>
	                        </div>

	                    </div>

	                    <div class="modal-footer" style="text-align: -webkit-right;">

	                        <button class="btn btn-success" id="change_password" name="change_password" type="submit"><i
	                                class="fa fa-save"></i> Save
	                            Changes</button>
	                    </div>

	                </form>
	            </div>
	        </div>
	    </div>