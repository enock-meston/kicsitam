<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['tid']) == 0) {
    header('location:../login.php');
} else {
    if (isset($_POST['submit'])) {
        $toolID = $_POST['toolid'];
        $teacherID = $_POST['teacherid'];
        $returnDate = $_POST['returning'];
        $option = $_POST['option'];
        $purpose = addslashes($_POST['purpose']);
        $status = 1;
        $bookstatus = 0;

        $query1 = mysqli_query($con, "INSERT INTO `teacherbookingtbl`(`toolID`, `teacherID`,`staffOption`,
         `purpose`,`returnDate`, `ActiveStatus`,`BookStatus`) 
        VALUES ('$toolID','$teacherID','$option','$purpose','$returnDate','$status','$bookstatus')");

        if ($query1) {
            $msg = "Your action of booking tool is Pending";
        } else {
            $error = "there is samething went wrong!";
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
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?> | Booking Asset</title>

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
        <script>
            function getSubCat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcategory.php",
                    data: 'catid=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }
        </script>
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
                                    <h4 class="page-title">Booking Asset </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Booking</a>
                                        </li>
                                        <li>
                                            <a href="#"> Booking </a>
                                        </li>
                                        <li class="active">
                                            Booking Asset
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

                        <?php
                        $book = intval($_GET['book']);
                        $query = mysqli_query($con, "select tbltools.id as toolid,tbltools.Toolname as name,
                        tbltools.ToolImage as image,tbltools.ToolDescription as ToolDescription,
                        tblcategory.CategoryName as category,tblcategory.c_id as cid
from tbltools left join tblcategory on tblcategory.c_id=tbltools.ToolCategory where 
tbltools.ActiveStatus=1 and tbltools.id='$book'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Tool Name</b></h4>
                                                        <p><?php echo htmlentities($row['name']); ?></p>
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Tool Category</b></h4>
                                                        <p><?php echo htmlentities($row['category']); ?></p>
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Tool Details</b></h4>
                                                        <p><?php echo htmlentities($row['ToolDescription']); ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Tool Image</b></h4>
                                                        <img src="../user/toolimages/<?php echo htmlentities($row['image']); ?>" width="300" />
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div> <!-- end p-20 -->
                                </div> <!-- end col -->





                            </div>
                            <!-- end row -->


                            <div class="row">
                                <div class="col-md-6">
                                    <form class="user" method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label class="form-group m-b-20">Date to return</label>
                                                            <input type="hidden" value="<?php echo $_SESSION['tid']; ?>" name="teacherid">
                                                            <input type="hidden" value="<?php echo htmlentities($row['toolid']); ?>" name="toolid">
                                                            <input type="date" class="form-control" value="" name="returning" required>
                                                        </div>


                                                    <?php } ?>
                                                    </div>
                                                    <!--  -->

                                                    <label class="form-group m-b-20">Select your Option</label>

                                                    <select name="option" class="form-control" id="exampleInputEmail">
                                                        <option>Select Option</option>
                                                        <option value="primary">primary</option>
                                                        <option value="secondary">Secondary</option>

                                                    </select>


                                                    <label class="col-md-2 control-label">Purpose:</label>
                                                    <textarea class="form-control" rows="5" cols="10" name="purpose" required></textarea>

                                                    <label class="col-md-2 control-label">&nbsp;</label><br>

                                                    <input type="submit" class="btn btn-custom" value="Submit" name="submit">

                                                </div>
                                            </div>

                                        </div>
                                </div>
                                </form>
                            </div>


                    </div>




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
<?php } ?>