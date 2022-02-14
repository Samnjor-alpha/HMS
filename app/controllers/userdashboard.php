<?php

 function countallappnts($id){
     global $conn;
     $booked=mysqli_query($conn,"select count(*) as total from appointment where userId='$id' and doctorStatus='1'");
     return mysqli_fetch_assoc($booked)['total'];
}
function countallprevappnts($id){
    global $conn;
    $booked=mysqli_query($conn,"select count(*) as total from appointment where userId='$id' and DATE(appointmentDate) < DATE(NOW())");
    return mysqli_fetch_assoc($booked)['total'];
}
function getfeedbacks($id){
    global $conn;
    $feeds=mysqli_query($conn,"select count(*) as total from med_feedback where user_id='$id'");
    return mysqli_fetch_assoc($feeds)['total'];
}