<?php

require "config.php";

$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_SESSION['token'])) {
    if(isset($_POST['submit'])){
        $code = $_POST['code'];
        $token = $_SESSION['token'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?");
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0 && $code === $token) {
            header("Location: resetPassword.php");
            exit();
        }else{
            $_SESSION['code'] = "Invalid code!"; 
        }
    }
}

$password = isset($_SESSION['code_verify']['password']) ? $_SESSION['code_verify']['password'] : null;
unset($_SESSION['code_verify']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot password</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                            <h2>Code Verification</h2>
                            <?php if(isset($_SESSION['code'])):?>
                                <div class="col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                    <p class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-circle"></i> 
                                    <strong><?=$_SESSION['code']; unset($_SESSION['code']);?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </p>
                                </div>
                            <?php endif ?>
                            <div class="email-section col-6 offset-3 mt-3">
                                <h5>Code</h5>
                                <div class="form-floating">
                                    <input type="text" name="code" class="form-control" id="floating-input" maxlength="6" placeholder="Email" required>
                                    <label for="floating-input">Enter code</label>
                                </div>
                            </div>
                            <div class="button-section offset-3 mt-3">
                                <button type="submit" name="submit" class="btn btn-dark col-8">Reset password</button>
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