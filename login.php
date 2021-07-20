<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $user_type = $_POST['type'];

    $email = $_POST['email'];
    $password = $_POST['password'];
    // Teacher login side
    if ($user_type == 'staff') {
        $query = mysqli_query($con, "SELECT * FROM teachertbl WHERE email='$email' AND password='$password'");
        $num = mysqli_fetch_array($query);

        if ($num > 0) {
            $_SESSION['tid'] = $num['tid'];
            $_SESSION['fn'] = $num['Firstname'];
            $_SESSION['ln'] = $num['Lastname'];
            $_SESSION['email'] = $num['email'];
            echo "<script type='text/javascript'> document.location = 'teacher/dashboard.php'; </script>";
        } else {
            echo "<script>alert('User not registered with us');</script>"; 
        }
    }
    
    // student login side
    else if ($user_type == 'student') {
        $query = mysqli_query($con, "SELECT * FROM tblstudent WHERE email='$email' AND password='$password'");
        $num = mysqli_fetch_array($query);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fn'] = $num['Firstname'];
            $_SESSION['ln'] = $num['Lastname'];
            $_SESSION['email'] = $num['email'];
            $_SESSION['profile'] = $num['profilePicture'];
            echo "<script type='text/javascript'> document.location = 'student/dashboard.php'; </script>";
        } else {
            echo "<script>alert('User not registered with us');</script>";
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
    <title>Login to kicsitam</title>
    <link rel="stylesheet" href="style.css">
    <!-- sb-admin links -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- end of sb-admin links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="imagess/logo.png" type="image/x-icon" />

    <style>
        body, html {
    height: 100%;
    margin: 0;
  }
  
  .bg {
    /* The image used */
    background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/bus2.jpg");
    /* Full height */
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  }

  .text {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  }
  body{
       /* The image used */
    background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/bus2.jpg");
    /* Full height */
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  }

  #login-image{
        /* The image used */
        background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/ll.png");
        /* Center and scale the image nicely */
        background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
  }
    </style>
</head>

<body>
    <?php
    include 'include/menus.php';
    ?>
    <div id="container" class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div id="login-image" class="col-lg-6 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5" style="background-color: rgba(255, 255, 128, .2);">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login as kicsitam User</h1>
                                    </div>


                                    <form class="user" method="POST">

                                        <div class="form-group">
                                            <select name="type" class="form-control" id="exampleInputEmail">
                                                <option>Select User type</option>
                                                <option value="staff">Staff || Guest</option>
                                                <option value="student">Student</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <input type="submit" name="login" class="btn btn-user btn-block" style="background-color: #2d2b7e; color:white;" value="Login">

                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="student/new-account.php">Create an Account as Student </a><br>
                                        <a class="small" href="teacher/new-account.php">Create an Account as Staff </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>