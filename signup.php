<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/signup.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/passwordPreview.js"></script>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="left col-12 col-sm-12 col-md-6">
                   <div class = "logo">
                        <a href="index.php">
                            <img src="img/logo/logo-light.svg" width="100%">
                        </a>
                    </div>
                </div>
                <div class="right col-12 col-sm-12 col-md-6">
                    <form action="" method="POST" autocomplete="off">
                        <div class="sign-up-form">
                            <h2>Welcome to Duty<span class="glow-hub">Hub</span></h2>
                            <div class="email-section col-6 offset-3 mt-2">
                                <h5>Email</h5>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floating-email" placeholder="Email" required>
                                    <label for="floating-email">user@example.com</label> 
                                </div>
                            </div>
                            <div class="username-section col-6 offset-3 mt-2">
                                <h5>Username</h5>
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="floating-username" placeholder="Username" required>
                                    <label for="floating-username">Enter your username</label>
                                </div>
                            </div>
                            <div class="password-section col-6 offset-3 mt-2">
                                <h5>Password</h5>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floating-password" placeholder="Password" required>
                                    <span onclick="showHidePassword()"><i class="bi bi-eye-fill" id="eye" onclick="changeIcon()"></i></span>
                                    <label for="floating-password">Enter your password</label>
                                </div>
                            </div>
                            <div class="repassword-section col-6 offset-3 mt-2">
                                <h5>Confirm password</h5>
                                <div class="form-floating">
                                    <input type="password" name="repassword" class="form-control" id="floating-repassword"placeholder="Password" required>
                                    <span onclick="showHideRePassword()"><i class="bi bi-eye-fill" id="eye2" onclick="changeIcon2()"></i></span>
                                    <label for="floating-repassword">Re-enter your password</label>
                                </div>
                            </div>
                            <div class="button-section offset-3 mt-2">
                                <button type="button" class="btn btn-dark col-8">Create account</button>
                            </div>
                            <div class="login-question col-6 offset-3 mt-2">
                                Already have an account?
                                <a href="signin.php" class="sign-in-text">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>