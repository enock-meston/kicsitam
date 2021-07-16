<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
} else {
?>

    <html>

    <head>
        <title><?php echo $_SESSION['fn'] . " " . $_SESSION['ln']; ?>| Scan</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link rel="shortcut icon" href="../imagess/logo.png" type="image/x-icon" />


        <link rel="stylesheet" href="plugins/morris/morris.css">

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


        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

    </head>

    <body>

        <?php include('includes/menu1.php') ?>
        
    <div class="col-md-19">
        <div class="container">
            <h1> Student - Record Asset</h1>
            <div class="row">

                <div class="col-md-5">
                    <video id="preview" width="100%"></video>
                    <span id="success"></span>
                    <span id="faild"></span>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "
                        <div class='alert alert-danger'>
                            <h4>Error!<h4/>
                            " . $_SESSION['error'] . "
                        </div>
                        ";
                    }

                    if (isset($_SESSION['success'])) {
                        echo "
                        <div class='alert alert-success'>
                            <h4>Success!<h4/>
                            " . $_SESSION['success'] . "
                        </div>
                        ";
                    }


                    if (isset($_SESSION['exist'])) {
                        echo "
                        <div class='alert alert-danger'>
                            <h4>Success!<h4/>
                            " . $_SESSION['exist'] . "
                        </div>
                        ";
                    }
                    ?>
                </div>
                <div class="col-md-7">
                    <form action="insert1.php" method="POST" class="form-horintal">
                        <label>SCAN QR CODE COMPUTER NAME</label>
                        <input type="text" name="text" id="text" readonly placeholder="Serial Number" class="form-control">
                    </form>
                    <!-- table of scan computer -->
                    <!-- export to excel -->
                    <form method="post" action="export.php">
                        <input type="submit" name="export" class="btn btn-success pull-left" value="Print Report" />

                    </form>
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Serial NUmber</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include('includes/config.php');
                            $sql = mysqli_query($con, "SELECT * FROM qrcodeasset WHERE status=1");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['serialnumber']; ?></td>
                                    <td><?php echo $row['datebooking']; ?></td>

                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                    <!-- end of table scaned computer -->

                </div>
            </div>



            <!--end export to excel -->
        </div>
        </div>

        <!-- script of excel file -->
        <script>
            function Export() {
                var conf = confirm("Please confirm if you wish to export the List to Excle file");
                if (conf == true) {
                    window.open("export.php", '_black');
                }
            }
        </script>
        <!-- script of excel file -->
        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('No cameras found');
                }

            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(c) {
                document.getElementById('text').value = c;
                document.forms[0].submit();
            });
        </script>


         <script>
                            var resizefunc = [];
                        </script>

                        <!-- jQuery  -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script src="assets/js/detect.js"></script>
                        <script src="assets/js/fastclick.js"></script>
                        <script src="assets/js/jquery.blockUI.js"></script>
                        <script src="assets/js/waves.js"></script>
                        <script src="assets/js/jquery.slimscroll.js"></script>
                        <script src="assets/js/jquery.scrollTo.min.js"></script>
                        <script src="plugins/switchery/switchery.min.js"></script>

                        <!-- Counter js  -->
                        <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
                        <script src="plugins/counterup/jquery.counterup.min.js"></script>

                        <!--Morris Chart-->
                        <script src="plugins/morris/morris.min.js"></script>
                        <script src="plugins/raphael/raphael-min.js"></script>

                        <!-- Dashboard init -->
                        <script src="assets/pages/jquery.dashboard.js"></script>

                        <!-- App js -->
                        <script src="assets/js/jquery.core.js"></script>
                        <script src="assets/js/jquery.app.js"></script>
    </body>

    </html>

<?php
}
?>