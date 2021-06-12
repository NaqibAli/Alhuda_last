<?php
include "commons/head.php";
include "commons/sidebar.php";
include "commons/header.php";

?>
<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

<!-- Internal Data table css -->
<link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<!--- Internal  Notify --->
<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
<!-- container -->
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Family Report</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">

        </div>

    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row align-items-center mb-4 ">
                        <div class="col">
                            <div class="main-content-label">Family Report</div>
                        </div>
                    </div>
<form id='form'>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                        <div class="form-group overflow-hidden">
                                        <label class="form-label font-weight-bold">Filter By Family</label>
                                        <input class="form-control" family_id="" autocomplete="off" list="families" onfocus="this.select();"
                                            id="family_id" name="family_id" placeholder="Choose Family">
                                        <datalist id="families">

                                        </datalist>
                                    </div>
                        </div>
                    </div>
                    <div class="row mb-3 text-center">
                        <div class="col-12">
                        <button class="btn btn-success " type="submit"><i class="fa fa-save"></i> Generate</button>
                        <button class="btn btn-info " id="print" type="button"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div> <!-- /Col -->
        <!-- Col -->

    </div>



    <!-- Container closed -->



    <?php
include "commons/footer.php";

?>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugins/ionicons/ionicons/ionicons.z18qlu2u.js"></script>
    <script type="text/javascript" src="models/family_report.js"></script>