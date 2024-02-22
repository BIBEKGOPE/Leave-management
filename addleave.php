

<?php
include('includes/nav.php');

if(isset($_POST['submit'])){
    $leave=$_POST['leave'];
    $maxday= $_POST['maxday'];

    $res="INSERT INTO `leave_type`( `l_type`, `max_l_day`) VALUES ('$leave','$maxday')";

    $q = mysqli_query($con,$res);
    if ($q) {
        ?>
        <script>
           // alert(" Your leave application is submitted Successfully");
            location.href='leavelist.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("failed");
        </script>
        <?php
    }
}
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
                                    <input type="text" class="form-control" name="leave" aria-label="Default select example">
                                </div>
                               
                                
                                
                                <div class="mb-3 ">
                                    <label for="">Enter maximum days</label>
                                    <input type="number" class="form-control" name="maxday" aria-label="Default select example">
                                </div>
                               
                                
                            </div>
                            
                            
                            
                            
                            
                            <div class="col">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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