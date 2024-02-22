

<?php
include('includes/nav.php');

if(isset($_POST['submit'])){
    $desig=$_POST['desig'];

    $res="INSERT INTO `emp_desig`( `des_name`) VALUES ('$desig')";

    $q = mysqli_query($con,$res);
    if ($q) {
        ?>
        <script>
           // alert(" Your leave application is submitted Successfully");
            location.href='desiglist.php';
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
                            <h4 class="card-title">Designation Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="adddesig.php">
                           
                        
                        <div class="col">
                                <div class="mb-3 ">
                                    <label for="">Enter Designation/Post</label>
                                    <input type="text" class="form-control" name="desig" aria-label="Default select example">
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