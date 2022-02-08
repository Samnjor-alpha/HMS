<?php
$ret=mysqli_query($conn,"select * from doctorspecilization");

if (isset($_POST['skill'])){
$doctors=mysqli_query($conn,"select * from doctors where specilization ='".$_POST['skill']."'");
}elseif (isset($_GET['search'])){
$search=$_GET['search'];
$doctors=mysqli_query($conn,"select * from doctors where doctorName like '%$search% '");
}else{
    $doctors=mysqli_query($conn,"select * from doctors");
}


