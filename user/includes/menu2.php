    <!--  navigation menu -->
    <nav class="navbar navbar-expand-sm" style="background-color: #2d2b7e;color:white;">
        <ul class="navbar-nav" >

        <a class="navbar-brand" href="#">
            <img src="../imagess/kics_logo_2015.jpg" alt="Logo" style="width:120px;">
        </a>

        <li class="nav-item active">
                <a class="nav-link" href="dashboard.php" style="color: white; font-size: 16px; ">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="te-scan-asset.php" style="color: white; font-size: 16px; ">Turned In</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="te-scan-rerecord.php" style="color: white; font-size: 16px; ">Turned Back</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" style="font-size: 16px; "><?php echo $_SESSION['fn'] . "  " . $_SESSION['ln']; ?></a>
            </li>
        </ul>
    </nav>
    <!--ends of  navigation menu -->