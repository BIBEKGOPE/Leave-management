<?php
include('includes/nav.php');
/*
$fname = '';
$mname = '';
$lname = '';
$d_id = '';
$des_id = '';
$email = '';
$phno = '';
$adrs = '';
$pass = '';
$role = '';
$repeatpass='';

if(isset($_POST['emp_id'])){
$lal=mysqli_query($con,"SELECT * FROM `emp_data`where emp_id='$emp_id'");
$fetch_emp_data = mysqli_fetch_assoc($lal);
$fname = $fetch_emp_data ['fname'];
$mname = $fetch_emp['mname'];
$lname = $fetch_emp['lname'];
$d_id = $fetch_emp['d_id'];
$des_id = $fetch_emp['des_id'];
$email = $fetch_emp['email'];
$phno = $fetch_emp['phno'];
$adrs = $fetch_emp['adrs'];
$pass = $fetch_emp['pass'];
$role = $fetch_emp['role_id'];
$repeatpass = $fetch_emp['repeatpass'];

}
*/

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $d_id = $_POST['d_id'];
    $des_id = $_POST['des_id'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $adrs = $_POST['adrs'];
    $pass = $_POST['pass'];
    $role = $_POST['role_id'];
    $repeatpass = $_POST['repeatpass'];
    if ($pass == $repeatpass) {




        // $SELECT * FROM `leave_type` WHERE l_type=$type_leave
        $res = "INSERT INTO `emp_data`( `emp_f_name`, `emp_m_name`, `emp_l_name`, `emp_email`, `emp_mobn`, `emp_adres`, `e_pass`, `d_id`, `des_id`,`role_id`) VALUES ('$fname','$mname','$lname','$email','$phno','$adrs','$pass','$d_id','$des_id','$role')";
        $q = mysqli_query($con, $res);


        if ($q) {
?>
            <script>
                alert(" Your leave application is submitted Successfully");
                location.href = 'emplist.php';
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
    } else {
        ?>
        <script>
            alert("not match pass");
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
                            <h4 class="card-title">Add Employee Details</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="addemp.php">
                            <div class="row">
                                <div class="col-md-4 mb-3">

                                    <div class="mb-3 col    ">
                                        <label for="">Enter first name</label>
                                        <input type="text" name="fname" class="form-control">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter middle name</label>
                                        <input type="text" name="mname" class="form-control">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter last name</label>
                                        <input type="text" name="lname" class="form-control">

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
                                        <input type="email" name="email" class="form-control" aria-label="Default select example">

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Enter phone number</label>
                                        <input type="tel" name="phno" class="form-control" maxlength="10" minlength="10" placeholder="0123456789" pattern="[0-9]{10}" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="">Enter employee address</label>
                                    <input type="text" class="form-control" name="adrs" aria-label="Default select example">
                                </div>


                            </div>
                            <hr>
                            <h4 class="mb-3">Secuirity</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">

                                    <div class="mb-3 col    ">
                                        <label for="">Enter password</label>
                                        <input type="password" name="pass" class="form-control" id="password" required>

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3 col">
                                        <label for="">Confirm password</label>
                                        <input type="password" name="repeatpass" class="form-control" id="password" required>

                                    </div>
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