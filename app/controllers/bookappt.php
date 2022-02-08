<?php
$msg="";
$msg_class="";

if (empty($_GET['doctor'])){
    header('Location: ' . BASE_URL . '/dashboard/bookappt.php');
}
if (isset($_GET['doctor'])){
$doctor=mysqli_query($conn,"select * from doctors where id='".$_GET['doctor']."'");
}
function getdoctorsname($id){
global $conn;
$doctor=mysqli_query($conn,"select doctorName from doctors where id='$id'");
return mysqli_fetch_assoc($doctor)['doctorName'];
}
function getdoctorspec($id){
global $conn;
$doctor=mysqli_query($conn,"select specilization from doctors where id='$id'");
return mysqli_fetch_assoc($doctor)['specilization'];
}
function getfee($id){
global $conn;
$doctor=mysqli_query($conn,"select docFees from doctors where id='$id'");
return mysqli_fetch_assoc($doctor)['docFees'];
}

if (isset($_POST['bookappt'])){
    if (empty($_POST['drspec']) || empty($_POST['drname'])|| empty($_POST['fees'])|| empty($_POST['appdate'])) {
        $msg = "All fields are required!";
        $msg_class="alert-danger";
    }else{
        $drspec=filter_var(stripslashes($_POST['drspec']), FILTER_SANITIZE_STRING);
        $drid=$_GET['doctor'];
        $userid=$_SESSION['p_id'];
        $fee=filter_var(stripslashes($_POST['fees']), FILTER_SANITIZE_STRING);
        $appdate=filter_var(stripslashes($_POST['appdate']), FILTER_SANITIZE_STRING);
        //$apptime=filter_var(stripslashes($_POST['apptime']), FILTER_SANITIZE_STRING);

      //check whether doctor is having another appointment or a date is in the past
        $date1 = new DateTime($appdate);
        $dt1 = $date1->format('Y-m-d H:m');

$dateappnt=$date1->format("Y-m-d");

        $td = date('Y-m-d H:m');
        if ($td >= $dt1) {
            $msg="Appointments are done in future days";
            $msg_class="alert-danger";
        }else{
            $checkappointment=mysqli_query($conn,"select * from appointment where userId='$userid' and appointmentDate ='$dateappnt'");
            if (mysqli_num_rows($checkappointment)>0){
                $msg="You have an appointment on this date";
                $msg_class="alert-danger";
            }else{
                $query=mysqli_query($conn,"insert into appointment set doctorSpecialization='$drspec',doctorId='$drid',userId='$userid',consultancyFees='$fee',appointmentDate='$appdate'");
        if($query)
        {
            echo "<script>alert('Appointment booked successfully');</script>";
        }else{
            $msg = "There was an Error in the database";
            $msg_class = "alert-danger";
        }
    }}


}}