<?php
$ret=mysqli_query($conn,"select * from doctorspecilization");

if (isset($_POST['skill'])){
$doctors=mysqli_query($conn,"select * from doctors where specilization ='".$_POST['skill']."'");
if (mysqli_num_rows($doctors)<1){

    $querymsg='No doctors found under that specialization';
}
}elseif (isset($_GET['search'])){
$search=$_GET['search'];
$doctors=mysqli_query($conn,"select * from doctors where doctorName like '%$search% '");
    if (mysqli_num_rows($doctors)<1){

        $querymsg='Query does not match any details in our database';
    }
}else{
    $doctors=mysqli_query($conn,"select * from doctors");
    if (mysqli_num_rows($doctors)<1){

        $querymsg='No doctors found.Check again later';
    }
}


