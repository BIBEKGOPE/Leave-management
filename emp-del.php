<?php
require('../db.php');

$emp_id =$_GET['emp_id'];
$qryy= "DELETE FROM `emp_data` WHERE emp_id = $emp_id ";

// header('location:emplist.php');
if(mysqli_query($con,$qryy))
{
    ?>
    <script>
        alert('Deleted Successfully');
        history.go(-1);
    </script>
    <?php
}else{
    ?>
    <script>
        alert('Not Deleted<?=mysqli_error($con)?>');
        history.go(-1);
    </script>
    <?php
}