<?php
include ("commons/head.php");
include ("commons/sidebar.php");
include ("commons/header.php");


?>

<!--- Internal  Notify --->
<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
<!--- Internal Darggable css-->
<link href="assets/plugins/darggable/jquery-ui-darggable.css" rel="stylesheet">
<!-- container -->
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Module Management</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">

        </div>

    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">
        <!-- Col -->

        <!-- Col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-2 mt-2 page">Submenu Arraignments</h4> <i
                            class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <form id="form" method="post">
                        <div class="sortable">
                            <div class="row row-sm">
                                <div class="col-md-12" id="menu_arragment">


                                </div>

                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: -webkit-right;">

                            <button class="btn btn-success" id="save" name="save" type="submit"><i
                                    class="fa fa-save"></i> Save
                                Changes</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div> <!-- /Col -->

        <!-- Col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-2 mt-2 page">SideBar Information</h4> <i
                            class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="table">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>

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



    <!-- Container closed -->



    <?php
 include ("commons/footer.php");

?>


    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>

    <script type="text/javascript" src="models/submenu_arrangment.js"></script>

    <!--- Internal Darggable js --->
    <script src="assets/plugins/darggable/jquery-ui-darggable.min.js"></script>
    <script src="assets/plugins/darggable/darggable.js"></script>