<?php
require 'config.php';
$email = isset($_SESSION['signUp_data']['email']) ? $_SESSION['signUp_data']['email'] : null;
$username = isset($_SESSION['signUp_data']['username']) ? $_SESSION['signUp_data']['username'] : null;
$password = isset($_SESSION['signUp_data']['password']) ? $_SESSION['signUp_data']['password'] : null;
$repassword = isset($_SESSION['signUp_data']['repassword']) ? $_SESSION['signUp_data']['repassword'] : null;
unset($_SESSION['signUp_data']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <link rel="stylesheet" href="styles/signup.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/common.css?v=<?php echo time(); ?>">
        <script src="script/pwPreviewSignUp.js?v=<?php echo time(); ?>"></script>
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
                    <form action="<?=URL?>registration.php" method="POST" autocomplete="off" id="form-register">
                        <div class="sign-up-form">
                            <h2>Welcome to Duty<span class="glow-hub">Hub</span></h2>
                            <h2>Sign up</h2>
                            <?php if(isset($_SESSION['signUp'])):?>
                                <div class="col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                    <p class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-circle"></i> 
                                    <strong><?=$_SESSION['signUp']; unset($_SESSION['signUp']);?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </p>
                                </div>
                            <?php endif ?>
                            <div class="email-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Email</h5>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floating-email" placeholder="Email" maxlength="255" value="<?= $email ?>" oninput="emailCheck()" onfocus="whenEmailEmpty()" required>
                                    <label for="floating-email">user@example.com</label> 
                                </div>
                            </div>
                            <div class="username-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Username</h5>
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="floating-username" placeholder="Username" maxlength="30" value="<?= $username ?>" oninput="usernameCheck()" onfocus="whenUsernameEmpty()" required>
                                    <label for="floating-username">Enter your username</label>
                                </div>
                            </div>
                            <div class="password-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Password</h5>
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="floating-password" placeholder="Password" maxlength="128" value="<?= $password ?>" oninput="passwordCheck()" onfocus="whenPasswordEmpty()" required>
                                        <label for="floating-password">Enter your password</label>
                                    </div>
                                <button class="btn button-password" type="button" id="btn-password"onclick="showHidePassword(); changeIcon()"><i class="bi-eye-fill" id="eye"></i></button>
                                </div>
                            </div>
                            <div class="repassword-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Confirm password</h5>
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="repassword" class="form-control" id="floating-repassword" placeholder="Password" maxlength="128" value="<?= $repassword ?>" oninput="repasswordCheck()" onfocus="whenRePasswordEmpty()" required>
                                        <label for="floating-repassword">Re-enter your password</label>
                                    </div>
                                    <button class="btn" type="button" id="btn-repassword" onclick="showHideRePassword(); changeIcon2()"><i class="bi-eye-fill" id="eye2"></i></button>
                                </div>
                            </div>
                            <div class="button-section">
                                <input type="hidden" name="submit_frm" value="1">
                                <button type="submit" name="submit_frm" class="g-recaptcha btn btn-dark col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2" data-sitekey="6LcH-nopAAAAACUNJoob_E35gITGJ-tv7snKnW4k" data-callback='onSubmit' data-action='submit'>Create account</button>
                            </div>
                            <div class="login-question col-8 offset-2 mt-2 text-center">
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