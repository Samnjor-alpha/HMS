<?php
$sql=mysqli_query($conn,"select * from users where id='".$_SESSION['p_id']."'");
$data=mysqli_fetch_array($sql);
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $city=$_POST['city'];


    $sql=mysqli_query($conn,"Update users set fullName='$fname',address='$address',city='$city' where id='".$_SESSION['p_id']."'");
    if($sql)
    {
 echo"<script>
alert('Profile update succesfully');
</script>";


    }

}