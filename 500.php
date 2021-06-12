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
    <title>  </title>

    <!--- Favicon --->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon" />

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

<body class="main-body" style='background-image: url("uploads/images/system/4.png"); background-size: cover;'
    id="body">

    <!-- Loader -->
    <div id="global-loader">
        <img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    
  <!-- row opened -->
  <div class="my-auto page main-signin-wrapper" style="justify-content: center;">
        <div class="col-xl-5">
            <div class="card">
                

                <div class="card-body">
                <div class="main-error-wrapper  page page-h ">
        <h1 class="text-warning">500</h1>
        <h2>Oopps. You are not allowed to visit this page.</h2>
        <h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-indigo"
            href="login">Back to Home</a>
    </div>
                </div>
            </div>
        </div>
        <!--/div-->




    </div>
    <!-- /row -->
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
                    $("#tap_icon").attr('href', 'uploads/images/system/' + message['icon']);
                    $("#footer").html(message['footer']);
                    $("#side_logo").attr("src", "uploads/images/system/" + message['logo']);


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