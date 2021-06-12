<?php
include ("commons/head.php");
include ("commons/sidebar.php");
include ("commons/header.php");


?>

<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Default Dashboard</li>
                </ol>
            </nav>
        </div>


    </div>
    <!-- /breadcrumb -->
    <!-- main-content-body -->
    <div class="main-content-body">
        <div class="row row-sm">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <a href="members">
                    <div class="card overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <svg enable-background="new 0 0 438.891 438.891"
                                        class="mr-4 ht-60 wd-60 my-auto primary" version="1.1"
                                        viewBox="0 0 438.89 438.89" xml:space="preserve"
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
                                    <h6>All Members</h6>
                                    <ul>
                                        <li>
                                            <strong>Total Members</strong>
                                            <span id="all_members">00</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <a href="family">
                    <div class="card  overflow-hidden project-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="my-auto">
                                    <svg enable-background="new 0 0 438.891 438.891"
                                        class="mr-4 ht-60 wd-60 my-auto success" version="1.1"
                                        viewBox="0 0 438.89 438.89" xml:space="preserve"
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
                                    <h6>All Families</h6>
                                    <ul>
                                        <li>
                                            <strong>Total Families</strong>
                                            <span id="all_family">00</span>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- row -->

        <!-- /row -->


        <!-- row -->
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card mg-b-md-20 overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Members Status
                        </div>
                        <p class="mg-b-20">Active - Moved - Deseaded - Disbuted Members</p>
                        <div class="chartjs-wrapper-demo" style="height:100%">
                            <canvas id="member_status"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->

            <!-- col-6 -->
            <div class="col-sm-12 col-md-6">
                <div class="card mg-b-md-20 overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Family or Individual Members
                        </div>
                        <p class="mg-b-20">Individual / Family Members</p>
                        <div class="chartjs-wrapper-demo" style="height:100%">
                            <canvas id="members_types"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- col-6 -->


        </div>
        <!-- /row -->
        <div class="row row-sm">


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card overflow-hidden">
                    <div class="card-body pb-3">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-10">Latest 10 Members</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <div class="table-responsive mb-0 projects-stat tx-14">
                            <table id="table_10_members"
                                class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap  ">
                                <thead>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row row-sm">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card overflow-hidden">
                    <div class="card-body pb-3">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-20">Family and Total Members</h4>

                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <div class="table-responsive mb-0 projects-stat tx-14">
                            <table id="family_members"
                                class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap">
                                <thead>
                                    <tr>
                                        <th>Family Name</th>
                                        <th>Total Members</th>
                                        <th>Registerd Date</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->

        <!-- /row -->


        <!-- row -->

    </div>
    <!-- /row -->



    <!-- Container closed -->


    <?php
 include ("commons/footer.php");

?>


    <script type="text/javascript" src="models/dashboard.js"></script>
    <script src="assets/Chart.bundle.js"></script>