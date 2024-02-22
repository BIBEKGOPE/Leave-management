<?php
include('includes/nav.php');
$id = $_GET['des_id'];
if (isset($_POST['update_desig']) && isset($id)) {
    $desig = $_POST['desig'];

    $res = "UPDATE `emp_desig` SET `des_name`='$desig' WHERE des_id=$id";
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

$select = "select * from emp_desig where des_id = '$id'";
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
                            <h4 class="card-title">Designation Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="">


                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="">Enter Designation/Post</label>
                                    <input type="text" value="<?= $fetch['des_name'] ?>" class="form-control" name="desig" aria-label="Default select example">
                                </div>


                            </div>



                            <div class="col">
                                <button type="submit" name="update_desig" class="btn btn-primary">Submit</button>
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