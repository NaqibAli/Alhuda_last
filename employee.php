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
                    <li class="breadcrumb-item active" aria-current="page"> HRM Management</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-auto">

        </div>

    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <a href="employee">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <svg enable-background="new 0 0 438.891 438.891"
                                    class="mr-4 ht-60 wd-60 my-auto primary" version="1.1" viewBox="0 0 438.89 438.89"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z" />
                                    <path
                                        d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z" />
                                    <path
                                        d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                </svg>
                            </div>
                            <div class="project-content">
                                <h6>All Employees</h6>
                                <ul>
                                    <li>
                                        <strong>Total All Employees</strong>
                                        <span class="counter number-font mb-0" id="total_employee">00</span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <a href="employee">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <svg enable-background="new 0 0 438.891 438.891"
                                    class="mr-4 ht-60 wd-60 my-auto success" version="1.1" viewBox="0 0 438.89 438.89"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z" />
                                    <path
                                        d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z" />
                                    <path
                                        d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                </svg>
                            </div>
                            <div class="project-content">
                                <h6>Active Employee</h6>
                                <ul>
                                    <li>
                                        <strong>Total All Active Employee</strong>
                                        <span class="counter number-font mb-0" id="total_active_employee">00</span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <a href="employee">
                <div class="card overflow-hidden project-card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="my-auto">
                                <svg enable-background="new 0 0 438.891 438.891" class="mr-4 ht-60 wd-60 my-auto danger"
                                    version="1.1" viewBox="0 0 438.89 438.89" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z" />
                                    <path
                                        d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z" />
                                    <path
                                        d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                    <path
                                        d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z" />
                                    <path
                                        d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z" />
                                </svg>
                            </div>
                            <div class="project-content">
                                <h6>InActive Employee</h6>
                                <ul>
                                    <li>
                                        <strong>Total InActive Employee</strong>
                                        <span class="counter number-font mb-0" id="total_inactive_employee">00</span>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>
    <div class="row row-sm">
        <!-- Col -->

        <!-- Col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-2 mt-2 page">Employee Management & Information</h4> <i
                                class="mdi mdi-dots-horizontal text-gray"></i>
                            <p class="tx-12 text-muted mb-2">All Complete data of Employee information</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary"
                                data-toggle="collapse" href="#collapseExample" role="button">New Employee</a>

                        </div>
                    </div>




                </div>
                <div class="card-body">
                    <div class="collapse mg-t-5" id="collapseExample">

                        <form id="form" method="post" class="form-horizontal" data-parsley-validate="">
                            <input type="hidden" id="employee_id" name="employee_id">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Employee Name" id="name"
                                            name="name" required="true">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-label">Contacts <span class="tx-danger">*</span></label>
                                        <input type="number" class="form-control" name="tel" id="tel"
                                            placeholder="Contacts Name" required="true">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email Address">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
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
                                    <div class="form-group ">
                                        <label class="form-label">Address <span class="tx-danger">*</span></label>
                                        <input class="form-control" address_id="" list="addresses" autocomplete="off"
                                            id="address_id" name="address_id" placeholder="Choose Addresses">
                                        <datalist id="addresses">

                                        </datalist>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-label">Type <span class="tx-danger">*</span></label>
                                        <input class="form-control" emp_type_id="" list="emp_types" autocomplete="off"
                                            id="emp_type_id" name="emp_type_id" placeholder="Choose Employee Types">
                                        <datalist id="emp_types">

                                        </datalist>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-label">Created <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="date" id="user_date" name="user_date"
                                            required="true" value="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control m-select">
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-label">Photo</label>
                                        <input type="hidden" name="imgName" id="imgName">
                                        <input type="file" class="dropify" data-height="180" id="photo" name="photo" />

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
                        <table class="table text-md-nowrap" id="table">
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

    <!--- Fileuploads js --->
    <script src="assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

    <script src="assets/plugins/parsleyjs/parsley.min.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <script type="text/javascript" src="models/employee.js"></script>