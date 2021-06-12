<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template" />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta name="Keywords" content="" />

    <!-- Title -->
    <title>Al-Huda Islamic center</title>

    <!--- Favicon --->
    <link id="favicon_d" rel="icon" href="uploads/images/system/fav.png" type="image/x-icon"
        src="uploads/images/system/fav.png">

    <!--- Icons css --->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!--- Right-sidemenu css --->
    <!-- <link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet" /> -->

    <link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

    <!--- Custom Scroll bar --->
    <!-- <link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" /> -->

    <!--- Style css --->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/skin-modes.css" rel="stylesheet" />

    <!--- Sidemenu css --->
    <!-- <link href="assets/css/sidemenu.css" rel="stylesheet" /> -->

    <link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    <!--- Animations css --->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <style>
    .main-content {

        margin: 0 !important;
    }
    .main-header{
        background-color: #001f33;
    }

    /* .main-footer{
          position: relative;
          bottom: 0;
      } */
    </style>
</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader" />
    </div>


    <!-- main-content -->
    <div class="main-content" style="background: #001f33; height: 250px">

        <!-- container -->
        <div class="container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div>
                    <!-- <h4 class="content-title mb-2">Welcome To Member Registration Page</h4> -->
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row mb-4">
                <div class="col-lg-11 m-auto">
                    <div class="card shadow">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title mg-b-2 mt-2 page">
                                        Al-Huda MemberShip Form
                                    </h4>
                                    <p class="tx-12 text-muted mb-2">Fill the Form</p>
                                </div>
                            </div>
                        </div>
                        <form id="form">
                            <div class="card-body">
                                <input type="hidden" id="member_id" name="member_id" />
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">First Name <span
                                                        class="tx-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                    id="name" name="name" required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Second Name <span
                                                        class="tx-danger">*</span></label>
                                                <input type="text" class="form-control" name="sec_name" id="sec_name"
                                                    placeholder="Middle Name" required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Surname</label>
                                                <input type="text" class="form-control" name="surname" id="surname"
                                                    placeholder="Surname" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nick Name </label>
                                                <input type="text" class="form-control" name="nickname" id="nickname"
                                                    placeholder="Nick Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Mother's Name </label>
                                                <input type="text" class="form-control" name="mother_name"
                                                    id="mother_name" placeholder="Mother's Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Gender</label>
                                                <select name="gender" id="gender" class="form-control m-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email Address" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input type="number" class="form-control" name="phone" id="phone"
                                                    placeholder="Phone" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">National ID number<span
                                                        class="tx-danger">*</span></label>
                                                <input type="number" class="form-control" name="national_id"
                                                    id="national_id" required min="0"
                                                    placeholder="National ID number" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" class="form-control" autocomplete="off" id="street"
                                                    name="street" placeholder="Street name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Postal Code </label>
                                                <input type="text" class="form-control" autocomplete="off" id="postcode"
                                                    name="postcode" placeholder="Postal Code" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Village </label>
                                                <input type="text" class="form-control" autocomplete="off" id="village"
                                                    name="village" placeholder="Village" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Created Date </label>
                                                <input class="form-control" type="date" id="r_date"
                                                    value="<?php echo date('Y-m-d'); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" id="save" name="save" type="submit">
                                            <i class="fa fa-save"></i> Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
        <div class="main-footer ht-40 ">
            <div class="container-fluid pd-t-0-f ht-100p">
                Copyright © 2021 <b>Al-Huda Islamsk Senter </b>. Developed by
                <a href="https://jtech.so">Jamhuriya Technology Solutions</a> All rights
                reserved.
            </div>
        </div>
    </div>
    <div class="main-header shadow">
        <div class="container-fluid">
            <div class="main-header-left ">
                <div class="responsive-logo">
                    <a href="alhuda.co"><img src="../assets/img/brand/logo-white.png" class="logo-1"></a>
                    <a href="alhuda.co"><img src="../assets/img/brand/logo.png" class="logo-11"></a>
                    <a href="alhuda.co"><img src="../assets/img/brand/favicon-white.png" class="logo-2"></a>
                    <a href="alhuda.co"><img src="../assets/img/brand/favicon.png" class="logo-12"></a>
                </div>
            </div>
            <div class="main-header-right">
             
                <div class="nav nav-item  navbar-nav-right ml-auto">
                    <!-- Full Screen  -->
                    <div class="nav-item full-screen fullscreen-button" id="full-screen">
                        <a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logintoChange" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Enter Password To Exit Full screen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="exit_form" method="post">
                    <div class="modal-body">
                        <input type="password" class="form-control" autocomplete="off" id="passcode"
                            name="passcode" required="true" placeholder="Password">
                        

                    </div>


                    <div class="modal-footer" style="text-align: -webkit-right;">

                        <button class="btn btn-success" id="save" name="save" type="submit"><i
                                class="fa fa-undo"></i> Exit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--/Sidebar-right-->

    <!-- Footer opened -->

    <!-- Footer closed -->

    <!--- Back-to-top --->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!--- JQuery min js --->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!--- Bootstrap Bundle js --->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--- Ionicons js --->
    <script src="assets/plugins/ionicons/ionicons.js"></script>

    <!--- Moment js --->
    <script src="assets/plugins/moment/moment.js"></script>

    <!--- JQuery sparkline js --->
    <!-- <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> -->

    <!--- P-scroll js --->
    <!-- <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script> -->

    <!--- Eva-icons js --->
    <script src="assets/js/eva-icons.min.js"></script>

    <!--- Rating js --->
    <!-- <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="assets/plugins/rating/jquery.barrating.js"></script> -->

    <!--- Custom Scroll bar Js --->
    <!-- <script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script> -->

    <!--- Sidebar js --->
    <!-- <script src="assets/plugins/side-menu/sidemenu.js"></script> -->
    <!-- 
    - Right-sidebar js - -->
    <!-- <script src="assets/plugins/sidebar/sidebar.js"></script>
    <script src="assets/plugins/sidebar/sidebar-custom.js"></script> -->

    <!--- Index js --->
    <!-- <script src="assets/js/script.js"></script> -->

    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <!--- Custom js --->
    <!-- <script src="assets/js/custom.js"></script> -->

    <script src="assets/plugins/notify/js/notifIt.js"></script>

    <script src="models/member_registration.js"></script>
    <script>

    $("#global-loader").fadeOut("slow");
    </script>
</body>

</html>