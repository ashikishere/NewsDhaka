<?php

include "inc/connection.php";
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
                    <?php

                    if (isset($_POST['register'])) {
                        $name = mysqli_real_escape_string($db, $_POST['name']);
                        $username = mysqli_real_escape_string($db, $_POST['username']);
                        $email =  mysqli_real_escape_string($db, $_POST['email']);
                        $password = mysqli_real_escape_string($db, $_POST['password']);
                        $retypepassword =  mysqli_real_escape_string($db, $_POST['cpassword']);

                        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($retypepassword)) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please provide valid info Here<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        } else {
                            if ($password == $retypepassword) {
                                # encripted pass
                                $hassedpass = sha1($password);

                                $insert_query = "INSERT INTO users(name, username, email, password,role) VALUES('$name','$username','$email','$hassedpass',0)";
                                $register_users = mysqli_query($db, $insert_query);
                                if ($register_users) {
                                    header('Location: index.php');
                                } else {
                                    die("Users insert error!!" . mysqli_error($db));
                                }
                            } else {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password not match.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                        }
                    }

                    ?>

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Full Name" name="name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="username"
                                name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Confirm Password"
                                name="cpassword">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Sign Up"
                            name="register">
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="index.php" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <?php ob_end_flush(); ?>

</body>

</html>