

<?php
require('../db.php');

$l_id =$_GET['l_id'];
$qryy= "DELETE FROM `leave_type` WHERE l_id = $l_id ";


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