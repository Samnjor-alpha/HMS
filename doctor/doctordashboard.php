<?php
include '../database/config.php';
include '../app/sessions/drsession.php';
include '../app/controllers/doctordashboard.php';
include '../app/controllers/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../resources/dashboard-styles.php' ?>
</head>
<body class="sb-nav-fixed">
<?php include '../resources/dr-topbar.php'?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include '../resources/doc-sidebar.php'?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo doc_dashboard?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo doc_dashboard?></li>
                </ol>


                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2 " data-toggle="tooltip" title="Booked Appointments">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Upcoming Appt(s).</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countdoc_apptn($_SESSION['dr_id'])?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-calendar-check fa-3x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Previous Appts</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countprevdoc_apptn($_SESSION['dr_id'])?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-history fa-3x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Amount to be paid</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo currency.' '.formatMoney(amountdue($_SESSION['dr_id']),true)?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-credit-card fa-3x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-capitalize mb-1">Amount Earned</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo currency.' '.formatMoney(amountearned($_SESSION['dr_id']),true)?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-piggy-bank fa-3x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a href="chat.php" class="float">
                    <i class="fas fa-comment-dots my-float"></i>
                </a>
            </div>
        </main>
<?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>

</body>
</html>
