<?php
include '../database/config.php';
include '../app/sessions/session.php';
include '../app/controllers/profile.php';
include '../app/controllers/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../resources/dashboard-styles.php' ?>
</head>
<body class="sb-nav-fixed">
<?php include '../resources/topbar.php'?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include '../resources/usersidebar.php'?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manage Profile</li>
                </ol>


                <form role="form" name="edit" method="post">


                    <div class="form-group">
                        <label for="fname">
                            Full Names
                        </label>
                        <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
                    </div>


                    <div class="form-group">
                        <label for="address">
                            Address
                        </label>
                        <textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            City
                        </label>
                        <input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
                    </div>



                    <div class="form-group">
                        <label for="fess">
                            Email
                        </label>
                        <input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">

                    </div>







                    <button type="submit" name="submit" class="btn btn-block theme-btn">
                        Update Profile
                    </button>
                </form>


            </div>
        </main>
        <?php include '../resources/dashfooter.php'?>
    </div>
</div>
<?php include '../resources/dashboard-scripts.php'?>

</body>
</html>
