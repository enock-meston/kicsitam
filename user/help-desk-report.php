
<?php
include('includes/config.php');
$output = '';

if (isset($_POST["export"])) {
    $query = "SELECT usertbl.Firstname as fn,usertbl.Lastname as ln,tichethelptbl.id as ttid,
    tichethelptbl.persontohelp as pname,tichethelptbl.helper as helper, tichethelptbl.priority as priority,
    tichethelptbl.category as category,tichethelptbl.description as description,tichethelptbl.ChoosedDate as ChoosedDate,
    tichethelptbl.PostedDate as PostedDate FROM tichethelptbl LEFT JOIN usertbl ON 
    tichethelptbl.helper=usertbl.uid WHERE tichethelptbl.ActiveStatus=1;";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <center>
        <h3><u>List of Peaple that have been Asking for help in IT Support</u></h3>
   <table bordered="1" style="width: 100%;">  
                    <thead>

                                                <tr>
                                                    <th>Person who Asking</th>
                                                    <th>Category</th>
                                                    <th>Priority</th>
                                                    <th>Problem Description</th>
                                                    <th>Choosed Date</th>
                                                    <th>Posted Date</th>
                                                </tr>
                                            </thead>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>
                                                        <td><b>'. $row["pname"].'</b></td>
                                                        <td><b>'. $row["category"].'</b></td>
                                                        <td>'.$row["priority"].'</td>
                                                        <td>'.$row["description"].'</td>
                                                        <td>'. $row["ChoosedDate"].'</td>
                                                        <td>'. $row["PostedDate"].'</td>
                                                    </tr>
   ';
        }
        
        $output .= '</table></center>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=list_of_people_to_support'.date('Y.m.d').'.xls');
        echo $output;
    }
}
// end of if 1
else if (isset($_POST["export-done"])) {
    $query1 = "SELECT usertbl.Firstname as fn,usertbl.Lastname as ln,tichethelptbl.id as ttid,
    tichethelptbl.persontohelp as pname,tichethelptbl.helper as helper, tichethelptbl.priority as priority,
    tichethelptbl.category as category,tichethelptbl.description as description,tichethelptbl.ChoosedDate as ChoosedDate,
    tichethelptbl.PostedDate as PostedDate FROM tichethelptbl LEFT JOIN usertbl ON 
    tichethelptbl.helper=usertbl.uid WHERE tichethelptbl.ActiveStatus=0;";

    $result = mysqli_query($con, $query1);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <center>
        <h3><u>IT Support </u></h3>
   <table bordered="1" style="width: 100%;">  
                    <thead>

                                                <tr>
                                                    <th>Person who Asking</th>
                                                    <th>Category</th>
                                                    <th>Priority</th>
                                                    <th>Problem Description</th>
                                                    <th>Choosed Date</th>
                                                    <th>Posted Date</th>
                                                </tr>
                                            </thead>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>
                                                        <td><b>'. $row["pname"].'</b></td>
                                                        <td><b>'. $row["category"].'</b></td>
                                                        <td>'.$row["priority"].'</td>
                                                        <td>'.$row["description"].'</td>
                                                        <td>'. $row["ChoosedDate"].'</td>
                                                        <td>'. $row["PostedDate"].'</td>
                                                    </tr>
   ';
        }
        
        $output .= '</table></center>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=list_of_people_to_support'.date('Y.m.d').'.xls');
        echo $output;
    }
}




?>

