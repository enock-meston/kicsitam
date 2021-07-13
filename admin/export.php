
<?php
include('includes/config.php');

// $query =mysqli_query($con,"SELECT * FROM qrcodeasset");
// $filename="AssetRecord-'.date('Y.m.d').'.csv";
// $array = array();
// $file = fopen($file,"w");
// $array = $array("SERIAL NUMBER","POSTED DATE");

// fputcsv($file,$array);

// while ($row = mysqli_fetch_array($query)) {
//     $S_Number=$row['serialnumber'];
//     $date=$row['datebooking'];


//     $array= array($S_Number,$date);
//     fputcsv($file,$array);
// }

// fclose($file);

// header("Content-Description:File Transfer");
// header("Content-Disposition: Attachment;filename=$filename");
// header("Content-type:application/csv;");
// readfile($filename);
// exit();



//export.php  

$output = '';

if (isset($_POST["export"])) {
    // $query = "SELECT * FROM qrcodeasset WHERE status=1";
    $query = "SELECT * FROM qrcodeasset";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th></th>
                         <th style="border:2px solid black">Serial Number</th>  
                         <th style="border:2px solid black">Date</th>
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
                         <td></td>
                         <td style="border:2px solid black">' . $row["serialnumber"] . '</td>  
                         <td style="border:2px solid black">' . $row["datebooking"] . '</td>  
                    </tr>
   ';
        }
        
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=AssetRecord-'.date('Y.m.d').'.xls');
        echo $output;
    }
}


?>

