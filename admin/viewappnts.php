<?php
include '../database/config.php';
include '../app/sessions/adminsession.php';
include '../app/controllers/manageappnts.php';
include '../app/controllers/functions.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment History</title>
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
                <h1 class="mt-4"><?php echo admin_dashboard ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Pending Appointments</li>
                </ol>
                <div class="row">
                    <div class="float-left">
                        <div class="btn-group">
                            <a href="javascript: history.go(-1)" class="btn  btn-lg"><i class="text-secondary fas fa-arrow-left"></i></a>

                        </div>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <div class="row text-center mb-2">
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <select class="form-control" onchange="this.form.submit()" name="skill">
                                    <option selected><?= $_POST['skill'] ?? 'Filter appointments by specialization'; ?></option>
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
                    <div class="col-lg-6">
                        <form action="" class="form-inline"   method="post">
<div class="form-group">
                            <input type="date"  name="appntdate" class="form-control">
</div>
                            <div class="form-group ml-2">
                            <button type="submit" class="btn btn-primary" name="filter">Filter by date</button>
                            </div>
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
                <?php if (mysqli_num_rows($appnts)>0){ ?>
                    <table class="table table-hover table-responsive" id="sample-table-1">
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th >Pntn. Name</th>
                            <th >Doctor Name</th>
                            <th>Specialization</th>
                            <th>Fee</th>
                            <th>Appnt. Time </th>
                            <th>Booking Date  </th>
                            <th>Status</th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($row=mysqli_fetch_array($appnts))
                        {
                            ?>

                            <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td class=" text-capitalize"><?php echo pntname($row['userId']);?></td>
                                <td class=" text-capitalize"><?php echo docname($row['doctorId']);?></td>
                                <td><?php echo $row['doctorSpecialization'];?></td>
                                <td><?php echo currency.' '. formatMoney($row["consultancyFees"],true);?></td>
                                <td><?php echo
                                    formatAppointment($row['appointmentDate']);?>
                                    <?php echo
                                    $row['appt_time'];?>
                                </td>
                                <td><?php echo timeAgo($row['postingDate']);?></td>
                                <td>
                                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                                    {
                                        echo "Active";
                                    }
                                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))
                                    {
                                        echo "Cancelled by Patient";
                                    }
                                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))
                                    {
                                        echo "Cancelled by Doctor";
                                    }
                                    if(($row['userStatus']==1) && ($row['doctorStatus']==2))
                                    {
                                        echo "Appointment was success";
                                    }

                                    ?>
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
                        <h5 class="text-center text-danger  text-bold"><?php echo $notfound; ?></h5>



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
