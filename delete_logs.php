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
            <h4 class="content-title mb-2">Hi, <?php if(isset($_SESSION['jst_username'])) echo $_SESSION['jst_name']; ?></h4>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 text-white">
                    <li class="breadcrumb-item text-white">Home</li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Members Logs</li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Delete Logs</li>
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
                            <h4 class="card-title mg-b-2 mt-2 page">Members Delete Logs Report</h4>
                        </div>
                       

                    </div>
                </div>
                <div class="card-body">
                    <div class="mg-t-5 mb-4">

                        <form id="form" method="post" class="form-horizontal" data-parsley-validate="">

                           
                            <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group overflow-hidden">
                                        <label class="form-label font-weight-bold">Filter By User</label>
                                        <input class="form-control" user_id="" autocomplete="off" list="users"
                                            id="user_id" name="user_id" placeholder="Choose User">
                                        <datalist id="users">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label font-weight-bold">Filter By Date</label>
                                        <select name="date_type" id="date_type" class="form-control m-select">
                                            <option value="all">All</option>
                                            <option value="custom">Custom</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label font-weight-bold">Start Date</label>
                                        <input disabled class="form-control" type="date" id="from_date" name="user_date"
                                            value="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="form-label font-weight-bold">End Date</label>
                                        <input disabled class="form-control" type="date" id="to_date" name="user_date"
                                            value="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success " id="save" name="save" type="submit"><i
                                            class="fa fa-save"></i> &nbsp; Generate</button>
                                </div>
                            </div>

                        </form>

                    </div>
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
    </div>



    <!-- Container closed -->



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
    <script src="assets/js/form-validation.js"></script>
    <script type="text/javascript" src="models/deletelog.js"></script>