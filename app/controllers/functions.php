<?php
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
function timeAgo($timestamp)
{

    date_default_timezone_set("africa/nairobi");
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks = round($seconds / 604800); // 7*24*60*60;
    $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {

        return "Just Now";

    } else if ($minutes <= 60) {

        if ($minutes == 1) {

            return "1 minute ago";

        } else {

            return "$minutes minutes ago";

        }

    } else if ($hours <= 24) {

        if ($hours == 1) {

            return "an hour ago";

        } else {

            return "$hours hrs ago";

        }

    } else if ($days <= 7) {

        if ($days == 1) {

            return "yesterday";

        } else {

            return "$days days ago";

        }

    } else if ($weeks <= 4.3) {

        if ($weeks == 1) {

            return "1 week ago";

        } else {

            return "$weeks weeks ago";

        }

    } else if ($months <= 12) {

        if ($months == 1) {

            return "a month ago";

        } else {

            return "$months months ago";

        }

    } else {

        if ($years == 1) {

            return "1 year ago";

        } else {

            return "$years years ago";

        }
    }
}

function formatAppointment($appntdate){
   $dt1= date('F jS, Y', strtotime($appntdate));
    return $dt1;
}
function getanswer($id){
    global $conn;
    $getanswer=mysqli_query($conn,"select faq_ans from faq_answers where faq_id='$id'");
    $answer="";
    if (mysqli_num_rows($getanswer)<1){
        $answer="N/A";
        return  $answer;
     }else{
        $answer=mysqli_fetch_assoc($getanswer)['faq_ans'];
return  $answer;
     }




}
function getdateanswered($id){
    global $conn;
    $getdate=mysqli_query($conn,"select date_answered from faq_answers where faq_id='$id'");
    $answer="";
    if (mysqli_num_rows($getdate)<1){
        $answer="N/A";
        return  $answer;
    }else{
        $answer=mysqli_fetch_assoc($getdate)['date_answered'];
        return  timeAgo($answer);
    }




}
function getinvoicestatus($id){
    global $conn;
    $invoicestatus=mysqli_query($conn,"select status from payments where id='$id'");
$status=mysqli_fetch_assoc($invoicestatus)['status'];

if ($status==0){
    return "<p class='text-danger'>Not paid</p>";
}else{
    return "<p class='text-success'>Paid</p>";
}
}
function docname($drid){
    global $conn;
    $docname=mysqli_query($conn,"select doctorName from doctors where id='$drid'");
    return mysqli_fetch_assoc($docname)['doctorName'];
}
function pntname($id){
    global $conn;
    $pntname=mysqli_query($conn,"select fullName from users where id='$id'");
    return mysqli_fetch_assoc($pntname)['fullName'];
}
function countfeedbacks($id){
    global $conn;
    $countfeedbacks=mysqli_query($conn," select count(*) as total_fed from med_feedback where user_id='$id' and viewed='0'");
    return mysqli_fetch_assoc($countfeedbacks)["total_fed"];

}
function countinvoice($id){
    global $conn;
    $countinvoices=mysqli_query($conn," select count(*) as total_invo from payments where status='0'");
    return mysqli_fetch_assoc($countinvoices)["total_invo"];


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

function checkifappoinmentexpired($id){
    global  $conn;
    $appointment=mysqli_query($conn,"select * from appointment where  id='$id' and doctorStatus='1' and userStatus='1'");
    $daterow=mysqli_fetch_assoc($appointment);

    $date1 = new DateTime($daterow['appointmentDate']);
    $dt1 = $date1->format('Y-m-d');

    $dateappnt=$date1->format("Y-m-d");

    $td = date('Y-m-d');



    if ($dateappnt<$td){
        $upappnt=mysqli_query($conn,"update appointment set doctorStatus='2' where id='$id' ");
        $payment=mysqli_query($conn,"insert into payments set pnt_id='".$daterow['userId']."',doc_id='".$_SESSION['dr_id']."',amount='".$daterow['consultancyFees']."'");

    }
return false;
}
function getfaqstatus($id){
    global $conn;
    $getstatus=mysqli_query($conn,"select * from faq_answers where faq_id='$id'");
    if (mysqli_num_rows($getstatus)>0){
        return "<p class='text-success'>Answered</p>";
    }else{
        return "<p class='text-warning'>Not Answered</p>";
    }
}
function getfaqanswer($id){
    global $conn;
    $getanswer=mysqli_query($conn,"select * from faq_answers where faq_id='$id'");

    if (mysqli_num_rows($getanswer)>0){
        $rowans=mysqli_fetch_array($getanswer);
    echo    $answer=$rowans['faq_ans'];

    }else{
        return "<form method='post' action=''>
<input type='hidden' value='$id' name='faqid'>
<div class='form-group'>
<textarea class='form-control' name='faqans' placeholder='Add answer' required></textarea>
</div>
<button type='submit' class='btn btn-primary' name='f_ans'>Answer</button>

</form>";
    }


}
function getmedicalhistory($id){
    global $conn;
    $medhistory=mysqli_query($conn,"select * from medicalhist where pnt_id='$id'");
    if (mysqli_num_rows($medhistory)>0){
        return "<p><button data-toggle='modal' data-target='#medical'> View Medical History</button></p>";
    }else{
        return "<p><button>No medical History</button></p>";
    }

}