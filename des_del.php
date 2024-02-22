
<?php
require('../db.php');

$des_id =$_GET['des_id'];
$qryy= "DELETE FROM `emp_desig` WHERE des_id = $des_id ";


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