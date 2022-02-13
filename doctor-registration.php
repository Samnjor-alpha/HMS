<?php include 'database/config.php';
include 'app/controllers/register.php'
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Wilson Medical Center</title>
    <?php include 'resources/styles.php'?>


</head>
<body>
<header id="home" class="header">

    <?php include 'resources/header.php'?>

</header>
<!--========================= service-section start ========================= -->
<section id="contact" class="contact-section  pt-20 pb-160">

    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="section-title text-center mb-55">

                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s"><?php echo doc_regTittle?></h2>
                    <p class="wow fadeInLeft" data-wow-delay=".6s">

                        <?php echo doc_regdesc ?>
                    </p>
                </div>
            </div>
        </div>


        <div   class="contact-form ">
            <div class="row">
                <div class="col-xl-8 mx-auto">

                    <?php if (mysqli_num_rows($ret)>0){ ?>
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
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="dr_spec">
                                Doctor Specialization
                            </label>
                            <select id="dr_spec" name="drspec" class="form-control" required>
                                <option value="">Select Specialization</option>
                                <?php
                                while($row=mysqli_fetch_array($ret))
                                {
                                    ?>
                                    <option value="<?php echo htmlentities($row['specilization']);?>">
                                        <?php echo htmlentities($row['specilization']);?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctorname">
                                Doctor Name
                            </label>
                            <input type="text" id="doctorname" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
                        </div>


                        <div class="form-group">
                            <label for="address">
                                Doctor Clinic Address
                            </label>
                            <textarea id="address" name="clinicaddress" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fess">
                                Doctor Consultancy Fees
                            </label>
                            <input id="fess" type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
                        </div>

                        <div class="form-group">
                            <label for="no">
                                Doctor Contact no
                            </label>
                            <input id="no" type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
                        </div>

                        <div class="form-group">
                            <label for="docemail">
                                Doctor Email
                            </label>
                            <input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email" required="true" >
                                                    </div>




                        <div class="form-group">
                            <label for="exampleInputPassword1">
                                Password
                            </label>
                            <input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword2">
                                Confirm Password
                            </label>
                            <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
                        </div>



                        <button type="submit" name="drreg" id="submit" class="btn theme-btn btn-block">
                            Create account
                        </button>
                    </form>
                    <?php }else{ ?>
                        <h3 class="text-center text-danger">No specializations added check later</h3>
                    <?php } ?>
                    <div class="new-account">
                        Have an account?
                        <a href="doctor-login.php">
                            Login here
                        </a>
                    </div>

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

</body>
</html>