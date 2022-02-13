 <?php
include '../database/config.php';
include '../app/sessions/drsession.php';
include '../app/controllers/addappt.php';
include "../app/controllers/functions.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Appointment</title>
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
                    <li class="breadcrumb-item active">Add Business hours</li>
                </ol>
                <div class="row">
                    <div class="float-left">
                        <div class="btn-group">
                            <a href="javascript: history.go(-1)" class="btn  btn-lg"><i class="text-secondary fas fa-arrow-left"></i></a>

                        </div>
                    </div>
                    <!-- /.btn-group -->
                </div>


                <div class="row">
<div class="col-lg-6">
    <div>
        <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
    </div>
    <form class="form-group" action="" method="post">
        <div class="form-group">
            <label for="btime">Business hours</label>
                <input id="btime" name="bzn_hrs" class="form-control" type="time">

        </div>
        <button name="addhrs" class="btn btn-block theme-btn">Add</button>
    </form>
</div>
                    <div class="col-lg-6">
                        <?php if (mysqli_num_rows($getbzhrs)>0){ ?>
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                <tr>
                                    <th class="center">#</th>
                                   <th>Time</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                while($row=mysqli_fetch_array($getbzhrs))
                                {
                                    ?>

                                    <tr>
                                        <td class="center"><?php echo $cnt;?>.</td>
                                                                    <td>
                                            <?php echo $row['hours']                                     ?></td>
                                        <td>

                                                <a href="appttimes.php?cancel=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>

                                    <?php
                                    $cnt=$cnt+1;
                                }?>


                                </tbody>
                            </table>
                        <?php }else{?>

                        <div id="notfound1">
                            <div id="descnot">
                                <h5 class="text-center  text-danger text-bold">No business hours added</h5>



                            </div>
                        </div>
                        <?php }?>
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
