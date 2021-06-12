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
                    <li class="breadcrumb-item active" aria-current="page"> System Management</li>
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
                    <div class="mb-4 main-content-label">Setting Management</div>

                    <form id="form" method="post" class="form-horizontal">
                        <input type="hidden" id="menu_id" name="menu_id">
                        <div class="mb-4 main-content-label">Content</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Title" id="title" name="title"
                                        required="true">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Head</label>
                                    <input type="text" class="form-control" placeholder="Head" id="head" name="head"
                                        required="true">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-label">More Information</label>
                                    <textarea name="body" id="body" cols="30" rows="5" class="form-control"
                                        placeholder="Body"></textarea>

                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-label">Footer</label>
                                    <textarea name="footer" id="footer" cols="30" rows="3" class="form-control"
                                        placeholder="Footer"></textarea>

                                </div>

                            </div>

                        </div>
                        <div class="mb-4 main-content-label">Images</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Logo</label>
                                    <input type="hidden" name="logo_nature_h" id="logo_nature_h">
                                    <input type="file" class="dropify" data-height="180" id="logo_nature"
                                        name="logo_nature" accept="image/*"/>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Logo in White</label>
                                    <input type="hidden" name="logo_white_h" id="logo_white_h">
                                    <input type="file" class="dropify" data-height="180" id="logo_white"
                                        name="logo_white"  accept="image/*"/>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Fav Icon</label>
                                    <input type="hidden" name="fav_icon_nature_h" id="fav_icon_nature_h">
                                    <input type="file" class="dropify" data-height="180" id="fav_icon_nature"
                                        name="fav_icon_nature"  accept="image/*"/>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Fav Icon in White</label>
                                    <input type="hidden" name="fav_icon_white_h" id="fav_icon_white_h">
                                    <input type="file" class="dropify" data-height="180" id="fav_icon_white"
                                        name="fav_icon_white" accept="image/*" />
 
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Background 1</label>
                                    <input type="hidden" name="background1_h" id="background1_h">
                                    <input type="file" class="dropify" data-height="180" id="background1"
                                        name="background1" accept="image/*" />

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Background 2</label>
                                    <input type="hidden" name="background2_h" id="background2_h">
                                    <input type="file" class="dropify" data-height="180" id="background2"
                                        name="background2" accept="image/*"/>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Background 3</label>
                                    <input type="hidden" name="background3_h" id="background3_h">
                                    <input type="file" class="dropify" data-height="180" id="background3"
                                        name="background3" accept="image/*"/>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-label">Background 4</label>
                                    <input type="hidden" name="background4_h" id="background4_h">
                                    <input type="file" class="dropify" data-height="180" id="background4"
                                        name="background4" accept="image/*"/>

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
    <!--- Fileuploads js --->
    <script src="assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="assets/plugins/fileuploads/js/file-upload.js"></script>


    <script type="text/javascript" src="models/settings.js"></script>

