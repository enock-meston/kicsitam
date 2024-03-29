<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to kicsitam</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="imagess/logo.png" type="image/x-icon" />
<style>

    body, html {
    height: 100%;
    margin: 0;
  }
  
  .bg {
    /* The image used */
    background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/bus2.jpg");
    /* Full height */
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  }

  .text {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  }
  body{
       /* The image used */
    background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/bus2.jpg");
    /* Full height */
    height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  }

  #login-image{
        /* The image used */
        background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("imagess/tlclogin.png");
        /* Center and scale the image nicely */
        background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
  }
</style>
</head>

<body>
    <!-- Navbar content -->
    <?php
    include 'include/menus.php';
    ?>

    <div class="bg">
        <div class="text">
            <div class="contain">
                <h3 style="font-size:25px">Welcome To KICSIT Asset Management <br><center>(KICSITAM)</center></h3>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="border-radius: 32px;" class="d-block w-100" src="imagess/IT2.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color:black;">All IT Assets</h5>
                            <p style="color:black;">Desktop and Laptop etc</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="imagess/code2.jpg" alt="Second slide"  style="border-radius: 32px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>MAC BOOK PC</h5>
                            <p>Desktop and Laptop</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="imagess/sss2.jpg" alt="Third slide"  style="border-radius: 32px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color:black;">All IT Assets</h5>
                            <p style="color:black;">Desktop and Laptop etc</p>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            <a href="login.php" class="btn btn-success">BOOK NOW</a>
        </div>
    </div>


<!-- Footer -->
      <?php include('include/footer.php');?>
</body>

</html>