<?php 
session_start();
include('includes/config.php');

?>            
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left" style="background-color: #2d2b7e;color:white;">
                    <a href="dashboard.php" class="logo"><span>kicsi<span>tam</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo  -->
                    <a href="dashboard.php" class="logo">
                        <!-- <span>
                            <img src="images1/kmn_App_logo.jpg" alt="" height="20">
                        </span> -->
                        <!-- <i>
                            <img src="images1/kmn_App_logo.png" alt="" height="28">
                        </i> -->
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                     
                    
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                          

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="profile/<?php echo $_SESSION['profile']?>" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, <?php echo $_SESSION['fn']." ".$_SESSION['ln'];?></h5>
                                    </li>
                              
                                    <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Chnage Password</a></li>
                           
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>