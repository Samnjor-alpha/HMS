<?php
include '../database/config.php';
include '../app/sessions/session.php';
include '../app/controllers/bookappt.php';
include "../app/controllers/functions.php";

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
                <form role="form" name="book" method="post" >

                    <div class="form-group">
                        <label for="DoctorSpecialization">
                            Doctor Specialization
                        </label>
                        <input name="drspec" value="<?php echo getdoctorspec($_GET['doctor']) ?>" class="form-control" id="DoctorSpecialization" readonly>

                    </div>




                    <div class="form-group">
                        <label for="doctor">
                            Doctor Name
                        </label>
                        <input name="drname" value="<?php echo getdoctorsname($_GET['doctor']) ?>" class="form-control" id="doctor" readonly>
                    </div>





                    <div class="form-group">
                        <label for="fees">
                            Consultancy Fees( <?php echo currency?>)
                        </label>
                        <input name="fees" class="form-control" id="fees" value="<?php echo getfee($_GET['doctor'])?>"  readonly>


                    </div>

                    <div class="form-group">
                        <label for="AppointmentDate">
                            Date
                        </label>
                        <input type="date" id="AppointmentDate" class="form-control" name="appdate"  required="required" data-date-format="yyyy-mm-dd">

                    </div>

                    <div class="form-group">
                        <label for="bizhrs">
                            Time
                        </label>
                      <select  name="bizhrs" id="bizhrs" class="form-control">

                          <option  disabled selected>Choose Appt. Time</option>
                          <?php while($row=mysqli_fetch_array($getdrbizhrs)){
                              ?>
                              <option value="<?php echo htmlentities($row['hours']);?>">
                                  <?php echo htmlentities($row['hours']);?>
                              </option>
                          <?php } ?>

                      </select>

                    </div>

                    <button type="submit" name="bookappt" class="btn btn-block theme-btn">
                       Book Appointment
                    </button>
                </form>

            </div>
        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>
</body>
</html>
