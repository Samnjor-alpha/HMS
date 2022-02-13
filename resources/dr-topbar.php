<nav class="sb-topnav navbar navbar-expand navbar-dark theme-bg">
    <a class="navbar-brand" href="">
        <img src="<?php echo BASE_URL?>/public/assets/img/logo/logodash.svg" alt="Logo">
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="  form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo BASE_URL?>/doctor/manage-profile.php">Profile</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo BASE_URL?>/app/sessions/logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>