<?php
session_start();
include('includes/config.php');


if (isset($_POST['text'])) {

    $text = mysqli_real_escape_string($con,$_POST['text']);
    $status = 1;
    // $checkquery = mysqli_query($con,"SELECT * FROM qrcodeasset WHERE serialnumber LIKE '$text'");
    // $count = mysqli_num_rows($checkquery);
    // if ($count > 0) {
        $sql = mysqli_query($con, "INSERT INTO `qrcodeasset`(`serialnumber`,`status`) VALUES ('$text','$status')");
        if ($sql) {
            $_SESSION['success'] = 'Asset Recoded!';
        } else {
            $_SESSION['error'] = $con->error;
        }
        header('location: scan-asset.php');
    //} 
    // else {
    //     $_SESSION['exist'] = 'Asset aleady Recoded!';
    //     header('location: scan-asset.php');
    // }
}

$con->close();
