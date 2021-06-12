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
                    <li class="breadcrumb-item active" aria-current="page">Member Information</li>
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
                            <div class="main-content-label">Search Member</div> <i class="fe fe-setting"></i>
                        </div>
                    
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group overflow-hidden">
                                <label>Members</label>
                                <input class="form-control" onfocus="this.select();" member_id="" autocomplete="off" list="members"
                                    id="member_id" name="member_id" required="true" placeholder="Choose Member">
                                <datalist id="members">

                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-card" id="indidual_data">
                        <div class="card-body">
                            <div id="indivual" class="d-none">
                            <div class="header-info text-center">
                            <div class="user-lock text-center">
									<img alt="avatar" class="rounded-circle" src="assets/img/defaultt.png" id="member-img">
								</div>
                             <h3 class="mb-5 mt-3 card-title text-primary" id="full_name">Member Full Name</h3>
                            </div>
                               
                                <div class="row mb-5">
                                    <div class="col">
                                        <h6 class=""><i class="las la-id-badge fa-2x align-middle mr-1"></i> Member ID</h6>
                                        <p id="m_id"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-user-check fa-2x align-middle mr-1"></i> Gender</h6>
                                        <p id="gender"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-id-card fa-2x align-middle mr-1"></i> National ID number</h6>
                                        <p id="national_id"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-phone fa-2x align-middle mr-1"></i> Phone</h6>
                                        <p id="phone"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-envelope fa-2x align-middle mr-1"></i> Email</h6>
                                        <p id="email"></p>
                                    </div>

                                </div>
                                <div class="row ">
                                <div class="col">
                                        <h6 class=""><i class="las la-user-tag fa-2x align-middle mr-1"></i> Member Type</h6>
                                        <p id="type"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-map-marker fa-2x align-middle mr-1"></i> Address</h6>
                                        <p id="address"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-calendar fa-2x align-middle mr-1"></i> Regestred Date</h6>
                                        <p id="r_date"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class=""><i class="las la-calendar fa-2x align-middle mr-1"></i> Last Modified Date</h6>
                                        <p id="m_date"></p>
                                    </div>
                                    <div class="col">
                                        <h6 class="font-weight-bold"><i class="las la-toggle-off fa-2x align-middle mr-1"></i> Status</h6>
                                        <p id="status"></p>
                                    </div>
                                </div>
                            </div>
                            <div id="family" class="d-none">
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered table-hover" id="family_table">
                                        <thead class="text-center thead-light">
                                            <tr>
                                                <th>Full Name</th>
                                                <th>National ID</th>
                                                <th>Tell</th>
                                                <th>Registered Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cus" aria-multiselectable="true" class="accordion" id="accordion">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- /Col -->
        <!-- Col -->

    </div>

    <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Select Columns</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form action="#" id="select_col">
                <div class="modal-body p-5">
                   
                        <div class="custom-checkbox bg-succes">
                           <input class="custom-control-input" type="checkbox" name="check_all"
                                    id="check_all" /> <label class="custom-control-label" for="check_all">Select
                                    All</label>
                        </div>
                        <table id='checkboxs' class="table table-bordered">
                            <tbody></tbody>
                        </table>
                        <div class="" id="colum-group">

                        </div>
                   


                </div>


                <div class="modal-footer" style="text-align: -webkit-right;">

                    <button class="btn btn-success" id="save" name="save" type="submit"><i class="fa fa-save"></i> Save </button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Container closed -->



    <?php
 include ("commons/footer.php");

?>

    <!--- Internal Notify js --->
    <script src="assets/plugins/notify/js/notifIt.js"></script>
    <!--- Internal Sweet-Alert js --->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugins/ionicons/ionicons/ionicons.z18qlu2u.js"></script>
    <script type="text/javascript" src="models/member_info.js"></script>