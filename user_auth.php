<?php
include ("commons/head.php");
include ("commons/sidebar.php");
include ("commons/header.php");


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
                    <li class="breadcrumb-item active" aria-current="page"> User Authority</li>
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
                    <div class="mb-4 main-content-label">User Authority</div>

                    <form id="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group overflow-hidden">
                                    <label>Select User</label>
                                    <input class="form-control" user_id="" autocomplete="off" list="users" id="user_id"
                                        name="user_id" required="true" placeholder="Choose Users">
                                    <datalist id="users">

                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-success"><i class="fa fa-save"></i> Generate</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>

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
 include ("commons/footer.php");

?>
 <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <script type="text/javascript" src="models/auth.js"></script>