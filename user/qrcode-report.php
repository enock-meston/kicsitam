                                                      
<?php
include('includes/config.php');
$output = '';

if (isset($_POST["export"])) {
    $query = "SELECT `Toolname`,`ToolImage`,`QRimage`, `serial_number` FROM `tbltools`";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <center>
        <h3><u>List of Staff that have been get Asset in IT Support</u></h3>
   <table bordered="1" style="width: 100%;">  
                    <thead>

                                                <tr>
                                                    <th>Tool Name</th>
                                                    <th>QR Code</th>
                                                    <th>Serial Number</th>
                                                </tr>
                                            </thead>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>
                                                        <td><b>'. $row["serial_number"].'</b></td>
                                                        <td><img src='.$row["QRimage"].'></td>
                                                        <td>'.$row["Toolname"].'</td>
                                                        
                                                    </tr>
   ';
        }
        
        $output .= '</table></center>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Qr_code_report-'.date('Y.m.d').'.xls');
        echo $output;
    }
}


?>

