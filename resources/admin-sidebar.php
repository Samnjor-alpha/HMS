<nav class="sb-sidenav accordion theme-bg" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/admin/dashboard.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Users</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/admin/manageDoctors.php">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                Manage Doctors
            </a>

            <a class="nav-link" href="<?php echo BASE_URL?>/admin/managepatients.php">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-hospital-user"></i>
                </div>
                Manage Patients
            </a>
            <a class="nav-link" href="<?php echo BASE_URL?>/admin/addspecialization.php">
                <div class="sb-nav-link-icon"><i class="fas fa-heartbeat"></i></div>
                Add Specializations
            </a>
            <a class="nav-link" href="<?php echo BASE_URL?>/admin/viewappnts.php">
                <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                View Appnts.
            </a>
            <div class="sb-sidenav-menu-heading">FAQs</div>
            <a class="nav-link" href="<?php echo BASE_URL?>/admin/Faqs.php">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                Manage FAQs
            </a>



        </div>
        <div class="sb-sidenav-footer fixed-bottom">
            <div class="small">Logged in as:</div>
            <p class="text-capitalize text-bold"><?php echo $_SESSION['ad_name'] ?></p>
        </div>
</nav>