<nav class="sb-sidenav accordion theme-bg" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/dashboard/userdashboard.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Appointments</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/dashboard/bookappt.php">
                <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
               Book Appt.
            </a>
            <a class="nav-link" href="<?php echo BASE_URL?>/dashboard/pendingappt.php">
                <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                 Pending Appt.
            </a>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                Appt. History
            </a>

            <div class="sb-sidenav-menu-heading">Medical </div>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-file-medical-alt"></i>
                </div>
                Medical history
            </a>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-comment-medical"></i>
                </div>
                 Feedbacks
            </a>
        <div class="sb-sidenav-menu-heading">Profile </div>
        <a class="nav-link" href="">
            <div class="sb-nav-link-icon">
                <i class="far fa-user-circle"></i>
            </div>
          Manage profile
        </a>
        </div>

    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <p class="text-capitalize"><?php echo $_SESSION['pname'] ?></p>
    </div>
</nav>