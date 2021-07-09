<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {
    if ($_GET['ttid']) {
        $id = intval($_GET['ttid']);
        $query = mysqli_query($con, "UPDATE tichethelptbl set ActiveStatus='0' where id='$id'");
        echo "<script>alert('now request has been approved');</script>";
        header('location:make-help.php');
    }

    $query = mysqli_query($con, "SELECT usertbl.Firstname as fn,usertbl.Lastname as ln,tichethelptbl.id as ttid,
    tichethelptbl.persontohelp as pname,tichethelptbl.helper as helper, tichethelptbl.priority as priority,
    tichethelptbl.category as category,tichethelptbl.description as description,tichethelptbl.ChoosedDate as ChoosedDate,
    tichethelptbl.PostedDate as PostedDate FROM tichethelptbl LEFT JOIN usertbl ON 
    tichethelptbl.helper=usertbl.uid WHERE tichethelptbl.ActiveStatus=1;");

    $querydone = mysqli_query($con, "SELECT usertbl.Firstname as fn,usertbl.Lastname as ln,tichethelptbl.id as ttid,
tichethelptbl.persontohelp as pname,tichethelptbl.helper as helper, tichethelptbl.priority as priority,
tichethelptbl.category as category,tichethelptbl.description as description,tichethelptbl.ChoosedDate as ChoosedDate,
tichethelptbl.PostedDate as PostedDate FROM tichethelptbl LEFT JOIN usertbl ON 
tichethelptbl.helper=usertbl.uid WHERE tichethelptbl.ActiveStatus=0;");


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check help Request</title>
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

                <!-- table one  -->
                <div class="col-sm-10">
                <!-- export to excel -->
                <form method="post" action="help-desk-report.php">
                   <button class="btn btn-success" name="export"> Print Report
                       <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                </form>

                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Person who Asking</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Problem Description</th>
                                <th>Choosed Date</th>
                                <th>Posted Date</th>
                                <th>Suppoter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['pname']; ?></td>
                                    </td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['priority']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['ChoosedDate']; ?></td>
                                    <td><?php echo $row['PostedDate']; ?></td>
                                    <td><?php echo $row['fn'] . " " . $row['ln']; ?>
                                    <td>
                                        <a href="make-help.php?ttid=<?php echo htmlentities($row['ttid']); ?>">yes</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Person who Asking</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Problem Description</th>
                                <th>Choosed Date</th>
                                <th>Posted Date</th>
                                <th>Suppoter</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- end of table one -->


                    <!-- table two -->
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                    <h1>List of Request Helps</h1>

                    <div class="col-sm-10">
                    <form method="post" action="help-desk-report.php">
                   <button class="btn btn-success" name="export-done"> Print Report
                       <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                </form>
                        <table id="example" class="display table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Person who Asking</th>
                                    <th>Category</th>
                                    <th>Priority</th>
                                    <th>Problem Description</th>
                                    <th>Choosed Date</th>
                                    <th>Posted Date</th>
                                    <th>Suppoter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($querydone)) {

                                ?>
                                    <tr>
                                        <td><?php echo $row['pname']; ?></td>
                                        </td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['priority']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['ChoosedDate']; ?></td>
                                        <td><?php echo $row['PostedDate']; ?></td>
                                        <td><?php echo $row['fn'] . " " . $row['ln']; ?>
                                        <td>
                                            Done
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Person who Asking</th>
                                    <th>Category</th>
                                    <th>Priority</th>
                                    <th>Problem Description</th>
                                    <th>Choosed Date</th>
                                    <th>Posted Date</th>
                                    <th>Suppoter</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>






    </body>

    </html>

<?php
} ?>