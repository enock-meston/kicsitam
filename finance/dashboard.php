<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['fid']) == 0) {
    header('location:../index.php');
} else {

    // $query=mysqli_query($con,"select tbltools.id as toolid,tbltools.Toolname as name,
    // tbltools.ToolImage as image,tbltools.ToolDescription as ToolDescription,
    // tbltools.isAllowedBy as allowed,tblcategory.CategoryName as category,studentbookingtbl.ActiveStatus as tstatus,tbltools.ToolCategory
    // from studentbookingtbl,tbltools LEFT join tblcategory on tblcategory.c_id=tbltools.ToolCategory where 
    // tbltools.ActiveStatus=1 and tbltools.isAllowedBy='student' and studentbookingtbl.ActiveStatus!=2 and studentbookingtbl.ActiveStatus!=3");

    $query = mysqli_query($con, "SELECT tbltools.id as toolid,tbltools.Toolname as name, 
    tbltools.ToolImage as image,tbltools.serial_number as serialnumber,tbltools.PostedDate AS postedDate,
     tbltools.ToolDescription as ToolDescription,tbltools.ActiveStatus as status,crashedassettbl.Status as crastatus, 
     tbltools.isAllowedBy as allowed from tbltools left join crashedassettbl on crashedassettbl.toolID=tbltools.id");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>| Asset Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- datatables -->
        <link rel="stylesheet" type="text/css" href="DataTables/css/datatables.min.css" />
        <script type="text/javascript" src="DataTables/js/datatables.min.js"></script>
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <link rel="shortcut icon" href="../imagess/logo.png" type="image/x-icon" />

    </head>

    <body>


        <div class="container-fluid">

            <h1 class="display-1" style="color: #f37020;">List of Assets</h1>


            <div class="row">
                <div class="col-sm-2" style="background-color: #2d2b7e;color:white;">
                    <br>
                    <ul class="nav nav-tabs">

                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#"><?php echo $_SESSION['fname'] . "  " . $_SESSION['lname']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="logout.php">SignOut</a>
                        </li>

                    </ul>
                </div>


                <div class="col-sm-10">
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Asset Name</th>
                                <th>Serial Number</th>
                                <th>Asset Image</th>
                                <th>Asset Status </th>
                                <th>Added Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['serialnumber']; ?></td>
                                    <td style="width: 40%;">
                                        <a href="../user/toolimages/<?php echo $row['image']; ?>"></a>
                                        <img src="../user/toolimages/<?php echo $row['image']; ?>" style="width: 10%;">
                                        </a>

                                    </td>
                                    <td>
                                        <?php 
                                            if ($row['status']==0) {
                                                echo "Under Maintenance";
                                            }else if($row['status']==1){
                                                echo "Good Condition";
                                            }else {
                                                echo "Was Crashed";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['postedDate'];?></td>
                                </tr>

                            <?php
                            }
                            ?>



                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Asset Name</th>
                                <th>Serial Number</th>
                                <th>Asset Image</th>
                                <th>Asset Status </th>
                                <th>Added Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>






    </body>

    </html>

<?php
} ?>