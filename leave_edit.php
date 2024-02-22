

<?php
include('includes/nav.php');
$id = $_GET['l_id'];
if (isset($_POST['update_leave'])&& isset($id)){
    $leave=$_POST['leave'];
    $maxday= $_POST['maxday'];

    $res="UPDATE `leave_type` SET `l_type`='$leave',`max_l_day`='$maxday' WHERE l_id=$id";
    $q = mysqli_query($con, $res);


    if ($q) {
?>
        <script>
            alert(" Updated  Successfully");
            history.go(-2)
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("failed");
        </script>
<?php
        echo mysqli_error($con);
    }
}

$select = "select * from leave_type where l_id = '$id'";
$q = mysqli_query($con, $select);
$fetch = mysqli_fetch_assoc($q);
?>


<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Leave Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                           
                            <div class="col">
                              <div class="mb-3 ">
                                    <label for="">Enter leave types</label>
                                    <input type="text" value="<?=$fetch['l_type']?>" class="form-control" name="leave" aria-label="Default select example">
                                </div>
                               
                                
                                
                                <div class="mb-3 ">
                                    <label for="">Enter maximum days</label>
                                    <input type="number" value="<?=$fetch['max_l_day']?>" class="form-control" name="maxday" aria-label="Default select example">
                                </div>
                               
                                
                            </div>
                            
                            
                            
                            
                            
                            <div class="col">
                                <button type="submit" name="update_leave" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn bg-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php
include('includes/footer.php')
?>