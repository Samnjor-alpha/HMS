<?php
include '../database/config.php';
include '../app/sessions/adminsession.php';
include '../app/controllers/ad-profile.php';
include '../app/controllers/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../resources/dashboard-styles.php' ?>
</head>
<body class="sb-nav-fixed">
<?php include '../resources/ad-topbar.php'?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include '../resources/admin-sidebar.php'?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo admin_dashboard?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manage Profile</li>
                </ol>


                <form role="form" name="edit" method="post">


                    <div class="form-group">
                        <label for="fname">
                          UserName
                        </label>
                        <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['username']);?>" >
                    </div>

                    <div class="form-group">
                        <label for="fname">
                            Old Password
                        </label>
                        <input type="password" class="form-control" id="password" name="oldpwd" placeholder="Old Password"" required>

                    </div>
                    <div class="form-group">
                        <label for="fname">
                            New Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="fname">
                            Confirm New Password
                        </label>
                        <input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Confirm Password" required>
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
