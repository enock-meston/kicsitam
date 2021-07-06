<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:../login.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Category -<?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?></title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
    </head>

    <body class="fixed-left" style="background-color: rgba(255, 255, 128, .2);">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
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
                                    <h4 style="color: #f37020;" class="page-title"><?php echo $_SESSION['fn'] . " " . $_SESSION['ln'] . " "; ?>
                                        - Welcome to Student Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">KICSITAM</a>
                                        </li>
                                        <li>
                                            <a href="#">Tools</a>
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
                        <div class="row">
                            <?php
                                $query= mysqli_query($con,"SELECT * FROM tblcategory");
                                while ($row= mysqli_fetch_array($query)) {
                                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <img class="card-img-top" src="logo/category_736999.png" 
                                    alt="Card image" style="width:50%;height: 90px;">
                                    <h4 class="card-title"><?php echo $row['CategoryName'];?></h4>
                                    <p class="card-text"><?php echo $row['Description'];?></p>
                                    <a href="view-asset.php?view=<?php echo $row['c_id'];?>" class="btn" style="background-color: #2d2b7e; color:aliceblue">View Assets</a>
                                </div>
                            </div>
                            <!-- end col -->
                            <?php
                                }
                            ?>
                        </div>
                        <!-- end row -->
                        <!-- ============================================================== -->
                        <!-- End Right content here -->
                        <!-- ============================================================== -->


                    </div>
                    <!-- END wrapper -->


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
                    <script src="../plugins/switchery/switchery.min.js"></script>

                    <!--Summernote js-->
                    <script src="../plugins/summernote/summernote.min.js"></script>
                    <!-- Select 2 -->
                    <script src="../plugins/select2/js/select2.min.js"></script>
                    <!-- Jquery filer js -->
                    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

                    <!-- page specific js -->
                    <script src="assets/pages/jquery.blog-add.init.js"></script>

                    <!-- App js -->
                    <script src="assets/js/jquery.core.js"></script>
                    <script src="assets/js/jquery.app.js"></script>

                    <script>
                        jQuery(document).ready(function() {

                            $('.summernote').summernote({
                                height: 240, // set editor height
                                minHeight: null, // set minimum height of editor
                                maxHeight: null, // set maximum height of editor
                                focus: false // set focus to editable area after initializing summernote
                            });
                            // Select2
                            $(".select2").select2();

                            $(".select2-limiting").select2({
                                maximumSelectionLength: 2
                            });
                        });
                    </script>
                    <script src="../plugins/switchery/switchery.min.js"></script>

                    <!--Summernote js-->
                    <script src="../plugins/summernote/summernote.min.js"></script>




    </body>

    </html>

<?php
}
?>