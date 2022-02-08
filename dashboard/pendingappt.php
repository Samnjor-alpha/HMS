<?php
include '../database/config.php';
include '../app/sessions/session.php';
include '../app/controllers/pendingappnts.php';
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
                <h1 class="mt-4">Dashboard</h1>
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

                <div>
                    <?php if (!empty($msg)): ?>
                        <div class="alert <?php echo $msg_class ?>"><?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (mysqli_num_rows($appnts)>0){ ?>
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th class="hidden-xs">Doctor Name</th>
                        <th>Specialization</th>
                        <th>Consultancy Fee</th>
                        <th>Appnt. Date / Time </th>
                        <th>Booking Date  </th>
                        <th>Current Status</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while($row=mysqli_fetch_array($appnts))
                    {
                        ?>

                        <tr>
                            <td class="center"><?php echo $cnt;?>.</td>
                            <td class="hidden-xs"><?php echo $row['docname'];?></td>
                            <td><?php echo $row['doctorSpecialization'];?></td>
                            <td><?php echo currency.' '. formatMoney($row["consultancyFees"],true);?></td>
                            <td><?php echo
                                formatAppointment($row['appointmentDate']);?>
<!--                                 --><?php //echo
//                                $row['appointmentTime'];?>
                            </td>
                            <td><?php echo timeAgo($row['postingDate']);?></td>
                            <td>
                                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                                {
                                    echo "Active";
                                }
                                if(($row['userStatus']==0) && ($row['doctorStatus']==1))
                                {
                                    echo "Cancel by You";
                                }

                                if(($row['userStatus']==1) && ($row['doctorStatus']==0))
                                {
                                    echo "Cancel by Doctor";
                                }



                                ?></td>

                        </tr>

                        <?php
                        $cnt=$cnt+1;
                    }?>


                    </tbody>
                </table>
<?php }else{?>

                <div id="notfound">
                    <div id="descnot">
                        <h5 class="text-center  text-bold">No appointments founds</h5>


                        <div class="text-center">
                            <a class="btn btn-primary" role="button" href="bookappt.php">Book Appointment</a>
                        </div>
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