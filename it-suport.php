<?php

include 'includes/config.php';
include 'send-email.php';
$error = "";
$msg = "";
// function for calcurating time

// function Timing($From,$to){
// 		$secs = strtotime($to)-strtotime("00:00:00");
// 		$result = date("H:i:s",strtotime($From)+$secs);
// 		echo $result;
// }

//  end of calcurating time
if (isset($_POST['save'])) {
    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $names=$firstname."  ".$lastname;
    $email1 = $_POST['email'];
    $date1=$_POST['date1'];
    $time=$_POST['time'];
    $time2 = "00:30:00";
    $secs = strtotime($time2)-strtotime("00:00:00");
    $result = date("H:i:s",strtotime($time)+$secs);
    $date=$date1." time at ".$result;

    $category=$_POST['category'];
    $priority=$_POST['priority'];
    $description = addslashes($_POST['description']);
    $status = 1;
    $message ="Hello ".$names." now your New Ticket was been Sent to The IT Support,
    you Choose ".$date.". Thank you so much!";
    $subject="New Ticket Submitted";
    $Date_chech = mysqli_query($con,"SELECT * FROM tichethelptbl WHERE ChoosedDate='$date'");

    if (mysqli_num_rows($Date_chech) > 0) {
        $error = "Date is areald Taken.";
    } 
    else {
        $query = mysqli_query($con, "INSERT INTO `tichethelptbl`(`persontohelp`,`email`,`priority`, `category`,
         `description`, `ChoosedDate`, `ActiveStatus`) 
    VALUES ('$names','$email1','$priority','$category','$description','$date','$status')");
        if ($query) {
            $msg = "New Ticket Submitted Check your Email";
            sendingEmail($email1,$subject,$message);
        } else {
            $error = "Something went wrong . Please try again.";
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
    <title>IT SUPPORT</title>
    <link rel="stylesheet" href="style.css">
    <!-- sb-admin links -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- end of sb-admin links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../imagess/logo.png" type="image/x-icon" />
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
    <!-- create new account for student -->
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div id="login-image" class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7" >
                        <div class="p-5" style="background-color: rgba(255, 255, 128, .2);">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Make New Tichet </h1>
                            </div>
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

                            <form class="user" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fn">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="ln">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                                </div>

                                <!-- <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Phone Number" name="phone">
                                </div> -->

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleInputEmail1">Choose Date</label>
                                        <input type="date" name="date1" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Choose Time</label>
                                        <input type="time" name="time" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
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


                                <div class="col-sm-6 mb-3 mb-sm-0">
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
                                            <label for="exampleInputEmail1">More Description</label>
                                            <textarea class="form-control" rows="5" cols="10" name="description" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <hr>
                                <input type="submit" name="save" class="btn btn-user btn-block" 
                                style="background-color: #2d2b7e;color:white;" value="Send">

                            </form>
                            <hr>

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