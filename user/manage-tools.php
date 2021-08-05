<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update tbltools set ActiveStatus=0 where id='$postid'");
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
                                            </form>
                                            <br>
<!-- Search Widget -->



          <div class="card-box">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                   <form name="search" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit" name="search">Go</button>
                </span>
              </form>
              </div>
            </div>
                      <!-- endd   Search Widget --> 

                      <br>             
                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0" style="width: 100%;" border="1">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Image</th>
                                                    <th>QR Code</th>
                                                    <th>Serial Number</th>
                                                    <th>Allowed</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                            
                                     if (isset($_POST['search'])) {
                             # code...

                                    $search= mysqli_real_escape_string($con,$_POST['searchtitle']);

                                                $page = $_GET['page'];
                                                if ($page=="" || $page=="1") {
                                                    $page1=0;
                                                }else {
                                                    $page1= ($page*90)-90;
                                                }
                                                $query = mysqli_query($con, "SELECT tbltools.id as toolid,tbltools.Toolname as name,
                                                tbltools.ToolImage as image,tbltools.serial_number as serialnumber,tbltools.QRimage as QRimage,
                                                tbltools.ToolDescription as ToolDescription,
                                                tbltools.isAllowedBy as allowed,tblcategory.CategoryName as category 
                                                from tbltools left join tblcategory on tblcategory.c_id=tbltools.ToolCategory 
                                                WHERE tblcategory.CategoryName LIKE '%$search%' OR tbltools.Toolname LIKE '%$search%' OR
                                                 tbltools.serial_number LIKE '%$search%' AND tbltools.ActiveStatus=1 
                                                 ORDER BY tbltools.Toolname ASC  LIMIT $page1,90");
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
                                                        <td><b><?php echo htmlentities($row['name']); ?></b></td>
                                                        <td><?php echo htmlentities($row['category']) ?></td>
                                                        <td style="width: 20px;"><b>
                                                                <img src="toolimages/<?php echo $row['image']; ?>" alt="" style="width: 100%;">
                                                            </b></td>
                                                             <td style="width: 10%;">
                                                              <a href="<?php echo $row['QRimage'];?>">
                                                                <img src="<?php echo $row['QRimage'];?>" alt="" style="width: 50%;">
                                                              </a>
                                                            </td>
                                                        <td style="width: 20%;"><?php echo htmlentities($row['serialnumber']); ?></td>
                                                        <td><b><?php echo htmlentities($row['allowed']); ?></b></td>
                                                        <td><?php echo htmlentities($row['ToolDescription']) ;?></td>

                                                        <td><a href="edit-tool.php?pid=<?php echo htmlentities($row['toolid']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                            &nbsp;<a href="manage-tools.php?pid=<?php echo htmlentities($row['toolid']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">
                                                                <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                    </tr>
                                            <?php }
                                                    } ?>

                                            </tbody>
                                        </table>
                                        <!-- this is for counting number of page -->
                                    <?php
                                        $query1 = mysqli_query($con, "SELECT tbltools.id as toolid,tbltools.Toolname as name,
                                                tbltools.ToolImage as image,tbltools.serial_number as serialnumber,tbltools.QRimage as QRimage,
                                                tbltools.ToolDescription as ToolDescription,
                                                tbltools.isAllowedBy as allowed,tblcategory.CategoryName as category 
                                                from tbltools left join tblcategory on tblcategory.c_id=tbltools.ToolCategory 
                                                WHERE tbltools.ActiveStatus=1");
                                                $cou = mysqli_num_rows($query1);

                                                $a = $cou/90;
                                                $a=ceil($a);
                                                    if ($page>1) {
                                                        echo "<a href='manage-tools.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                                                    }
                                                for ($b=1;$b<$a;$b++) { 
                                                    ?>
                                                        <a href="manage-tools.php?page=<?php echo $b;?>" class="btn btn-primary"
                                                        style="text-decoration:none;"><?php echo $b."  ";?></a>
                                                    <?php
                                                }
                                                if ($b>$page) {
                                                        echo "<a href='manage-tools.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                                                    }
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