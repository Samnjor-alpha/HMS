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
                    <li class="breadcrumb-item active">Appointment History</li>
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
                <?php if (mysqli_num_rows($previousappnts)>0){ ?>
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

                        while($row=mysqli_fetch_array($previousappnts))
                        {
                            ?>

                            <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td class=" text-capitalize"><a class="text-info" title="view profile" href="viewpatient.php?profile=<?php echo $row['userId'] ?>"><?php echo pntname($row['userId']);?></a></td>

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
                                    }elseif (($row['userStatus']==1) && ($row['doctorStatus']==2)){
                                        echo "<p class='text-success'>Appointment was successful</p>";
                                    }



                                    ?></td>
                                <td >    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==2) &&($row['feedbackstatus']==0))
                                    { ?>
                                        <a href="previousappnt.php" class="btn btn-primary"  data-toggle="modal" data-target="#<?php echo $ucnt?>" title="Give feedback">Give Feedback</a>

                                    <?php
                                    include '../resources/modalfeedback.php';} else {

                                        echo "<p class='text-info'>Feedback Sent!!</p>";
                                    } ?>

                                </td>
                            </tr>

                            <?php
                            $cnt=$cnt+1;
                            $ucnt++;
                        }?>


                        </tbody>
                    </table>
                <?php }else{?>

                <div id="notfound1">
                    <div id="descnot">
                        <h5 class="text-center text-danger  text-bold">No Appointments history</h5>



                    </div>
                </div>

            </div>
            <?php } ?>


        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>
pen modal
</button>

<!-- The Modal -->

</body>
</html>
