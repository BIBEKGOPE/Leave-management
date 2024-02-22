<?php
require('db.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "select * from emp_data where emp_email = '$email' and e_pass = '$password'";
    $qry = mysqli_query($con, $select);
    if (mysqli_num_rows($qry) == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $email;
        $fetch_emp = mysqli_fetch_assoc($qry);
        if ($fetch_emp['role_id'] == 2) {
            header('location: backend/empleaves.php');
        }else{
            header('location: backend/apply.php');

        }
    } else {
        echo "Failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylessheet" href="../project leave 2023/login.css">
</head>

</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="" method="post">
                                <h3 class="mb-5">Please Enter Your Details! </h3>

                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <!-- Checkbox -->


                                <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>

                                

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>