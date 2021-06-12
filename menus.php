<?php
include ("commons/head.php");
include ("commons/sidebar.php");
include ("commons/header.php");


?>
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-2 mt-2 page">Menu Management & Information</h4> <i
                                    class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 text-muted mb-2">All Complete data of Menu Management & information</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary"
                                data-toggle="collapse" href="#collapse_menu" role="button">Add Menu</a>

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="collapse mg-t-5" id="collapse_menu">
                        
                            <form id="form_menu" method="post" class="form-horizontal">
                                <input type="hidden" id="menu_id" name="menu_id">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3"> <label class="form-label">Menu Name</label> </div>
                                        <div class="col-md-9"> <input type="text" class="form-control"
                                                placeholder="Menu Name" id="name" name="name" required="true"> </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3"> <label class="form-label">Module</label> </div>
                                        <div class="col-md-9"> <input type="text" class="form-control"
                                                placeholder="Module Name" value="Admission" id="module" name="module"
                                                required="true"> </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3"> <label class="form-label">Icon</label> </div>
                                        <div class="col-md-9"> <input type="text" class="form-control"
                                                placeholder="Icons eg fa-user" value="fa-home" id="icon" name="icon">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-info" id="save" name="save" type="submit"><i
                                                class="fa fa-save"></i> Save
                                            Changes</button>
                                    </div>
                                </div>

                            </form>
                       
                    </div>

                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="table_menu">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- /Col -->
        <!-- Col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-2 mt-2 page">SubMenu Management & Information</h4> <i
                                    class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 text-muted mb-2">All Complete data of SubMenu Management & information</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary"
                                data-toggle="collapse" href="#collapse_submenu" role="button"> Add SubMenu</a>

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="collapse mg-t-5" id="collapse_submenu">
                        
                    <form id="form_submenu" method="post" class="form-horizontal">
                        <input type="hidden" id="submenu_id" name="submenu_id">
                       <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3"> <label class="form-label">Name</label> </div>
                                <div class="col-md-9"> <input type="text" class="form-control"
                                        placeholder="SubMenu Name" id="menu_name" name="menu_name" required="true"> </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3"> <label class="form-label">Link</label> </div>
                                <div class="col-md-9"> <input type="text" class="form-control" id="link" name="link"
                                        required="true" placeholder="Link"> </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3"> <label class="form-label">Choose Menu</label> </div>
                                <div class="col-md-9"> <input class="form-control" menus_id="" list="menus"
                                        autocomplete="off" id="menus_id" name="menus_id" required="true"
                                        placeholder="Choose Menus">
                                    <datalist id="menus">

                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-info" id="save" name="save" type="submit"><i
                                        class="fa fa-save"></i> Save
                                    Changes</button>
                            </div>
                        </div>

                    </form>
                       
                    </div>

                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="table_submenu">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>

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
 include ("commons/footer.php");

?>

    <!-- Internal Data tables -->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>


    <script type="text/javascript" src="models/menus.js"></script>