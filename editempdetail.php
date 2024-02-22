<?php
include('includes/nav.php');
$id = $_GET['emp_id'];

if (isset($_POST['update_emp'])&& isset($id)) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $d_id = $_POST['d_id'];
    $des_id = $_POST['des_id'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $adrs = $_POST['adrs'];

    $role = $_POST['role_id'];



    // $SELECT * FROM `leave_type` WHERE l_type=$type_leave
    $res = "update `emp_data` set `emp_f_name` = '$fname', `emp_m_name`='$mname', `emp_l_name`='$lname' ,`emp_email`='$email', `emp_mobn`='$phno' ,`emp_adres`='$adrs' ,`d_id`='$d_id', `des_id`='$des_id',`role_id` = '$role' where emp_id = $id";
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

$select = "select * from emp_data where emp_id = '$id'";
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
                            <h4 class="card-title">Employee Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-4 mb-3">

                                    <div class="mb-3 col    ">
                                        <label for="">Enter first name</label>
                                        <input type="text" value="<?= $fetch['emp_f_name'] ?>" name="fname" class="form-control">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter middle name</label>
                                        <input type="text" value="<?= $fetch['emp_m_name'] ?>" name="mname" class="form-control">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter last name</label>
                                        <input type="text" value="<?= $fetch['emp_l_name'] ?>" name="lname" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class=" mb-3 ">
                                    <label>Choose Designation/post </label>
                                    <select name="des_id" class="form-control">
                                        <?php
                                        $select = "SELECT * FROM `emp_desig`";
                                        $qry = mysqli_query($con, $select);
                                        while ($fetch_emp_desig = mysqli_fetch_assoc($qry)) {
                                        ?>

                                            <option value="<?= $fetch_emp_desig["des_id"] ?>"><?= $fetch_emp_desig['des_name'] ?>
                                            </option>
                                        <?php
                                        }


                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class=" mb-3 col">
                                            <label>Choose Department </label>
                                            <select name="d_id" class="form-control">
                                                <?php
                                                $select = "SELECT * FROM `emp_dept`";
                                                $qry = mysqli_query($con, $select);
                                                while ($fetch_emp_dept = mysqli_fetch_assoc($qry)) {
                                                ?>

                                                    <option value="<?= $fetch_emp_dept["d_id"] ?>"><?= $fetch_emp_dept['d_name'] ?>
                                                    </option>
                                                <?php
                                                }


                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class=" mb-3 col">
                                            <label>Choose Role </label>
                                            <select name="role_id" class="form-control">
                                                <?php
                                                $select = "SELECT * FROM `role`";
                                                $qry = mysqli_query($con, $select);
                                                while ($fetch_emp_desig = mysqli_fetch_assoc($qry)) {
                                                    if ($fetch_emp_desig['name'] != 'pinky' && $fetch_emp_desig['name'] != 'admin') {


                                                ?>

                                                        <option value="<?= $fetch_emp_desig["role_id"] ?>"><?= $fetch_emp_desig['name'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">

                                    <div class="mb-3 col    ">
                                        <label for="">Enter email</label>
                                        <input type="email" name="email" value="<?= $fetch['emp_email'] ?>" class="form-control" aria-label="Default select example">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter phone number</label>
                                        <input type="tel" name="phno" value="<?= $fetch['emp_mobn'] ?>" class="form-control" maxlength="10" minlength="10" placeholder="0123456789" pattern="[0-9]{10}" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="">Enter employee address</label>
                                    <input type="text" value="<?= $fetch['emp_adres'] ?>" class="form-control" name="adrs" aria-label="Default select example">
                                </div>


                            </div>
                            <hr>

                            <div class="col">
                                <button type="submit" name="update_emp" class="btn btn-primary">Submit</button>
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