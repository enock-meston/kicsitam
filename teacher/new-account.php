<?php

include 'includes/config.php';
$error="";
$msg="";

if (isset($_POST['save'])) {
    $firstname=$_POST['fn'];
    $lastname=$_POST['ln'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $rePass=$_POST['repass'];

    // $profile=$_FILES['profile']['name'];
    // $extension = substr($profile,strlen($profile)-4,strlen($profile));
    // $allowed_extensions = array(".jpg","jpeg",".png");

    
    $select_chech= mysqli_query($con,"SELECT * FROM tblstudent WHERE email='$email'");

    if (mysqli_num_rows($select_chech)>0) {
        echo "<script>alert('email is areald used! try again...');</script>";
    }else if (empty($_POST['phone'])) {
        $error ="Please Enter Mobile Number...";
    }else if (strlen($_POST['phone'])<10) {
        $error ="Mobile number Must Be At least 10 digits";
    }else if (!preg_match("/^\d{10}$/",$phone)) {
        $error ="Invalid Mobile Number!";
    }
    // else if(!in_array($extension,$allowed_extensions)){
    // echo "<script>alert('Invalid format. Only jpg / jpeg/ png format allowed');</script>";
    // }
    else{
        // $newprofile = md5($profile).$extension;
        // move_uploaded_file($_FILES['profile']['tmp_name'],"profile/".$newprofile);

        $query= mysqli_query($con,"INSERT INTO `teachertbl`(`Firstname`, `Lastname`, `phoneNumber`,
         `email`, `username`, `password`, `ActiveStatus`) 
         VALUES ('$firstname','$lastname','$phone','$email','$username','$password',1)");

          if ($query) {
              $msg="Now you are register Check your email!";
          }else {
              $error="Something went wrong . Please try again.";
          }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create new Account to kicsitam</title>
        <link rel="stylesheet" href="../style.css">
        <!-- sb-admin links -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <!-- end of sb-admin links -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../imagess/logo.png" type="image/x-icon"/>
    </head>
    <body>
        <?php
        include 'include/menus.php';
        ?>
        <!-- create new account for student -->
        <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div id="login-image" class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account to KICSITAM As Teacher!</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">  
                                    <!---Success Message--->  
                                    <?php if($msg){ ?>
                                    <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                    </div>
                                    <?php } ?>

                                    <!---Error Message--->
                                    <?php if($error){ ?>
                                    <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                                    <?php } ?>
                                </div>
                            </div>

                            <form class="user" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="fn">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="ln">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>

                                <!-- <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Phone Number" name="phone">
                                </div> -->

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Phone Number" name="phone">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Username" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repass">
                                    </div>
                                </div>
                                <input type="submit" name="save" class="btn btn-primary btn-user btn-block" value="Register Me">
                               
                            </form>
                            <hr>
                        
                            <div class="text-center">
                                <a class="small" href="../login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <!-- eng create new account for student -->
        
        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>
    </body>
</html>