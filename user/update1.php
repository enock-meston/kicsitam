<?php
session_start();
include('includes/config.php');


 if (isset($_POST['text'])) {
     
    $text =$_POST['text'];
    $status =0;

    $sql= mysqli_query($con,"UPDATE `qrcodeasset` SET `status`='$status' WHERE `serialnumber`='$text'");
        if ($sql) {
            $_SESSION['success']='Asset Recoded!';
        }else {
            $_SESSION['error']=$con->error;
        }
        header('location: scan-rerecord.php');
 }

 $con->close();

?>