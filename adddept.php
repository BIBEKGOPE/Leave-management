<?php
include('includes/nav.php');


if(isset($_POST['submit'])){
    $dept = $_POST['dept'];

   
    $dept = mysqli_real_escape_string($con, $dept);

    $query = "INSERT INTO `emp_dept` (`d_name`) VALUES ('$dept')";

    $result = mysqli_query($con, $query);
    if ($result) {
        ?>
        <script>
            alert("Department added successfully");
            location.href='deptlist.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Failed to add department");
        </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
</head>
<body>
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
                            <form method="post" action="adddept.php">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="">Enter department</label>
                                        <input type="text" class="form-control" name="dept" aria-label="Default select example">
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
</body>
</html>

<?php
include('includes/footer.php');
?>
