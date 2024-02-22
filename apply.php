<?php
include('includes/nav.php');

if (isset($_POST['submit'])) {
    $l_id = $_POST['l_id'];
    $fromdt = $_POST['fromdt'];
    $todt = $_POST['todt'];
    $des = $_POST['des'];
    $nods = $_POST['nods'];
    $select = "select * from emp_data where emp_email = '$_SESSION[username]'";
    $q = mysqli_query($con, $select);
    $fetch_e_id = mysqli_fetch_assoc($q);
    $emp_id = $fetch_e_id['emp_id'];

    $sql = "INSERT INTO `employee_leaves`( `emp_id`, `l_id`, `r_from`, `r_to`,`nod`, `des`, `status`,`forward_status`) VALUES ('$emp_id','$l_id','$fromdt','$todt','$nods','$des','pending','applied')";
    $qry = mysqli_query($con, $sql);
    if ($qry) {
        ?>
        <script>
            alert("Your leave application is submitted successfully");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Failed");
        </script>
        <?php
        echo mysqli_error($con);
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
                            <h4 class="card-title">Apply Leave</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="mb-3 col">
                                    <label>Choose leave type</label>
                                    <select name="l_id" class="form-control">
                                        <?php
                                        $select = "select * from leave_type";
                                        $qry = mysqli_query($con, $select);
                                        while ($fetch_l_type = mysqli_fetch_assoc($qry)) {
                                            ?>
                                            <option value="<?= $fetch_l_type["l_id"] ?>"><?= $fetch_l_type['l_type'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Leave From</label>
                                        <input type="date" name="fromdt" id="fromdt" class="form-control" aria-label="Default select example">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Leave To</label>
                                        <input type="date" name="todt" id="todt" class="form-control" aria-label="Default select example">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="mb-3">
                                    <label for="">No. of days</label>
                                    <input type="number" class="form-control" name="nods" id="nods" aria-label="Default select example">
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputText040" class="h8">Description</label>
                                            <textarea class="form-control" name="des" id="exampleInputText040" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <br>
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

<script>
    // Get the "Leave From" and "Leave To" input fields
    var fromDtInput = document.getElementById('fromdt');
    var toDtInput = document.getElementById('todt');
    var nodsInput = document.getElementById('nods');

    // Add event listeners to detect changes in the input fields
    fromDtInput.addEventListener('change', calculateNoOfDays);
    toDtInput.addEventListener('change', calculateNoOfDays);

    // Function to calculate the number of days
    function calculateNoOfDays() {
        var fromDt = new Date(fromDtInput.value);
        var toDt = new Date(toDtInput.value);

        // Calculate the difference in milliseconds between the two dates
        var diffMs = toDt - fromDt;

        // Convert the difference to days
        var diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));

        // Set the calculated number of days in the "No. of days" input field
        nodsInput.value = diffDays;
    }
</script>

<?php
include('includes/footer.php');
?>
