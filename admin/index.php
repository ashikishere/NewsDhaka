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
                        <a href="index.php"><img src="assets/images/logo/loago.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <input type="submit" value="Log in" class="btn btn-primary btn-block btn-lg shadow-lg mt-5"
                            name="login">
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="register.php" class="font-bold">Sign
                                up</a>.</p>
                        <!-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> -->
                    </div>
                    <?php
                    if (isset($_POST['login'])) {
                        $email = mysqli_real_escape_string($db, $_POST['email']);
                        $password = mysqli_real_escape_string($db, $_POST['password']);

                        #encyptred password
                        $hassedpass  = sha1($password);
                        $sql = "SELECT * FROM users WHERE email='$email'";
                        $the_user = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($the_user)) {
                            $_SESSION['id'] =    $row['id'];
                            $_SESSION['name'] =    $row['name'];
                            $_SESSION['username'] =    $row['username'];
                            $session_pass  = $row['password'];
                            $_SESSION['email'] =    $row['email'];
                            $_SESSION['phone'] =    $row['phone'];
                            $_SESSION['address'] =    $row['address'];
                            $_SESSION['role'] =    $row['role'];
                            $_SESSION['image'] =    $row['image'];
                        }
                        if ($email == $_SESSION['email'] && $session_pass == $hassedpass) {
                            header("Location: dashboard.php");
                        } elseif ($email !== $_SESSION['email'] || $session_pass !== $hassedpass) {
                            header("Location: index.php");
                        } else {
                            header("Location: index.php");
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <?php ob_end_flush(); ?>
</body>

</html>