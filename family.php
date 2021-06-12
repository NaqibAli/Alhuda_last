<?php
include "commons/head.php";
include "commons/sidebar.php";
include "commons/header.php";

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
                    <li class="breadcrumb-item active" aria-current="page"> Families Management</li>
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
                    <div class="row align-items-center">

                        <div class="col">
                            <div class="card-title">Families Management</div>
                            <p class="tx-12 text-muted mb-2">All Data of Family</p>
                        </div>
                        <div class="col">
                            <button type="button"
                                class="btn btn-success btn-rounded float-right clear-fix  mb-1 mb-md-0"
                                data-toggle="modal" id="btn_modle" onClick="$('#tbl-m1').removeClass('d-none');"
                                data-target="#model">
                                Add New Family</button>
                        </div>

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
        <!-- col end -->
    </div>


    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Create / Edit Family</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="family_id" name="family_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group overflow-hidden">
                                    <label>Family Name</label>
                                    <input type="text" class="form-control m-input" id="family_name" name="name"
                                        required="true" placeholder="Family Name">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Family Contact <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Family Contact"
                                        id="family_contact" name="family_contact">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Responsible <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Responsible" id="responsible"
                                        name="responsible">

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group overflow-hidden">
                                    <label>
                                        Date Register
                                    </label>
                                    <div class="input-group date">
                                        <input class="form-control" type="date" id="user_date" name="user_date"
                                            required="true" value="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive mt-3" id="tbl-m1">
                            <table id="Addmemberstbl" class="table table-bordered key-buttons text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>


                    </div>


                    <div class="modal-footer" style="text-align: -webkit-right;">

                        <button class="btn btn-success" id="save" name="save" type="submit"><i class="fa fa-save"></i>
                            Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade " id="addmember" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add members to Family</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="Addmemberform" method="post">
                    <div class="modal-body">
                        <label for="">Family Name</label>
                        <input class="form-control" disabled m_family_id="" autocomplete="off" id="m_family_ids"
                            name="family_ids" required="true">


                        <div class="table-responsive mt-3">
                            <table id="memberstbl" class="table table-bordered key-buttons text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="modal-footer" style="text-align: -webkit-right;">
                        <button class="btn btn-success" id="save" name="save" type="submit"
                            title="Add Selected Members To Group"><i class="fa fa-save"></i> Add To Family</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
include "commons/footer.php";

?>



    <!-- Internal Data tables -->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>



    <script type="text/javascript" src="models/family.js"></script>