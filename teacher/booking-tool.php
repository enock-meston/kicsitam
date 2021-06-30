<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['tid']) == 0) {
    header('location:../login.php');
} else {

    // $query=mysqli_query($con,"select tbltools.id as toolid,tbltools.Toolname as name,
    // tbltools.ToolImage as image,tbltools.ToolDescription as ToolDescription,
    // tbltools.isAllowedBy as allowed,tblcategory.CategoryName as category,studentbookingtbl.ActiveStatus as tstatus,tbltools.ToolCategory
    // from studentbookingtbl,tbltools LEFT join tblcategory on tblcategory.c_id=tbltools.ToolCategory where 
    // tbltools.ActiveStatus=1 and tbltools.isAllowedBy='student' and studentbookingtbl.ActiveStatus!=2 and studentbookingtbl.ActiveStatus!=3");

    $query = mysqli_query($con, "SELECT teacherbookingtbl.toolID as Tid,teacherbookingtbl.teacherID AS teacherID,
    teacherbookingtbl.ActiveStatus AS tstatus,teacherbookingtbl.BookStatus AS bookstatus,
    teacherbookingtbl.returnDate AS redate,tbltools.id as toolid,tbltools.Toolname as toolname,
    tbltools.ToolImage as image,tbltools.ActiveStatus AS toolsta, tbltools.isAllowedBy as allow FROM tbltools
     LEFT JOIN teacherbookingtbl ON teacherbookingtbl.toolID=tbltools.id WHERE tbltools.isAllowedBy='teacher' 
     AND tbltools.response_status=0");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
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
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?>| Dashboard</title>
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

            <h1 class="display-1" style="color: #f37020;">List of Active Tools</h1>


            <div class="row">
                <div class="col-sm-2" style="background-color: #2d2b7e;color:white;">
                    <br>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" style="background-color: #2d2b7e;color: white;" href="dashboard.php">
                                <- BACK</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#"><?php echo $_SESSION['fn'] . "  " . $_SESSION['ln']; ?></a>
                        </li>

                    </ul>
                </div>


                <div class="col-sm-10">
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tool name</th>
                                <th>Tool Image</th>
                                <!-- <th>Tool Description</th> -->
                                <th>Action</th>
                                <th>Response</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['toolname']; ?></td>
                                    <td style="width: 40%;">
                                        <a href="../user/toolimages/<?php echo $row['image']; ?>"></a>
                                        <img src="../user/toolimages/<?php echo $row['image']; ?>" style="width: 10%;">
                                        </a>

                                    </td>


                                    <td>

                                        <?php
                                        // $select=mysqli_query($con,"SELECT * FROM studentbookingtbl WHERE ActiveStatus=1");
                                        // $r=mysqli_fetch_array($select);

                                        if ($row['tstatus'] == 1) {
                                        ?>
                                            <div class="disabled" style="pointer-events: none;">
                                                <a href="booking-task.php?book=<?php echo $row['toolid']; ?>" class="btn btn-secondary">Pending</a>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="booking-task.php?book=<?php echo $row['toolid']; ?>" class="btn btn-success">Booking</a>

                                        <?php
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($row['bookstatus'] == 0) {
                                        ?>
                                            <div class="disabled" style="pointer-events: none;">
                                                <a href="#" class="btn btn-warning"> But Not Approved</a>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="disabled" style="pointer-events: none;">
                                                <a href="#" class="btn btn-secondary">Approved</a>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                </tr>

                            <?php
                            }
                            ?>



                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tool name</th>
                                <th>Tool Image</th>
                                <!-- <th>Tool Description</th> -->
                                <th>Action</th>
                                <th>Response</th>
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