<?php
include '../database/config.php';
include '../app/sessions/drsession.php';
include '../app/controllers/upcomingappnts.php';
include "../app/controllers/functions.php";
include '../app/controllers/doctordashboard.php';

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
                    <li class="breadcrumb-item active">Upcoming Events</li>
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
                <?php if (mysqli_num_rows($upcomingappnts)>0){ ?>
                    <table class="table table-hover" id="sample-table-1">
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="">Patient Name</th>
                            <th>Appnt. Date / Time </th>
                            <th>Booking Date  </th>
                            <th>Current Status</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($row=mysqli_fetch_array($upcomingappnts))
                        {
                          checkifappoinmentexpired($row['id'])
                            ?>
                            <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td class=" text-capitalize"><?php echo pntname($row['userId']);?></td>

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
                                        echo "Cancelled Patient";
                                    }

                                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))
                                    {
                                        echo "Cancelled by you";
                                    }



                                    ?></td>
                                <td >    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                                    { ?>

                                        <a href="upcomingappt.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                    <?php } else {

                                        echo "Canceled";
                                    } ?>

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
                        <h5 class="text-center text-danger  text-bold">No upcoming Appointments</h5>



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
