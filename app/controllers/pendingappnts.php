<?php
$appnts=mysqli_query($conn,"select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='".$_SESSION['p_id']."'");
$cnt=1;