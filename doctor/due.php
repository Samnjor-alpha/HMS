<?php
include '../database/config.php';
include '../app/sessions/drsession.php';
include '../app/controllers/billing.php';
include '../app/controllers/functions.php';
include '../app/controllers/doctordashboard.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bills invoices</title>
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
                        <li class="breadcrumb-item active">Payments Due</li>
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
                    <?php if (mysqli_num_rows($invoices)>0){ ?>
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                            <tr>
                                <th class="center">#</th>
                                <th class="">Billed to</th>
                                <th>Amount</th>
                                <th>Date Due</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            while($row=mysqli_fetch_array($invoices))
                            {
                                ?>

                                <tr>
                                    <td class="center"><?php echo $cnt;?>.</td>
                                    <td class=" text-capitalize"><?php echo pntname($row['pnt_id']);?></td>                                    <td><?php echo currency.' '. formatMoney($row["amount"],true);?></td>
                                    <td><?php echo
                                        formatAppointment($row['date']);?>
                                        <!--                                 --><?php //echo
                                        //                                $row['appointmentTime'];?>
                                    </td>

                                    <td>
                                        <?php echo getinvoicestatus($row['id'])                                      ?></td>
                                    <td><?php
                                        if($row['status']==0)                                      {  ?>
                                        <a href="due.php?paid=<?php echo $row['id'] ?>" class="btn btn-primary">Mark Paid</a>
<?php }else {
 echo "<p class='text-info'>Settled!!</p>";                                        }
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
                            <h5 class="text-center  text-danger text-bold">No due invoices found</h5>



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
<?php
