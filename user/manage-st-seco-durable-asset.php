<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "UPDATE durable_student_Asset set Active_Status=0 where did='$postid'");
        if ($query) {
            $msg = "Tool deleted ";
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
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?> | Manage Tools</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>


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
                                    <h4 class="page-title">Manage Tools </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Tools</a>
                                        </li>
                                        <li>
                                            <a href="#">Tools</a>
                                        </li>
                                        <li class="active">
                                            Manage Tools
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                <!-- export to excel -->
                                            <form method="post" action="qrcode-report.php">
                                                <button class="btn btn-success" name="export"> Print Qr Code
                                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                                            </form><br>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0" style="width: 100%;" border="1">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Serial Number</th>
                                                    <th>Comment</th>
                                                    <th>Image</th>
                                                    <th>QR Code</th>
                                                    <th>Student Name</th>
                                                    <th>Mac Address</th>
                                                    <th>Action Date</th>
                                                    <th>Returning Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $page = $_GET['page'];
                                                if ($page=="" || $page=="1") {
                                                    $page1=0;
                                                }else {
                                                    $page1= ($page*7)-7;
                                                }
                                                $query = mysqli_query($con, "SELECT durable_student_Asset.did as did,durable_student_Asset.assetname 
                                                AS assetname,durable_student_Asset.ToolImage as ToolImage,durable_student_Asset.serialNumber AS serialNumber,
                                                durable_student_Asset.studentID as studentID,durable_student_Asset.MAC_adress as MAC_Adress,durable_student_Asset.Comment1 as comment,
                                                durable_student_Asset.QRCode as QRCode,durable_student_Asset.QRCodeImage AS QRCodeImage,
                                                durable_student_Asset.PostedDate as PostedDate,durable_student_Asset.returningDate as returningDate,
                                                tblstudent.Firstname as FirstName,tblstudent.Lastname as LastNmae FROM
                                                 durable_student_Asset LEFT JOIN tblstudent on tblstudent.id=durable_student_Asset.studentID 
                                                 WHERE durable_student_Asset.Active_Status=1 AND durable_student_Asset.AssetType='Laptop' LIMIT $page1,7");
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>

                                                        <td colspan="4" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                    } else {
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                    <tr>
                                                        <td><b><?php echo htmlentities($row['assetname']); ?></b></td>
                                                        <td><?php echo htmlentities($row['serialNumber']) ?></td>
                                                        <td><?php echo htmlentities($row['comment']) ?></td>
                                                        <td style="width: 20px;"><b>
                                                                <img src="toolimages/<?php echo $row['ToolImage']; ?>" alt="" style="width: 100%;">
                                                            </b></td>
                                                             <td style="width: 10%;">
                                                              <a href="<?php echo $row['QRCodeImage'];?>">
                                                                <img src="<?php echo $row['QRCodeImage'];?>" alt="" style="width: 50%;">
                                                              </a>
                                                            </td>
                                                        <td style="width: 20%;"><?php echo htmlentities($row['FirstName'])." ".htmlentities($row['LastNmae']); ?></td>
                                                         <td style="width: 20%;"><?php echo htmlentities($row['MAC_Adress']); ?></td>
                                                        <td><b><?php echo htmlentities($row['PostedDate']); ?></b></td>
                                                        <td><?php echo htmlentities($row['returningDate']) ;?></td>

                                                        <td><a href="edit-durable-student.php?pid=<?php echo htmlentities($row['did']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                            &nbsp;<a href="manage-st-durable-asset.php?pid=<?php echo htmlentities($row['did']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">
                                                                <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                    </tr>
                                            <?php }
                                                    } ?>

                                            </tbody>
                                        </table>
                                        <!-- this is for counting number of page -->
                                    <?php
                                        $query1 = mysqli_query($con, "SELECT durable_student_Asset.did as did,durable_student_Asset.assetname 
                                                AS assetname,durable_student_Asset.ToolImage as ToolImage,durable_student_Asset.serialNumber AS serialNumber,
                                                durable_student_Asset.studentID as studentID,durable_student_Asset.MAC_adress as MAC_Adress,durable_student_Asset.Comment1 as comment,
                                                durable_student_Asset.QRCode as QRCode,durable_student_Asset.QRCodeImage AS QRCodeImage,
                                                durable_student_Asset.PostedDate as PostedDate,durable_student_Asset.returningDate as returningDate,
                                                tblstudent.Firstname as FirstName,tblstudent.Lastname as LastNmae FROM
                                                 durable_student_Asset LEFT JOIN tblstudent on tblstudent.id=durable_student_Asset.studentID 
                                                 WHERE durable_student_Asset.Active_Status=1 AND durable_student_Asset.AssetType='Laptop'");
                                                $cou = mysqli_num_rows($query1);

                                                $a = $cou/7;
                                                $a=ceil($a);

                                                for ($b=1;$b<=$a;$b++) { 
                                                    ?>
                                                        <a href="manage-st-durable-asset.php?page=<?php echo $b;?>" class="btn btn-primary"
                                                        style="text-decoration:none;"><?php echo $b."  ";?></a>
                                                    <?php
                                                }

                                    ?>
                                    </div>
                                </div>
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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>