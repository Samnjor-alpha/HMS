<?php
include '../database/config.php';
include '../app/sessions/adminsession.php';
include '../app/controllers/managedrs.php';
include '../app/controllers/functions.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Doctors</title>
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
                    <li class="breadcrumb-item active">Manage Doctors</li>
                </ol>
                <div class="row">
                    <div class="float-left">
                        <div class="btn-group">
                            <a href="javascript: history.go(-1)" class="btn  btn-lg"><i class="text-secondary fas fa-arrow-left"></i></a>

                        </div>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <div class="row text-center">
                    <div class="col-lg-8">
                        <form action="" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" value="<?= $_GET['search'] ?? ''; ?>" placeholder="Search for doctors">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form action="" method="post">
                            <button type="submit" name="reset" class="btn btn-primary">Reset Search</button>
                        </form>
                    </div>
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
                <?php if (mysqli_num_rows($aldrs)>0){ ?>
                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="">Doctor Name</th>
                            <th>Specialization</th>
                            <th>Address</th>
                            <th>Fees</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Registration Date</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($row=mysqli_fetch_array($aldrs))
                        {
                            ?>

                            <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td><?php echo $row['doctorName'];?></td>
                                <td class="text-capitalize"><?php echo $row['specilization'];?></td>
                                <td><?php echo $row["address"];?></td>
                                <td><?php echo
                                    $row['docFees'];?>
                                </td>
                                <td><?php echo $row['docEmail'];?></td>
                                <td><?php echo $row['contactno'];?></td>
                                <td>
                                    <?php echo formatAppointment($row['creationDate'])
                                    ?>
                                </td>
                                <td><a href="manageDoctors.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to delete patient account ?')" class="btn btn-danger" title="Delete account">Delete</a>
                                </td>
                            </tr>

                            <?php
                            $cnt=$cnt+1;
                        }?>


                        </tbody>
                    </table>
                <?php }else{?>

                <div id="notfound">
                    <div id="descnot">
                        <h5 class="text-center text-danger  text-bold">No accounts found</h5>



                    </div>
                </div>

            </div>
            <?php } ?>
        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>
</body>
</html>
