<?php
$invoices=mysqli_query($conn,"select * from payments where pnt_id='".$_SESSION['p_id']."' ");
$cnt=1;