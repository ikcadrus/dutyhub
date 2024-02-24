<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $correctPassword = $row["password"];
        if(password_verify($password, $correctPassword)) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }else{
            echo "<script> alert('Wrong Password'); </script>";
        }
    }else{
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/pwPreviewSignIn.js"></script>
        <link rel="stylesheet" href="styles/signin.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/common.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="left col-12 col-sm-12 col-md-6">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/logo/logo-light.svg" width="100%">
                        </a>
                    </div>
                </div>
                <div class="right col-12 col-sm-12 col-md-6">
                    <form action="" method="POST" autocomplete="off">
                        <div class="sign-in-form">
                            <h2>Welcome to Duty<span class="glow-hub">Hub</span></h2>
                            <h2>Sign in</h2>
                            <div class="email-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Email</h5>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floating-input" placeholder="Email" required>
                                    <label for="floating-input">user@example.com</label>
                                </div>
                            </div>
                            <div class="password-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Password</h5>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floating-password-signin" placeholder="Password" required>
                                    <span onclick="showHidePasswordSignIn()"><i class="bi bi-eye-fill" id="eye0" onclick="changeIconSignIn()"></i></span>
                                    <label for="floating-password-signin">Enter your password</label>
                                </div>
                            </div>
                            <div class="check-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                </div>
                                <div>
                                    <a href="forgotPassword.php" class="forgot-password-text">Forgot password?</a>
                                </div>
                            </div>
                            <div class="button-section">
                                <button type="submit" name="submit" class="btn btn-dark col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">Sign In</button>
                            </div>
                            <div class="register-question col-8 offset-2 mt-2 text-center ">
                                Don't have an account? 
                                <a href="signup.php" class="sign-up-text">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>