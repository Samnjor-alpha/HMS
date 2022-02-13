<nav class="sb-sidenav accordion theme-bg" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/doctordashboard.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Appointments</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/upcomingappt.php">
                <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                Upcoming Appt.
            </a>

            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/previousappnt.php">
                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                Appt. History
            </a>
            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/appttimes.php">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-business-time"></i>
                </div>
                Add Appt. Hours
            </a>
            <div class="sb-sidenav-menu-heading">Earnings</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/due.php">
                <div class="sb-nav-link-icon">   <i class="fas fa-credit-card"></i></div>
               Unpayed Invoices
            </a>

            <a class="nav-link" href="<?php echo BASE_URL?>/doctor/paid.php">
                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>

                Paid invoices
            </a>



        </div>
        <div class="sb-sidenav-footer fixed-bottom">
            <div class="small">Logged in as:</div>
            <p class="text-capitalize"><?php echo $_SESSION['dr_name'] ?></p>
        </div>
</nav>