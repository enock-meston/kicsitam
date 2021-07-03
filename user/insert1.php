<?php
include('includes/config.php');


 if (isset($_POST['text'])) {
     
    $text =$_POST['text'];
    $status =1;

    $sql= mysqli_query($con,"INSERT INTO `qrcodeasset`(`serialnumber`,`status`) VALUES ('$text','$status')");
        if ($sql) {
            echo "Successfully Inserted";
        }else {
            echo "Error: ".$sql."<br>".$con->error;
        }
        header('location: scan-asset.php');
 }

 $con->close();

?>