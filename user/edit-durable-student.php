<?php
session_start();
include("phpqrcode/qrlib.php");
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $posttitle = addslashes($_POST['toolname']);
        $studentid = $_POST['studentID'];
        $serial=$_POST['serial'];
        $MacAddress =$_POST['MacAddress'];
        $comment=addslashes($_POST['comment']);
        $AssetType=$_POST['assettype'];
        $returingdate = addslashes($_POST['returingdate']);
        // qrcode update 
        //qrpath
        $qrpath='img/';
        $file=$qrpath.$_POST['serial'].'.png';    // is path and name of qr code in the database
        // qrname`
        $qrkey=$serial." - ".$studentid;   // is serial_number in database
        Qrcode::png($qrkey,$file);
        // end of qrcode update
        $status = 1;
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "UPDATE `durable_student_Asset` SET `assetname`='$posttitle ',`AssetType`='$AssetType',
        `serialNumber`='$serial',`studentID`='$studentid ',`MAC_Adress`='$MacAddress',`Comment1`='$comment',`QRCode`='$qrkey',
        `QRCodeImage`='$file',`returningDate`='$returingdate' WHERE did='$postid'");
        if ($query) {
            $msg = "Tool updated ";
            
        } else {
            $error = "Something went wrong . Please try again.";
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
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?> | Edit Tool</title>

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
                                    <h4 class="page-title">Edit Asset </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Asset</a>
                                        </li>
                                        <li>
                                            <a href="#"> Asset </a>
                                        </li>
                                        <li class="active">
                                            Edit Asset
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
                        $postid = intval($_GET['pid']);
                        $query = mysqli_query($con, "SELECT durable_student_Asset.did as did,durable_student_Asset.assetname 
                                                AS assetname,durable_student_Asset.ToolImage as ToolImage,durable_student_Asset.serialNumber AS serialNumber,
                                                durable_student_Asset.studentID as studentID,durable_student_Asset.MAC_adress as MAC_Adress,durable_student_Asset.Comment1 as comment,
                                                durable_student_Asset.QRCode as QRCode,durable_student_Asset.QRCodeImage AS QRCodeImage,
                                                durable_student_Asset.PostedDate as PostedDate,durable_student_Asset.returningDate as returningDate,
                                                tblstudent.Firstname as FirstName,tblstudent.Lastname as LastNmae FROM
                                                 durable_student_Asset LEFT JOIN tblstudent on tblstudent.id=durable_student_Asset.studentID 
                                                 WHERE durable_student_Asset.Active_Status=1 AND durable_student_Asset.did='$postid'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form name="addpost" method="post">
                                                <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Asset Name </label>
                                                <input type="text" class="form-control" id="posttitle" name="toolname" value="<?php echo htmlentities($row['assetname']); ?>">
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Serial Number</label>
                                                <input type="text" class="form-control" id="posttitle" name="serial" value="<?php echo htmlentities($row['serialNumber']); ?>">
                                            </div>
                                            
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1"> Asset Type</label>
                                                <select class="form-control" name="assettype" id="posttitle">
                                                    <option>Select Asset Type</option>
                                                    <option value="iPad">iPad</option>
                                                    <option value="Laptop">Laptop</option>
                                                </select>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Mac Address</label>
                                                <input type="text" class="form-control" id="posttitle" name="MacAddress" value="<?php echo htmlentities($row['MAC_Adress']); ?>"> 
                                            </div>

                                            

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Select Student</label>
                                                <select class="form-control" name="studentID" id="category" onChange="getSubCat(this.value);">
                                                    <option value="">Select Student </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = mysqli_query($con, "SELECT * from  tblstudent where Active_Status=1");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['Firstname'])." ". htmlentities($result['Lastname']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Returning Date</label>
                                                <input type="Date" class="form-control" id="posttitle" value="<?php echo htmlentities($row['returningDate']); ?>" name="returingdate">
                                            </div>
                                            
                                               <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Comment</b></h4>
                                                        <input class="form-control" type="text" name="comment" value="<?php echo htmlentities($row['comment']); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                                                            <img src="toolimages/<?php echo htmlentities($row['ToolImage']); ?>" width="300" />
                                                            <br />
                                                            <!--<a href="change-image.php?pid=<?php echo htmlentities($row['toolid']); ?>">Update Image</a>-->
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>

                                            <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>

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
<?php } ?>