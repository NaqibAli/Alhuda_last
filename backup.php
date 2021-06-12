<?php
include "commons/head.php";
include "commons/sidebar.php";
include "commons/header.php";
include "commons/datatable_links.php";

?>


<!-- Internal Data table css -->
<link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<!--- Internal  Notify --->
<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

<!--- Internal Fileupload css --->
<link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />

<!--- Internal Fancy uploader css --->
<link href="assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
<!-- container -->
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">backup</li>
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
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-2 mt-2 page">Database Backup</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a data-href="http://alhuda.co/commons/backup/backup.php" class="btn btn-success text-white" data-toggle="modal" id="btn_modle" data-target="#model"><i class="fa fa-cloud-download-alt"></i> New Backup </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="mg-t-5 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year" id="year" class="SlectBox form-control SumoUnder">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Months</label>
                                    <select name="month" id="month" class="SlectBox form-control SumoUnder">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="wd-5p">No</th>
                                    <th class="wd-15p">Backup File Name</th>
                                    <th class="wd-15p text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- /Col -->
    </div>
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Backup Process</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" method="post">
                    <div class="modal-body">

                    </div>

                    <!-- <div class="modal-footer" style="text-align: -webkit-right;">

                        <a data-href="http://alhuda.co/commons/backup/backup.php" class="btn btn-primary text-white" id="save" name="save" type="submit"><i class="fa fa-save"></i> Backup</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <?php
    include "commons/footer.php";
    include "commons/datatable_scripts.php";
    ?>




    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <!--- Fileuploads js --->
    <script src="assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

    <script src="assets/plugins/parsleyjs/parsley.min.js"></script>
    <!-- <script src="assets/js/form-validation.js"></script> -->

    <script type="text/javascript" src="models/backup.js"></script>

    <script defer>
        var ModelPopup = $('#model');

        $("#btn_modle").on("click", function() {
            var dataURL = $(this).attr('data-href');
            $('.modal-body').load(dataURL, function() {
                ModelPopup.modal('show')
                loadfiles();
            });;
        });
    </script>