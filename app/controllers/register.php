<?php
$msg="";
$msg_class="";
session_start();
if(isset($_POST['regptnt']))
{
    $fname=filter_var(stripslashes($_POST['full_name']), FILTER_SANITIZE_STRING);
    $address=filter_var(stripslashes($_POST['address']), FILTER_SANITIZE_STRING);
    $pno=filter_var(stripslashes($_POST['pno']), FILTER_SANITIZE_STRING);
    $city=filter_var(stripslashes($_POST['city']), FILTER_SANITIZE_STRING);
    $gender=filter_var(stripslashes($_POST['gender']), FILTER_SANITIZE_STRING);
    $email=filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $password=filter_var(stripslashes($_POST['password']), FILTER_SANITIZE_STRING);
    $cpassword=filter_var(stripslashes($_POST['password_again']), FILTER_SANITIZE_STRING);
    if (empty($_POST['full_name']) ||empty($_POST['address'])|| empty($_POST['pno']|| empty($_POST['city']) || empty($_POST['gender'])|| empty($_POST['email']) || empty($_POST['password']))){
        $msg = "inputs can not be empty";
        $msg_class="alert-danger";
    }    else{
        if(!empty($_POST["email"])) {
            $email= $_POST["email"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

                $msg='invalid email';
                $msg_class='alert-danger';
            }else{


                $sql_e = "SELECT * FROM users WHERE email='$email'";

                $res_e = mysqli_query($conn, $sql_e);

                $sql_u = "SELECT * FROM users WHERE p_no='$pno'";

                $res_u = mysqli_query($conn, $sql_u);


                if(strlen(trim($password)) <6)
                {
                    $msg = "password too short";
                    $msg_class = "alert-danger";
                }else{



// check if passwords match
                    if ($password !== $cpassword) {
                        $msg = "The passwords do not match";
                        $msg_class = "alert-danger";
                    } elseif ($password == $cpassword) {

                        if (mysqli_num_rows($res_e) > 0) {
                            $msg = "Email is already associated with an account";
                            $msg_class = "alert-danger";
                        }elseif (mysqli_num_rows($res_u)>0){
                            $msg = "mobile number is already associated with an account";
                            $msg_class = "alert-danger";
                        } else {
                            $hash = password_hash($password, PASSWORD_DEFAULT);

// For image upload

// Upload image only if no errors
                            if (empty($error)) {





                                $query="insert into users set fullname='$fname',address='$address',city='$city',gender='$gender',p_no='$pno',email='$email',password='$hash'";
                                if (mysqli_query($conn, $query)) {
                                    $_SESSION['id'] = mysqli_insert_id($conn);



                                    $_SESSION['fname'] = $fname;
                                    $_SESSION['email'] = $email;
                                    if (isset($_SESSION['id'])){
                                        echo "<script>
alert('Successfully Registered.');
 window.location.href='dashboard/userdashboard.php';
</script>";
                                    }



                                }
                            }



                            else {
                                $msg = "There was an Error in the database";
                                $msg_class = "alert-danger";
                            }
                        }
                    }
                }

            }}}}



