<?php
session_start();
include('includes/config.php');
include 'send-email.php';
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {

   $subject="Proof of registration";
if (isset($_POST['submit'])) {
    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $department = "Primary";
    $password = $_POST['pass'];
    $rePass = $_POST['repass'];
    // $profile = $_FILES['profile']['name'];
    //  $extension = substr($profile, strlen($profile) - 4, strlen($profile));
    // $allowed_extensions = array(".JPG",".jpg", ".jpeg", ".png");


    $select_chech = mysqli_query($con, "SELECT * FROM tblstudent WHERE email='$email'");
    // if (strpos($password,'@')==false && strpos($password,'%')== false) {
    //     $error = "Please use Either a @ or % symbol";
    //     // echo "<script>alert('Please use Either a @ or % symbol...');</script>";
    //     // return false;
    // }
    // else if (strlen($password) < 8) {
    //     // echo "<script>alert('Password must be at least 8 characters long!...');</script>";
    //     $error = "Password must be at least 8 characters long!";
    //     // return false;
    // }
    // else 
    if ($password !==$rePass) {
        $error = "Passwords do not match. please try again!";
    }
    // 
    else if (mysqli_num_rows($select_chech) > 0) {
        echo "<script>alert('email is areald used! try again...');</script>";
    } 
    // else if (!in_array($extension, $allowed_extensions)) {
    //     echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
    // } 
    else {
        // $newprofile = md5($profile) . $extension;
        // move_uploaded_file($_FILES['profile']['tmp_name'], "profile/" . $newprofile);

        $query = mysqli_query($con, "INSERT INTO `tblstudent`(`Firstname`, `Lastname`, `email`,
         `class`, `department`, `profilePicture`, `password`,`Active_Status`)
          VALUES ('$firstname','$lastname','$email','$class','$department','','$password',1)");

        if ($query) {
            $msg = "Now you are register Check your email!";
            
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
                                                        <input type="text" class="form-control " placeholder="Grade" name="class">
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
                                                <div class="form-group row">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Choose Profile Picture</label>
                                        <input type="file" class="form-control" name="profile" placeholder="Profile Picture">
                                    </div> -->

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