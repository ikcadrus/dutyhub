<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot password</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/forgotPassword.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/passwordPreview.js"></script>
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
                            <div class="email-section col-6 offset-3 mt-3">
                                <h5>Email</h5>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floating-input" placeholder="Email" required>
                                    <label for="floating-input">user@example.com</label>
                                </div>
                            </div>
                            <div class="button-section offset-3 mt-3">
                                <button type="button" class="btn btn-dark col-8">Reset password</button>
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