<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_SESSION['token'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('/[\'!^$%&()@#?><,.=_+-]/', $password);

        if(empty($_POST['password'])){
            $_SESSION['reset'] = "No password!";
        }elseif(empty($_POST['repassword'])){
            $_SESSION['reset'] = "No repassword!";
        }elseif(!$uppercase || !$lowercase){
            $_SESSION['reset'] = "The password must contain uppercase and lowercase letters!"; 
        }elseif(!$number){
            $_SESSION['reset'] = "The password must contain numbers!"; 
        }elseif(!$specialchars){
            $_SESSION['reset'] = "The password must contain special chars!"; 
        }elseif($password !== $repassword){
            $_SESSION['reset'] = "Password doesn't match!";       
        }
    

        if(isset($_SESSION['reset'])){

            $_SESSION['reset_data'] = $_POST;
            header('location:'. $root . 'resetPassword.php');
            die();
    
        }else{
    
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $token = $_SESSION['token'];

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE token = ?");
            $stmt->bind_param("ss", $hashPassword, $token);
            $stmt->execute();

            $rowsAffected = $stmt->affected_rows;

            if ($rowsAffected > 0) {

                $updateTokenStmt = $conn->prepare("UPDATE users SET token = 0 WHERE token = ?");
                $updateTokenStmt->bind_param("s", $token);
                $updateTokenStmt->execute();
                unset($_SESSION['token']);
                $_SESSION['reset'] = "Password has been changed successfully!";

            } else {
                $_SESSION['reset'] = "Password change failed!";    
            }
    
        }   

    } 

} else {
    $_SESSION['reset'] = "Session expired or token not provided!";
}

$password = isset($_SESSION['reset_data']['password']) ? $_SESSION['reset_data']['password'] : null;
$repassword = isset($_SESSION['reset_data']['repassword']) ? $_SESSION['reset_data']['repassword'] : null;
unset($_SESSION['reset_data']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset password</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/pwPreviewSignUp.js"></script>
        <link rel="stylesheet" href="styles/forgotPassword.css?v=<?php echo time(); ?>">
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
                        <div class="forgot-password-form">
                            <h2>Create new password</h2>
                            <?php if(isset($_SESSION['reset'])):?>
                                <div class="col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                    <p class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-circle"></i> 
                                    <strong><?=$_SESSION['reset']; unset($_SESSION['reset']);?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </p>
                                </div>
                            <?php endif ?>
                            <div class="password-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Password</h5>
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="floating-password" placeholder="Password" maxlength="128" oninput="passwordCheck()" onfocus="whenPasswordEmpty()" required>
                                        <label for="floating-password">Enter your new password</label>
                                    </div>
                                    <button class="btn button-password" type="button" id="btn-password" onclick="showHidePassword(); changeIcon()"><i class="bi-eye-fill" id="eye"></i></button>
                                </div>
                            </div>
                            <div class="repassword-section col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                <h5>Confirm password</h5>
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="repassword" class="form-control" id="floating-repassword" placeholder="Password" maxlength="128" oninput="repasswordCheck()" onfocus="whenPasswordEmpty()" required>
                                        <label for="floating-repassword">Re-enter your new password</label>
                                    </div>
                                    <button class="btn button-password" type="button" id="btn-repassword" onclick="showHideRePassword(); changeIcon2()"><i class="bi-eye-fill" id="eye2"></i></button>
                                </div>
                            </div>
                            <div class="button-section offset-3 mt-3">
                                <button type="sumbit" name="submit" class="btn btn-dark col-8">Reset password</button>
                            </div>
                            <div class="back-signin col-6 offset-3 mt-3 text-center">
                                <a href="forgotPassword.php" class="back-signin-text me-2">
                                <i class="bi bi-chevron-left"></i>
                                Back 
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>