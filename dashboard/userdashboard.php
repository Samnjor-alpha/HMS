<?php
include '../database/config.php';
include '../app/sessions/session.php';
include '../app/controllers/userdashboard.php';
include '../app/controllers/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../resources/dashboard-styles.php' ?>
</head>
<body class="sb-nav-fixed">
<?php include '../resources/topbar.php'?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include '../resources/usersidebar.php'?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>


                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2 " data-toggle="tooltip" title="Booked Appointments">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Booked Appt(s).</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countallappnts($_SESSION['p_id'])?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-calendar-check fa-3x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Previous Appts</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countallprevappnts($_SESSION['p_id'])?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-history fa-3x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->


                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Appt. Feedback</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comment-medical fa-3x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </main>
<?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>

</body>
</html>
