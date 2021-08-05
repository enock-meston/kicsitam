<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['SID'])==0)
{
header('location:index.php');
}
else{
// For adding post

    if(isset($_POST['submit'])){
        //  book_name,book,book_desc,book_type,postingDate,is_Active,adid,post_url,view 
        // $id=$_SESSION['id'];
        $names=mysqli_real_escape_string($con,$_POST['posttitle']);
        $contact=mysqli_real_escape_string($con,$_POST['contact']);
        $Comment= mysqli_real_escape_string($con,$_POST['Comment']);
       
 $imgfile=$_FILES["file"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".pdf",".docx",".doc",".xls");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only pdf / docx/ doc format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
      // 
 $target_dir = "uploadfile/";
       $imgnewfile = $target_dir . $_FILES["file"]["name"];
        // 
// Code for move image into directory
move_uploaded_file($_FILES['file']['tmp_name'],$imgnewfile);

$status=1;
$query=mysqli_query($con,"INSERT INTO `tblvenders`(`names`, `contact`,`comment`,
 `quotationfile`,`ActiveStatus`) VALUES ('$names','$contact','$Comment','$imgnewfile','$status')");
if($query)
{
$msg="Vendover successfully added ";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
 
     }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Add Vendors</title>
        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Vendors </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Vendors</a>
                                        </li>
                                        <li>
                                            <a href="#">Add Vendors </a>
                                        </li>
                                        <li class="active">
                                            Add Vendors
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if($msg){ ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                </div>
                                <?php } ?>
                                <!---Error Message--->
                                <?php if($error){ ?>
                                <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post" enctype="multipart/form-data">
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Vendor Name</label>
                                                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter Name" required>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Contact</label>
                                                <input type="text" class="form-control" id="posttitle" name="contact" placeholder="Enter Contact" required>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Upload Quotation File</b></h4>
                                                        <input type="file" class="form-control" id="postimage" name="file"  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Comment </label>
                                                <input type="text" class="form-control" id="posttitle" name="Comment" placeholder="Enter Comment" required>
                                            </div>
                                            
                                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                                        </form>
                                    </div>
                                    </div> <!-- end p-20 -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                                </div> <!-- container -->
                                </div> <!-- content -->
                                <?php include('includes/footer.php');?>
                            </div>
                            <!-- ============================================================== -->
                            <!-- End Right content here -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- END wrapper -->
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
                        <script src="../plugins/switchery/switchery.min.js"></script>
                        
                        <!-- Select 2 -->
                        <script src="../plugins/select2/js/select2.min.js"></script>
                        <!-- Jquery filer js -->
                        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>
                        <!-- page specific js -->
                        <script src="assets/pages/jquery.blog-add.init.js"></script>
                        <!-- App js -->
                        <script src="assets/js/jquery.core.js"></script>
                        <script src="assets/js/jquery.app.js"></script>
                        <script src="../plugins/switchery/switchery.min.js"></script>
                    </body>
                </html>
                <?php } ?>