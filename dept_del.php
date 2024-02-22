<?php
require('../db.php');

$d_id =$_GET['d_id'];
$qryy= "DELETE FROM `emp_dept` WHERE d_id = $d_id ";

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