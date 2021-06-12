<?php
session_start();

if (isset($_SESSION['jst_user_id'])) {
    header("Location: dashboard");
}

// echo $_SESSION['jst_user_type'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title id="head"> JTECH | SYSTEM </title>
    <!--- Favicon --->
    <link id="tap_icon" rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon" />

    <!--- Icons css --->
    <link href="assets/css/icons.css" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!--- Custom Scroll bar --->
    <link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!--- Style css --->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/skin-modes.css" rel="stylesheet">

    <!--- Sidemenu css --->
    <link href="assets/css/sidemenu.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="assets/css/animate.css" rel="stylesheet">

</head>

<body class="main-body bg-light"
    style='background-image: url("uploads/images/system/4.png"); background-size: cover;' id="body">

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
                            <img  src="uploads/images/system/Logo2.png" class=" m-0 mb-4" alt="logo">
                            <h5 class="mb-4" id="title_d"></h5>
                            <p class="mb-5" id="body_d" style="text-align: justify;"></p>
                        </div>
                    </div>
                </div>
                <div class="p-5 wd-md-50p">
                    <div class="main-signin-header">
                        <h2 style="color: #0b8457;">Welcome back!</h2>
                        <h4>Please sign in to continue</h4>
                        <form id="form_signin" method="post">
                            <div class="alert alert-dismissible" role="alert" style="display: none" id="main_alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="alert-message">

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label><input class="form-control" placeholder="Enter your username"
                                    type="text" id="username" value="admin" >
                            </div>
                            <div class="form-group">
                                <label>Password</label> <input class="form-control" placeholder="Enter your password"
                                    type="password" id="password" value="123" >
                            </div><button type="submit" class="btn btn-main-primary btn-block"
                                style="background: #0b8457;">Sign In</button>

                        </form>
                    </div>
                    <div class="main-signin-footer mt-3 mg-t-5 text-center mt-1">



                        <div class="container-fluid pd-t-0-f ht-100p">
                            <span id="footer"></span>
                        </div>


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

    <!--- JQuery sparkline js --->
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>


    <!--- Moment js --->
    <script src="assets/plugins/moment/moment.js"></script>

    <!--- Eva-icons js --->
    <script src="assets/js/eva-icons.min.js"></script>

    <!--- Rating js --->
    <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="assets/plugins/rating/jquery.barrating.js"></script>

    <!--- Custom js --->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="models/login.js"></script>
    <script>

localStorage.setItem("userType","");
console.log(localStorage.getItem("userType"))

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
