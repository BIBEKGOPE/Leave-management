
<?php
include('includes/nav.php');
$id = $_GET['d_id'];
if (isset($_POST['update_dept'])&& isset($id)) {
    $dept = $_POST['dept'];

    $res = "UPDATE `emp_dept` SET `d_name`='$dept' WHERE d_id=$id";

    $qry = mysqli_query($con, $res);
 
    if ($qry) {
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
        
        $select = "SELECT * FROM `emp_dept` WHERE d_id='$id'";
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
                            <h4 class="card-title">Department Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="">Enter department</label>
                                    <input type="text" value="<?=$fetch['d_name'] ?>" class="form-control" name="dept" aria-label="Default select example">
                                </div>


                            </div>






                            <div class="col">
                                <button type="submit" name="update_dept" class="btn btn-primary">Submit</button>
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