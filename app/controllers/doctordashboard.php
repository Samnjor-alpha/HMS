<?php
$checkappointmenthrs=mysqli_query($conn,"select * from bz_hrs where doc_id='".$_SESSION['dr_id']."'");
if (mysqli_num_rows($checkappointmenthrs)<1){
    echo "<script>
alert('Add business hours to receive Appointments');
 window.location.href='appttimes.php';
</script>";
}