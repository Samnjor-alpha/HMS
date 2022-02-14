<?php
include '../database/config.php';
include '../app/sessions/drsession.php';
include '../app/controllers/pnt-profile.php';
include '../app/controllers/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Profile</title>
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
                    <li class="breadcrumb-item active">Patient Profile</li>
                </ol>


                <div class="card1">
                    <img  class="mt-1" src="<?php echo BASE_URL?>/public/assets/img/we-do/we-do-1.svg" alt="Icon" style="width:20%">
                    <h1><?php echo pntname($_GET['profile']) ?></h1>
                    <p class="title"><?php echo $row['address'] ?></p>
                    <p><?php echo $row['p_no'] ?></p>

                  <?php echo getmedicalhistory($_GET['profile']); ?>
                </div>


            </div>
        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php';
include '../resources/modalmedhist.php';
?>

</body>
</html>
