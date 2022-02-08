<?php
$appnts=mysqli_query($conn,"select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='".$_SESSION['p_id']."'");
$cnt=1;

if (isset($_GET['cancel'])){

    $update="update appointment set userStatus='0' where id = '".$_GET['id']."'";
if (mysqli_query($conn,$update)) {
    echo "<script>
    alert('Appointment cancelled successfully');
  window.location.href='javascript: history.go(-1)';
    </script>";
}else{
    echo "<script>
    alert('An error occured.');
 window.location.href='javascript: history.go(-1)';
    </script>";
}
}