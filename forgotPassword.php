<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "dutybase");

function generateSixDigitCode() {
    $code = "";
    $codeLength = 6;
    $digits = "0123456789";
    $digitsLength = strlen($digits);
    
    for ($i = 0; $i < $codeLength; $i++) {
        $index = crypto_rand_secure(0, $digitsLength - 1);
        $code .= $digits[$index];
    }
    
    return $code;
}

$sixDigitCode = generateSixDigitCode();

function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 0) return $min;
    
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    $bits = (int) $log + 1; 
    $filter = (int) (1 << $bits) - 1;
    
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; 
    } while ($rnd >= $range);
    
    return $min + $rnd;
}

function sendResetCodeByEmail($email, $sixDigitCode){

    $subject = "Reset password - your verification code.";
    $message = "Your verification code is: " . $sixDigitCode;
    $headers = "From: your@example.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "The message with the reset code was sent to: $email";
        mail($email, $subject, $message, $headers);
    } else {
        echo "There was a problem while sending the message.";
    }

}

function handlePasswordReset($email, $sixDigitCode) {
    sendResetCodeByEmail($email, $sixDigitCode);
    $conn = mysqli_connect("localhost", "root", "", "dutybase");
    $query_token = "UPDATE users SET token='$sixDigitCode' WHERE email = '$email'";
    $result = mysqli_query($conn, $query_token);

    if ($result) {
        return $sixDigitCode;
    } 
}

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $existEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($existEmail) > 0) {
        $_SESSION['token'] = $sixDigitCode; 
        handlePasswordReset($email, $sixDigitCode);
        echo "The reset code was sent to your email address.";
        header("Location: codeVerification.php");
        exit();
    } else {
        $_SESSION['forgot'] = "Email doesn't exist!";
    }
}

$email = isset($_SESSION['forgot_data']['email']) ? $_SESSION['forgot_data']['email'] : null;
unset($_SESSION['forgot_data']);

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
                            <h2>Forgot your password?</h2>
                            <?php if(isset($_SESSION['forgot'])):?>
                                <div class="col-8 offset-2 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mt-2">
                                    <p class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-circle"></i> 
                                    <strong><?=$_SESSION['forgot']; unset($_SESSION['forgot']);?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </p>
                                </div>
                            <?php endif ?>
                            <div class="email-section col-6 offset-3 mt-3">
                                <h5>Email</h5>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floating-input" placeholder="Email" required>
                                    <label for="floating-input">user@example.com</label>
                                </div>
                            </div>
                            <div class="button-section offset-3 mt-3">
                                <button type="sumbit" name="submit" class="btn btn-dark col-8">Reset password</button>
                            </div>
                            <div class="back-signin col-6 offset-3 mt-3 text-center">
                                <a href="signin.php" class="back-signin-text me-2">
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