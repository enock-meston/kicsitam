<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['tid']) == 0) {
    header('location:../login.php');
} else {

    // For adding post  
    if (isset($_POST['send'])) {
        $person = $_POST['person'];
        $helper = $_POST['helper'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $priority = $_POST['priority'];
        $description = addslashes($_POST['description']);
        $status = 1;

        $Date_chech = mysqli_query($con,"SELECT * FROM tichethelptbl WHERE ChoosedDate='$date' AND helper='$helper'");

        if (mysqli_num_rows($Date_chech) > 0) {
            $error = "Date is areald Taken.";
        } 
        else {
            $query = mysqli_query($con, "INSERT INTO `tichethelptbl`(`persontohelp`, `helper`, `priority`, `category`, `description`, `ChoosedDate`, `ActiveStatus`) 
        VALUES ('$person','$helper','$priority','$category','$description','$date','$status')");
            if ($query) {
                $msg = "New Ticket Submitted";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
        
    }
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
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?>| Ask Help</title>

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


    <body class="fixed-left">

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
                                    <h4 class="page-title">New Ticket </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Ticket</a>
                                        </li>
                                        <li>
                                            <a href="#">Ask help </a>
                                        </li>
                                        <li class="active">
                                            Ask help
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="POST">
                                            <div class="form-group m-b-20">
                                                <input type="hidden" name="person" value="<?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?>">
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Choose Helper</label>
                                                <select class="form-control" name="helper" id="category" onChange="getSubCat(this.value);" required>
                                                    <option value="">Select Helper </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = mysqli_query($con, "SELECT uid,Firstname,Lastname from usertbl where ActiveStatus=1");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['uid']); ?>"><?php echo htmlentities($result['Firstname']) . " " . htmlentities($result['Lastname']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Choose Date</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Choose Category</label>
                                                <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                                                    <option value="">Category </option>
                                                    <option value="email">Email</option>
                                                    <option value="hardware">Hardware</option>
                                                    <option value="software">Software</option>
                                                    <option value="network">Network</option>
                                                    <option value="other">Other</option>

                                                </select>
                                            </div>


                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Choose Priority</label>
                                                <select class="form-control" name="priority" id="category" onChange="getSubCat(this.value);" required>
                                                    <option value="">Priority </option>
                                                    <option value="low">Low</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="high">High</option>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>More Description</b></h4>
                                                        <textarea class="form-control" rows="5" cols="10" name="description" required></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="submit" name="send" class="btn btn-primary" value="Send">
                                            
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>


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