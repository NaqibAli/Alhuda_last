<?php
include("commons/head.php");
include("commons/sidebar.php");
include("commons/header.php");


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
                    <li class="breadcrumb-item active" aria-current="page"> User Management</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">

        </div>

    </div>
    <!-- /breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Manage Users</div>
                    <div class="card-options">
                        <button type="button" class="btn btn-success float-right  mb-1 mb-md-0" data-toggle="modal" id="btn_modle" data-target="#model">
                            <i class=" fa fa-plus-circle"> </i> Add New Users
                        </button>

                    </div>




                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered key-buttons text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div><!-- col end -->
    </div>


    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Create / Edit Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" method="post">
                    <div class="modal-body">



                        <input type="hidden" id="user_id" name="user_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group overflow-hidden">
                                    <label>Employee</label>
                                    <input class="form-control" employee_id="" list="employees" autocomplete="off" id="employee_id" name="employee_id" required="true" placeholder="Choose Employees">
                                    <datalist id="employees">

                                    </datalist>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Username</label>
                                    <input type="username" class="form-control m-input" id="username" name="username" required="true" placeholder="Username">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Password</label>
                                    <input type="password" class="form-control m-input" id="password" name="password" required="true" placeholder="Password">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Usertype</label>
                                    <select name="user_type" id="user_type" class="form-control m-select">
                                        <option value="Admin">Admin</option>
                                        <option value="User" selected> User</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control m-select">
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group overflow-hidden">
                                    <label>
                                        Date Register
                                    </label>
                                    <div class="input-group date">
                                        <input class="form-control" type="date" id="user_date" name="user_date" required="true" value="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="modal-footer" style="text-align: -webkit-right;">

                        <button class="btn btn-success" id="save" name="save" type="submit"><i class="fa fa-save"></i> Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    include("commons/footer.php");

    ?>



    <!-- Internal Data tables -->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>



    <script type="text/javascript" src="models/users.js"></script>