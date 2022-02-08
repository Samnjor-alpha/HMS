<?php
$smsg="";
$msg_class="";
session_start();
if(isset($_POST['logptnt'])){
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $msg = "complete fields!";
        $msg_class="alert-danger";
    } else{
       $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from users where email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows<1){
            $msg = "Account does not exist";
            $msg_class = "alert-danger";
        }else {

            $query = "select * from users where email='$email'";
            $result = $conn->query($query);

        }        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (!password_verify($_POST['password'], $row['password'])) {
                $msg = "Cross-check your password!!";
                $msg_class = "alert-danger";
            } else if (password_verify($_POST['password'], $row['password'])) {



                $_SESSION['p_id'] = $row['id'];// Password matches, so create the sessions
                 $_SESSION['pname'] = $row['fullName'];
                $_SESSION['pemail'] = $row['email'];


                header('Location: ' . BASE_URL . '/dashboard/userdashboard.php');

            }


        }}}