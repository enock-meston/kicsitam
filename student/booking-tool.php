<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
  { 
header('location:../login.php');
}
else{

    $query=mysqli_query($con,"select tbltools.id as toolid,tbltools.Toolname as name,tbltools.ToolImage as image,tbltools.ToolDescription as ToolDescription,tbltools.isAllowedBy as allowed,tblcategory.CategoryName as category 
    from tbltools left join tblcategory on tblcategory.c_id=tbltools.ToolCategory where tbltools.ActiveStatus=1 and tbltools.isAllowedBy='student'");
   

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
} );
    </script>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App title -->
    <title><?php echo $_SESSION['fn']." ".$_SESSION['ln'];?>| Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="DataTables/css/datatables.min.css"/>
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
    
  <h1 class="display-1">List of Active Tools</h1>
  
  
  <div class="row">
    <div class="col-sm-2" style="background-color:#37404f;">
    <br>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">BACK</a>
                        </li>
               
                        <!-- <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#">Link</a>
                        </li> -->
                        
                </ul>
    </div>


    <div class="col-sm-10">
    <table id="example" class="display table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Tool name</th>
                <th>Tool Image</th>
                <th>Tool Description</th>
                <th>Action</th>
                 
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row=mysqli_fetch_array($query)) {
                
                ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td style="width: 40%;">
                            <a href="../user/toolimages/<?php echo $row['image'];?>"></a>
                                 <img src="../user/toolimages/<?php echo $row['image'];?>" style="width: 10%;">
                            </a>
                           
                        </td>
                        <td><?php echo $row['ToolDescription'];?></td>

                        <td>
                            <a href="booking-task.php?book=<?php echo $row['toolid'];?>" 
                            class="btn btn-info">Booking</a>
                        
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
                <th>Tool Description</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </div>
  </div>
</div>






</body>
</html>

<?php 
}?>