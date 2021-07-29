<?php
session_start();
include('includes/config.php');
include 'send-email.php';
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $subject="Proof of registration";
        $firstname = $_POST['fn'];
        $lastname = $_POST['ln'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $rePass = $_POST['repass'];
        $status = 2;
        $select_chech = mysqli_query($con, "SELECT * FROM tblstudent WHERE email='$email'");

        if (mysqli_num_rows($select_chech) > 0) {
            $error = "email is areald used! try again...";
            // echo "<script>alert('email is areald used! try again...');</script>";
        } else if (strpos($password, '@') == false && strpos($password, '%') == false) {
            $error = "Please use Either a @ or % symbol";
            // echo "<script>alert('Please use Either a @ or % symbol...');</script>";
            // return false;
        } else if (strlen($password) < 8) {
            // echo "<script>alert('Password must be at least 8 characters long!...');</script>";
            $error = "Password must be at least 8 characters long!";
            // return false;
        } else if ($password !== $rePass) {
            $error = "Passwords do not match. please try again!";
        } else {
            $query = mysqli_query($con, "INSERT INTO `teachertbl`(`Firstname`, `Lastname`,`phoneNumber`,
    `email`, `username`, `password`, `ActiveStatus`) 
    VALUES ('$firstname','$lastname','','$email','$username','$password','$status')");

            if ($query) {
                $msg = $firstname." ".$lastname." Registred to Be Guest and access Kics Stock";
                sendingEmail($email,$subject,$msg);
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Add Guest User</title>

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
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Guest User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#"> Guest User</a>
                                        </li>
                                        <li>
                                            <a href="#">Guest </a>
                                        </li>
                                        <li class="active">
                                            Add Guest User
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
                                    <h4 class="m-t-0 header-title"><b>Add Guest User </b></h4>
                                    <hr />



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
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="category" method="post">
                                                <div class="form-group">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control" placeholder="First Name" name="fn">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="Last Name" name="ln">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="email" class="form-control" placeholder="Email Address" name="email">
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control " placeholder="Username" name="username">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="password" class="form-control " placeholder="Password" name="pass">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="password" class="form-control " placeholder="Repeat Password" name="repass">
                                                    </div>
                                                </div>
                                                <input type="submit" name="submit" class="btn btn-user btn-block" style="background-color: #2d2b7e;color:white;" value="Register Now">


                                            </form>
                                        </div>


                                    </div>











                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>