<?php include 'database/config.php';
include 'app/controllers/resetpassword.php';
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Reset Password</title>
    <?php include 'resources/styles.php'?>


</head>
<header id="home" class="header">

    <?php include 'resources/header.php'?>

</header>
<!--========================= service-section start ========================= -->
<section id="contact" class="contact-section  pt-20 pb-160">

    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="section-title text-center mb-55">

                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"><?php echo reset_pwdttle?></h2>

                </div>
            </div>
        </div>


        <div   class="contact-form ">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div>
                        <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?> alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $msg; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
                    && ($_GET["action"]=="reset") && !isset($_POST["action"])){
                    $key = $_GET["key"];
                    $email = $_GET["email"];
                    $curDate = date("Y-m-d H:i:s");
                    $query = mysqli_query($conn,
                        "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
                    );
                    $row = mysqli_num_rows($query);
                    if ($row==""){?>

                        <h3 class="text-center text-white pt-5"><?php echo APP_NAME?></h3>
                        <form action=""  method="POST"  class="contact-form">
                       <h2 class="text-center text-danger">Link Expired</h2>
                        <p class="text-center">The link is expired. You are trying to use the expired link which
                                is valid only 24 hours (1 days after request).<br /><br /></p>
                        <a class="btn btn-block theme-btn" href="forgot-password.php">Reset password.</a>
                        </form>
                  <?php  }else{
                    $row = mysqli_fetch_assoc($query);
                    $expDate = $row['expDate'];
                    if ($expDate >= $curDate){
                    ?>                                               <h3 class="text-center text-white pt-5"><?php echo APP_NAME?></h3>
                        <form action=""  method="POST"  class="contact-form">

                                                <input type="hidden" name="action" value="update" />

                                                <label for="email"  class="align-content-center">Enter new password:</label><br>
                                                <input type="password" class="form-control" name="pass1" maxlength="15" required />

                                                <label for="email"  class="align-content-center">Re-Enter password:</label><br>
                                                <input type="password" name="pass2" class="form-control" maxlength="15" required/>

                                                <input type="hidden" name="email" value="<?php echo $email;?>"/>
                                                <input type="submit" value="Reset Password"  class="btn btn-block btn-info"/>
                                            </form>

                    <?php
                    }else{?>


                                                <form id="login-form" class="form" method="post" action="" name="update">
                                                    <h3 class="text-center text-info">Alert</h3>
                                                    <h2>Link Expired</h2>
                                                    <p>The link is expired. You are trying to use the expired link which
                                                        is valid only 24 hours (1 days after request).<br /><br /></p>"
                                                </form>

                    <?php
                    }}}


                    if(isset($_POST["email"]) && isset($_POST["action"]) &&
                        ($_POST["action"]=="update")){
                        $error="";
                        $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1!=$pass2){
                            $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if($error!=""){
                            echo "<div class='error'>".$error."</div><br />";
                        }else{
                            $hash = password_hash($pass1, PASSWORD_DEFAULT);
                            mysqli_query($conn,
                                "UPDATE `users` SET `password`='".$hash."' WHERE `email`='".$email."';"
                            );

                            mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

                            ?>
                                                    <form id="login-form" class="form" method="post" action="" name="update">


                                                        <p class="text-center text-success">Password has been reset successfully<br /><br /></p>"
                                                        <a class="btn btn-block btn-info" href="userlogin.php">Login here</a>
                                                    </form>


                        <?php }
                    }
                    ?>
                    <p class="form-message pt-15"></p>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include 'resources/footer.php'?>
<!-- ========================= footer end ========================= -->


<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top">
    <i class="lni lni-arrow-up"></i>
</a>

<!-- ========================= JS here ========================= -->
<?php include "resources/scripts.php"; ?>
<body>
</body>
</html>