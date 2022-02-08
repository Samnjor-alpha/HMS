<?php include 'database/config.php' ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Wilson Medical Center</title>
<?php include 'resources/styles.php'?>


</head>

<body>

<header id="home" class="header">

  <?php include 'resources/header.php'?>

    <div class="slider-wrapper">
        <!-- ========================= slider-section start ========================= -->
  <?php  include 'resources/slider.php'?>
        <!-- ========================= slider-section end ========================= -->
    </div>
</header>
<!-- ========================= header end ========================= -->



<!--========================= we-do-section start========================= -->
<!--========================= we-do-section start========================= -->

<!-- ========================= about-section start ========================= -->
<section id="about" class="about-section pt-10 pb-10">
    <div class="container">

        <div class="row text-center mb-55">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
<h3>Patients Login</h3>
                        <div class="service-icon mb-25">
                            <img height="50" width="50" src="<?php echo BASE_URL?>/public/assets/img/we-do/we-do-1.svg" alt="Logo">
                        </div>
                        <p>Register & Book Appointment</p>
                        <div class="button"><span><a href="userlogin.php">Click Here</a></span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Doctors Login</h3>
                        <div class="service-icon mb-25">
                            <img height="50" width="100"      src="<?php echo BASE_URL?>/public/assets/img/we-do/doctor.svg" alt="Logo">
                        </div>
                        <p>Login to manage appointments</p>
                        <div class="button"><span><a href="doctor-login.php">Click Here</a></span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   </section>
<!-- ========================= about-section end ========================= -->

<!--========================= service-section start ========================= -->
<section id="services" class="service-section pt-15">
    <?php include 'resources/views/services.php'?>

</section>
<!--========================= service-section end ========================= -->

<!--========================= faq-section start ========================= -->
<section class="faq-section theme-bg">
  <?php include 'resources/views/faq.php'?>
</section>



<!-- ========================= contact-section end ========================= -->

<!-- ========================= footer start ========================= -->
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