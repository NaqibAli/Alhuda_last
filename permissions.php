<?php
include ("commons/head.php");
include ("commons/sidebar.php");
include ("commons/header.php");


?>
<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
<style>
fieldset {
    border: 1px solid #ddd !important;
    margin: 0;
    padding: 10px;
    position: relative;
    border-radius: 4px;
    background-color: #ffffff;
    padding-left: 10px !important;
}

legend {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 0px;
    width: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px 15px 5px 15px;
    background-color: #ffffff;
}
</style>
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
                    <li class="breadcrumb-item active" aria-current="page"> Permissions Management</li>
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
                    <div class="mb-4 main-content-label">Roles Management</div>

                    <form id="form" method="post" >
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group overflow-hidden">
                                    <label>Users</label>
                                    <input class="form-control" user_id="" autocomplete="off" list="users" id="user_id"
                                        name="user_id" required="true" placeholder="Choose Users">
                                    <datalist id="users">

                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <!-- <h4 class="text-center">User Permissions</h4> -->
                            </div>
                            <div class="panel-body">

                                <fieldset class="col-md-12 pb-5 custom-checkbox">
                                    <legend style="background-color: #dd3671;color: #fff;" >SYSTEM ROLES &nbsp; &nbsp; &nbsp; 
                                    <input type="checkbox" class="custom-control-input" id="check_all" name="check_all"> &nbsp; &nbsp;
                                        <label class="custom-control-label" for="check_all">CHECK ALL</label>
                                    </legend>

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="content_body" class="row" style="justify-content:center;">
                                                <fieldset class="col-md-2">
                                                    <legend>Admission</legend>

                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <ul style="list-style-type:none">
                                                                <li>Fieldset content...</li>
                                                                <li>Fieldset content...</li>
                                                                <li>Fieldset content...</li>
                                                                <li>Fieldset content...</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table id="table" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>

                                    </tr>
                                </thead>
                                <div class="">

                                </div>
                            </table>
                        </div>
                        <div class="modal-footer" style="text-align: -webkit-center;">

                            <button class="btn btn-success" id="save" name="save" type="submit"><i
                                    class="fa fa-save"></i> Save
                                Changes</button>
                        </div>
                    </form>

                </div>
            </div>

        </div> <!-- /Col -->
        <!-- Col -->

    </div>



    <!-- Container closed -->



    <?php
 include ("commons/footer.php");

?>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <script type="text/javascript" src="models/permissions.js"></script>