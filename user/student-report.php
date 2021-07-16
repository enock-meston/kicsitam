<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {

    if (isset($_GET['action2'])) {
        $stid = intval($_GET['tid2']);
        $query = mysqli_query($con, "UPDATE studentbookingtbl set BookStatus=1 where bid='$stid'");
        
        if ($query) {
            $msg = " You say Yes ,Request was approved";
            // query of making student report
        $select1 = mysqli_query($con, "SELECT tbltools.id as tid,tblstudent.Firstname as fname,
        tblstudent.Lastname as lname,tblstudent.class as class,tblstudent.email as email,studentbookingtbl.bid as stboo,studentbookingtbl.studentOption as stuoption,
        tbltools.Toolname as toolname,studentbookingtbl.purpose as purpose,studentbookingtbl.BookedDate as bookeddate,
        studentbookingtbl.returnDate FROM tblstudent,tbltools LEFT JOIN studentbookingtbl ON studentbookingtbl.toolID=tbltools.id 
        WHERE studentbookingtbl.studentID=tblstudent.id AND studentbookingtbl.ActiveStatus=1 AND studentbookingtbl.BookStatus=0");
        $data = mysqli_fetch_array($select1);
        $names=$data['fname'] . "  " . $data['lname'];
        $calss=$data['class'];
        $option=$data['stuoption']; 
        $assetname=$data['toolname']; 
        $pur=$data['purpose']; 
        $bookDate=$data['bookeddate'];
        $returnDate=$data['returnDate'];
        // end of query of making student report
        
        // query of insertind data in database inside table called tblstudentreport
        $repotyQuery=mysqli_query($con,"INSERT INTO `tblstudentreport`(`studentnames`, `class`, `stuOption`, `Assetname`,
             `purpose`, `bookedDate`, `returnedDate`) VALUES ('$names','$calss','$option','$assetname','$pur','$bookDate','$returnDate')");
             header('location:reply-student.php');
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }

    else if (isset($_GET['action1'])) {
        $stid = intval($_GET['tid1']);
        $query = mysqli_query($con, "DELETE FROM `studentbookingtbl` WHERE `studentbookingtbl`.`bid` ='$stid'");
        if ($query) {
            $msg = "You say NO, Request was approved";
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
                                    <h4 class="page-title">Student Report</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Assets</a>
                                        </li>
                                        <li>
                                            <a href="#">Assets</a>
                                        </li>
                                        <li class="active">
                                        Student Assets
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
                                    <div class="table-responsive">
                                        <!-- export to excel -->
                                            <form method="post" action="excel-student-report.php">
                                                <button class="btn btn-success" name="export"> Print Report
                                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                                            </form>
                                    
                                        <table class="table table-colored table-centered table-inverse m-0" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Grade</th>
                                                    <th>Department</th>
                                                    <th>Booked Asset</th>
                                                    <th>Purpose</th>
                                                    <th>Date of Booking</th>
                                                    <th>Date of Returning</th>
                                                    <th>Confirmation date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    $page = $_GET['page2'];
                                                if ($page=="" || $page=="1") {
                                                    $page1=0;
                                                }else {
                                                    $page1= ($page*10)-10;
                                                }
                                                
                                                $query = mysqli_query($con, "SELECT `id`, `studentnames`, `class`,
                                                 `stuOption`, `Assetname`, `purpose`, `bookedDate`, `returnedDate`,
                                                  `ReportDate` FROM `tblstudentreport` LIMIT $page1,10");
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
                                                        <td><b><?php echo $row['studentnames']; ?></b></td>
                                                        <td><?php echo $row['class']; ?></td>
                                                        <td><?php echo $row['stuOption']; ?></td>
                                                        <td><?php echo $row['Assetname']; ?></td>
                                                        <td><?php echo $row['purpose']; ?></td>

                                                        <td style="background-color: #f37020;color:white;"><?php echo $row['bookedDate']; ?></td>
                                                        <td style="background-color: #f37020;color:white;"><?php echo $row['returnedDate']; ?></td>
                                                        <td><?php echo $row['ReportDate']; ?></td>
                                                    </tr>
                                            <?php }
                                                    } ?>

                                            </tbody>
                                        </table>
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT `id`, `studentnames`, `class`,
                                                 `stuOption`, `Assetname`, `purpose`, `bookedDate`, `returnedDate`,
                                                  `ReportDate` FROM `tblstudentreport`");
                                                $cou = mysqli_num_rows($query1);


                                                $a = $cou/10;
                                                $a=ceil($a);

                                                for ($b=1;$b<=$a;$b++) { 
                                                    ?>
                                                        <a href="student-report.php?page2=<?php echo $b;?>" class="btn btn-primary"
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