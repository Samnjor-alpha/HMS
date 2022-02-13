<?php
$upcomingappnts=mysqli_query($conn,"select * from appointment where doctorId='".$_SESSION['dr_id']."' and userStatus='1' and doctorStatus='1'");
$previousappnts=mysqli_query($conn,"select * from appointment where doctorId='".$_SESSION['dr_id']."' and   doctorStatus='2' or DATE(appointmentDate) < DATE(NOW())");

$cnt=1;

if (isset($_GET['cancel'])){

    $update="update appointment set doctorStatus='0' where id = '".$_GET['id']."'";
    if (mysqli_query($conn,$update)) {
        echo "<script>
    alert('appointment cancelled successfully');
  window.location.href='javascript: history.go(-1)';
    </script>";
    }else{
        echo "<script>
    alert('An error occured.');
 window.location.href='javascript: history.go(-1)';
    </script>";
    }
}