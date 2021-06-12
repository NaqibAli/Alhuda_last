<?php
session_start();


if (!isset($_SESSION['jst_user_id'])) {
	header("Location: login.php");
}
// if ($_SESSION['jst_user_id'] != '') {
// 	header("Location: default_dashboard");
// }
// echo $_SESSION['jst_user_type'];

// $cookie_name = "mode";
// $cookie_value = 'dark-theme';
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>



<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title id="head_d"> Jtech System </title>

		<!--- Favicon --->
		<link id="favicon_d" rel="icon" href="../uploads/images/system/fav.png" type="image/x-icon"/>

		<!--- Icons css --->
		<link href="assets/css/icons.css" rel="stylesheet">

		<!--- Right-sidemenu css --->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar --->
		<link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css --->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-dark.css" rel="stylesheet">
		<link href="assets/css/skin-modes.css" rel="stylesheet">

		<!--- Sidemenu css --->
		<link href="assets/css/sidemenu.css" rel="stylesheet">
		<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />
		<!--- Animations css --->
		<link href="assets/css/animate.css" rel="stylesheet">

	</head>