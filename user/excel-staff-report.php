
<?php
include('includes/config.php');
$output = '';

if (isset($_POST["export"])) {
    $query = "SELECT `id`, `staffnames`, `email`, `staffOption`, 
    `Assetname`, `purpose`, `bookedDate`, `returnedDate`, `ReportDate` FROM `tblstaffreport` WHERE 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <center>
        <h3><u>List of Staff that have been get Asset in IT Support</u></h3>
   <table bordered="1" style="width: 100%;">  
                    <thead>

                                                <tr>
                                                    <th>No</th>
                                                    <th>Staff Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>Booked Asset</th>
                                                    <th>Purpose</th>
                                                    <th>Date of Booking</th>
                                                    <th>Date of Returning</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>
                                                        <td><b>'. $row["id"].'</b></td>
                                                        <td><b>'. $row["staffnames"].'</b></td>
                                                        <td>'.$row["email"].'</td>
                                                        <td>'.$row["staffOption"].'</td>
                                                        <td>'. $row["Assetname"].'</td>
                                                        <td>'. $row["purpose"].'</td>

                                                        <td style="background-color: #f37020;color:white;">'. $row["bookedDate"].'</td>
                                                        <td style="background-color: #f37020;color:white;">'. $row["returnedDate"].'</td>
                                                        <td>'. $row["ReportDate"].'</td>
                                                    </tr>
   ';
        }
        
        $output .= '</table></center>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Staffreport-'.date('Y.m.d').'.xls');
        echo $output;
    }
}


?>

