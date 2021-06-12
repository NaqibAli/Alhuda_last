<?php
include ("../commons/head.php");
include ("../commons/sidebar.php");
include ("../commons/header.php");


?>
<!-- Internal Data table css -->
<link href="../assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<!--- Internal  Notify --->
<link href="../assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

<!--- Internal Sweet-Alert css --->
<link href="../assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
<!-- container -->
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Service Management</li>
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
                        <div class="card-title">Recipt Preiview</div>
                        <div class="card-options">
                            <button type="button" class="btn btn-success float-right  mb-1 mb-md-0" id="print">
                                <i class=" fa fa-print"> </i> Print
                            </button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group overflow-hidden">
                                    <label>Choose Clients</label>
                                    <input class="form-control" client_id="" list="clients" autocomplete="off"
                                        id="client_id" name="client_id" required="true" placeholder="Choose Clients">
                                    <datalist id="clients">
                                    </datalist>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group overflow-hidden">
                                    <label>Choose Invoices</label>
                                    <input class="form-control" invoice_id="" list="invoices" autocomplete="off"
                                        id="invoice_id" name="invoice_id" required="true" placeholder="Choose Invoices">
                                    <datalist id="invoices">
                                    </datalist>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group overflow-hidden">
                                    <label>Choose Recipts</label>
                                    <input class="form-control" receipt_id="" list="receipts" autocomplete="off"
                                        id="receipt_id" name="receipt_id" required="true" placeholder="Choose Receipts">
                                    <datalist id="receipts">
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div id="print_area" style="background-color: #fff;">
                            <div class="row">
                                <div class="col-md-7 text-left mt-2">
                                    <img id="img-upload" src="../uploads/images/system/logo.png" style="width:50%;">
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <h1 style="font-weight: bolder;">RECIEPT<br>VOUCHER</h1>
                                </div>
                            </div>
                         
                            <div class="row m-1">
                                <div class="col-md-2 text-left">
                                    <h4>INV DATE: </h4>
                                    <h4>RV DATE: </h4> <br>
                                    <h4>RECEIVED: </h4>

                                </div>
                                <div class="col-md-4 text-left">

                                    <h4> <span id="invoice_date" class="pl-5 pr-5"
                                            style="background:#EF4263; color:#fff; font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                            > ___/____/____ </span> </h4>
                                    <h4> <span id="receipt_date" class="pl-5 pr-5"
                                            style="background:#EF4263; color:#fff; font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                            >  ___/____/____ </span> </h4> <br>
                                    <h4 id="customer"></h4>

                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-2 text-right">
                                    <h4>INV NO: </h4>
                                    <h4>RV NO: </h4> <br>
                                    <h4>TELEPHONE: </h4>

                                </div>
                                <div class="col-md-2 text-left">
                                    <h4> <span id="invoice_no" class="pl-5 pr-5"
                                            style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                            > INV </span> </h4>
                                    <h4> <span id="recipt_no" class="pl-5 pr-5"
                                            style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                            > RV </span> </h4> <br>
                                    <h4 style="font-weight:bolder" id="mobile"></h4>

                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="col-md-12 p-4"
                                    style="font-weight:bolder; border: 1px solid #EF4263;  text-align: center; margin-bottom: 15px;">
                                    <div class="row">


                                        <div class="col-md-3 text-right">
                                            <h6>TOTAL IN FIGURES</h6>
                                            <h6>AMOUNT IN FIGURES</h6>
                                            <h6>BALANCE IN FIGURES</h6>

                                        </div>
                                        <div class="col-md-2 text-left">
                                            <h6><span class="pl-5 pr-5"
                                                    style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="total_figures"> $ 522 </span></h6>
                                            <h6><span class="pl-5 pr-5"
                                                    style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="amount_figures"> $ </span></h6>
                                            <h6><span class="pl-5 pr-5"
                                                    style="background:#EF4263; color:#fff; font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="balance_figures"> $ </span></h6>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <h6>TOTAL IN WORDS</h6>
                                            <h6>AMOUNT IN WORDS</h6>
                                            <h6>BALANCE IN WORDS</h6>
                                        </div>
                                        <div class="col-md-4  text-left">
                                            <h6><span class="pl-5 pr-5"
                                                    style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="total_words">$</span></h6>
                                            <h6><span class="pl-5 pr-5"
                                                    style="font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="amount_words"> $ </span></h6>
                                            <h6><span class="pl-5 pr-5"
                                                    style="background:#EF4263; color:#fff; font-weight:bolder; border: 1px solid #EF4263; border-radius: 30px; text-align: center"
                                                    id="balance_words"> $ </span></h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row m-1">
                                <h3 class="ml-5 p-2 pr-5 pl-5"
                                    style="background:#3c3b59; color:#fff; font-weight:bolder; border: 1px solid #3c3b59; border-radius: 30px; text-align: center "
                                    id="">
                                    PAYMENT METHOD</h3>
                                <div class="col-md-12 "
                                    style="font-weight:bolder; border: 1px solid #EF4263;  text-align: center">
                                    <div class="row p-4">
                                        <div class="col-sm-4">
                                            <h4>CASH &nbsp; &nbsp;
                                                <label class="colorinput">
                                                    <input id ="ref_cash_color" name="color" type="checkbox" value="" class="colorinput-input"
                                                        >
                                                    <span  class="colorinput-color"
                                                        style="width: 40px;height: 30px;border-radius: 30px;
                                                        border: 1px solid #ef4263; color: #000; background-color: #EF4263;"></span>
                                                </label>
                                            </h4><br>
                                            <h4>REFERENCE CASH: <span style="text-decoration: underline;" class="ref_cash">__________</span></h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4>BANK &nbsp; &nbsp;
                                                <label class="colorinput">
                                                    <input id ="ref_bank_color" name="color" type="checkbox" value="" class="colorinput-input"
                                                        >
                                                    <span class="colorinput-color"
                                                        style="width: 40px;height: 30px;border-radius: 30px;
                                                        border: 1px solid #ef4263; color: #000; background-color: #EF4263;"></span>
                                                </label>
                                            </h4><br>
                                            <h4>REFERENCE BANK: <span style="text-decoration: underline;"class="ref_bank">__________</span></h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4>E-CASH &nbsp; &nbsp;
                                                <label class="colorinput">
                                                    <input id ="ref_no_color" name="color" type="checkbox" value="" class="colorinput-input"
                                                        >
                                                    <span class="colorinput-color"
                                                        style="width: 40px;height: 30px;border-radius: 30px;
                                                        border: 1px solid #ef4263; color: #000; background-color: #EF4263;"></span>
                                                </label>
                                            </h4><br>
                                            <h4>REFERENCE NO: <span style="text-decoration: underline;" class="ref_no">__________</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4 text-center mt-2">
                                    <h4>Finance Office: _______________ </h4>
                                    <img id="img-upload" src="../uploads/images/system/stamp.png" style="width:30%;">
                                   
                                </div>
                                <div class="col-md-4">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-1">
                                    <h4 style="font-style:italic">For any Queries related to this document, </h4>
                                    <h4 style="color:#EF4263;">Please Contact Us 0615 868999</h4>
                                </div>
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row closed -->
        </div>
        
    <!-- Container closed -->



    <?php
 include ("../commons/footer.php");

?>



 
<script type="text/javascript" src="../models/receipt_print.js"></script>
    <script type="text/javascript" src="../assets/js/numeral.js"></script>