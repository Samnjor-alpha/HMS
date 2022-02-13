<?php
include '../database/config.php';
include '../app/sessions/session.php';
include '../app/controllers/getdoctors.php';
include '../app/controllers/functions.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Appointment</title>
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
                <h1 class="mt-4"><?php echo user_dashboard?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Book Appointment</li>
                </ol>

<div class="row">
    <div class="col-lg-8">
        <form action="" method="get">
            <div class="form-group">
                <input type="text" name="search" class="form-control" value="<?= $_GET['search'] ?? ''; ?>" placeholder="Search for Doctor">
            </div>
        </form>
    </div>
    <div class="col-lg-4">
        <form action="" method="post">
            <div class="form-group">
               <select class="form-control" onchange="this.form.submit()" name="skill">
                   <option selected><?= $_POST['skill'] ?? 'Filter doctors'; ?></option>
                    <?php while($row=mysqli_fetch_array($ret)){
                           ?>
                           <option value="<?php echo htmlentities($row['specilization']);?>">
                               <?php echo htmlentities($row['specilization']);?>
                           </option>
                       <?php } ?>


               </select>
            </div>
        </form>
    </div>
</div>

                <?php if (mysqli_num_rows($doctors)>0){ ?>
                <div class="row">
                    <?php while($row_dr=mysqli_fetch_array($doctors)){
                    ?>
                    <div class="col-lg-4 mb-2">
                <div class="card h-100">
                    <img class="card-img-top mt-1" width="41" height="49" src="<?php echo BASE_URL?>/public/assets/img/we-do/we-do-1.svg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row_dr['doctorName']?></h4>
                        <p class="card-text"><?php echo $row_dr['specilization']?></p>
                        <a href="appt.php?doctor=<?php echo $row_dr['id']?>" class="btn btn-block btn-sm theme-btn">Visit Doctor</a>
                    </div>
                </div>








                    </div>
                    <?php }?>


            </div>
                <?php }else{?>
                    <div id="notfound">
                        <div id="descnot">
                            <h5 class=" text-center"><?php echo $querymsg; ?></h5>



                        </div>
                    </div>

                <?php }?>
                </div>

        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>
</body>
</html>
