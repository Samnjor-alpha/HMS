<?php
include '../database/config.php';
include '../app/sessions/adminsession.php';
include '../app/controllers/faqadmin.php';
include '../app/controllers/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FAQs</title>
    <?php include '../resources/dashboard-styles.php' ?>
</head>
<body class="sb-nav-fixed">
<?php include '../resources/ad-topbar.php'?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include '../resources/admin-sidebar.php'?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo admin_dashboard?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>
                <div class="row">
                    <div class="float-left">
                        <div class="btn-group">
                            <a href="javascript: history.go(-1)" class="btn  btn-lg"><i class="text-secondary fas fa-arrow-left"></i></a>

                        </div>
                    </div>
                    <!-- /.btn-group -->
                </div>

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

                <?php if (mysqli_num_rows($questions)>0){ ?>

                    <div id="accordion">
                        <?php

                        while($row=mysqli_fetch_array($questions))
                        {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#<?php echo $cnt ?>">
                                    <div class="row inline">
                                        <div class="col-lg-10">
                                        <?php  echo $row['faq'] ?>
                                        </div>
                                        <div class="col-lg-2">
                                            <?php echo getfaqstatus($row['id']) ?>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <div id="<?php echo $cnt ?>" class="collapse" data-parent="#accordion">
                                <div class="card-body">
<?php echo getfaqanswer($row['id']) ?>

                                </div>
                            </div>
                        </div>
<?php   $cnt++; } ?>
                    </div>
                <?php }else{?>

                    <div  class="mt-5" id="notfound">
                        <div id="descnot">
                            <h5 class="text-center text-danger  text-bold">No FAQs Found</h5>



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
