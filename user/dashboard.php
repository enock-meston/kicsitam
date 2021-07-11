<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?>| Dashboard</title>
        <link rel="stylesheet" href="plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <link rel="shortcut icon" href="../imagess/logo.png" type="image/x-icon" />

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="#" class="logo"><span>KICS<span>Member</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--<span>-->
                    <!--<img src="assets/images/logo.png" alt="" height="30">-->
                    <!--</span>-->
                    <!--<i>-->
                    <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                    <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <?php include('includes/topheader.php'); ?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">KICSITAM</a>
                                        </li>
                                        <li>
                                            <a href="#">Assets</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- style="background-color: #f37020;color:white;" -->
                        <div class="row">
                            <!-- numbers of categories -->
                            <a href="manage-categories.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
                                            <?php $query = mysqli_query($con, "select * from tblcategory where Is_Active=1");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countcat); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a> <!-- end numbers of categories -->
                            <!-- end col -->

                            <!-- numbers of tools -->
                            <a href="manage-tools.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Asset Listed</p>
                                            <?php $query = mysqli_query($con, "select * from tbltools where ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end numbers of tools -->

                            <!-- trash tools -->
                            <a href="trash-tools.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Trash Asset Listed</p>
                                            <?php $query = mysqli_query($con, "select * from tbltools where ActiveStatus=0");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end trash tools -->



                            <!-- Student Pendind Request  -->
                            
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month">Student Pendind Request</p>
                                            <?php $query = mysqli_query($con, "select * from studentbookingtbl where ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                             <!-- end Student Pendind Request -->

                            <!-- Booking request -->
                            <a href="reply-student.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month"> Booking Request From Student</p>
                                            <?php $query = mysqli_query($con, "SELECT * from studentbookingtbl where studentbookingtbl.BookStatus=0 AND ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end Booking request -->


                            <!-- Asset to student -->
                            <a href="asset-from-student.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month">Asset Taken by Student</p>
                                            <?php $query = mysqli_query($con, "SELECT * from studentbookingtbl where studentbookingtbl.BookStatus=1 AND ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end Asset to student -->

                            <!-- ========== -->
                            <!--    STAFF -->
                            <!-- ========== -->

                            <!-- STAFF Pendind Request  -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month">Staff Pendind Request</p>
                                            <?php $query = mysqli_query($con, "select * from teacherbookingtbl where ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                             <!-- end STAFF Pendind Request -->

                            <!-- Booking request -->
                            <a href="reply-staff.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month"> Booking Request From Staff</p>
                                            <?php $query = mysqli_query($con, "SELECT * from teacherbookingtbl where teacherbookingtbl.BookStatus=0 AND ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end Booking request -->


                            <!-- Asset to STAFF -->
                            <a href="asset-from-staff.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month">Asset Taken by Staff</p>
                                            <?php $query = mysqli_query($con, "SELECT * from teacherbookingtbl where teacherbookingtbl.BookStatus=1 AND ActiveStatus=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end Asset to STAFF -->


                            <!-- === GUEST USER -->
                            <!-- =============== -->



                            <!-- Asset to STAFF -->
                            <a href="manage-guest.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="mdi mdi-layers widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary 
                                            text-overflow" title="User This Month">Guest Staff Listed</p>
                                            <?php $query = mysqli_query($con, "SELECT * from teachertbl where ActiveStatus=2");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2 style="color: #f37020;"><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </a> <!-- end Asset to STAFF -->
                        </div>
                        <!-- end row -->











                        <script>
                            var resizefunc = [];
                        </script>

                        <!-- jQuery  -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script src="assets/js/detect.js"></script>
                        <script src="assets/js/fastclick.js"></script>
                        <script src="assets/js/jquery.blockUI.js"></script>
                        <script src="assets/js/waves.js"></script>
                        <script src="assets/js/jquery.slimscroll.js"></script>
                        <script src="assets/js/jquery.scrollTo.min.js"></script>
                        <script src="plugins/switchery/switchery.min.js"></script>

                        <!-- Counter js  -->
                        <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
                        <script src="plugins/counterup/jquery.counterup.min.js"></script>

                        <!--Morris Chart-->
                        <script src="plugins/morris/morris.min.js"></script>
                        <script src="plugins/raphael/raphael-min.js"></script>

                        <!-- Dashboard init -->
                        <script src="assets/pages/jquery.dashboard.js"></script>

                        <!-- App js -->
                        <script src="assets/js/jquery.core.js"></script>
                        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>