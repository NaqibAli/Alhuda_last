<?php

session_start();

if (!isset($_SESSION['jst_user_id'])) {
	header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin jtech"/>

		<!-- Title -->
		<title> JTECH | SYSTEM </title>

		<!--- Favicon --->
        <link id="tap_icon" rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon" />

		<!--- Icons css --->
		<link href="assets/css/icons.css" rel="stylesheet">

		<!--- Right-sidemenu css --->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar --->
		<link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css --->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skin-modes.css" rel="stylesheet">

		<!--- Sidemenu css --->
		<link href="assets/css/sidemenu.css" rel="stylesheet">

		<!--- Animations css --->
		<link href="assets/css/animate.css" rel="stylesheet">

	</head>

	<body class="main-body" style='background-image: url("uploads/images/system/4.png"); background-size: cover;' id="body">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
					<div class="my-auto authentication-pages">
						<div>
                            <img id="logo_d" src="uploads/images/system/logo_white.png" class=" m-0 mb-4" alt="logo">
                            <h5 class="mb-4" id="title_d"></h5>
                            <p class="mb-5" id="body_d" style="text-align: justify;"></p>
                        </div>
					</div>
				</div>
				<div class="sign-up-body wd-md-50p">
					<div class="main-signin-header">
						<div class="">
							<h2>Welcome back!</h2>
							<h4 class="text-left">Change Your Password</h4>
							<form id="form_change_password" action="" method='POST'>
								<div class="form-group text-left">
									<label>New Password</label>
									<input class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" type="password">
								</div>
								<div class="form-group text-left">
									<label>Confirm Password</label>
									<input class="form-control" id="confirm_password" name="confirm_password"  placeholder="Enter your password again" type="password">
								</div>
								<button class="btn ripple btn-main-primary btn-block">Change Password</button>
							</form>
						</div>
					</div>
					<div class="main-signup-footer mg-t-10">
					</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /main-signin-wrapper -->


		<!--- JQuery min js --->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!--- Bootstrap Bundle js --->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js --->
		<script src="assets/plugins/ionicons/ionicons.js"></script>

		<!--- Moment js --->
		<script src="assets/plugins/moment/moment.js"></script>

		<!--- JQuery sparkline js --->
		<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Eva-icons js --->
		<script src="assets/js/eva-icons.min.js"></script>

		<!--- Rating js --->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="assets/plugins/rating/jquery.barrating.js"></script>

		<!--- JQuery sparkline js --->
		<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Custom js --->
		<script src="assets/js/custom.js"></script>
		<script type="text/javascript" src="models/login.js"></script>
    <script>
    settings();

    function settings() {

        $.ajax({
            method: "POST",
            url: "controllers/login.php",
            data: {
                "action": "fetch_settings"
            },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    $("#head").html(message['head_name']);
                    $("#footer").html(message['footer']);

                    $("#body_d").html(message['body']);
                    $("#title_d").html(message['title']);

                    $("#tap_icon").attr('href', 'uploads/images/system/' + message['icon']);

                    $("#logo_d").attr("src", "uploads/images/system/" + message['logo_white']);


                    var back = Math.floor((Math.random() * 4) + 1);

                    $("#body").css('background-image', 'url("uploads/images/system/' + back + '.png")');




                }

            },
            error: function(data) {

            }
        });

    }
    </script>

	</body>
</html>