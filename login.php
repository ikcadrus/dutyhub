<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/login.css?v=<?php echo time(); ?>">
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="left col-6">
                    <div class="logo">
                        <img src="img/logo/logo-light.svg" width="100%">
                    </div>
                </div>
                <div class="right col-6">
                    <div class="sign-in-form">
                        <h2>Welcome to DutyHub</h2>
                        <div class="email-section col-6 offset-3 mt-2">
                            <h5>Email</h5>
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floating-input" placeholder="Email" required>
                                <label for="floating-input">user@example.com</label>
                            </div>
                        </div>
                        <div class="password-section col-6 offset-3 mt-2">
                            <h5>Password</h5>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floating-password" placeholder="Password" required>
                                <label for="floating-password">Insert your password</label>
                            </div>
                        </div>
                        <div class="check-section col-6 offset-3 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                            </div>
                        </div>
                        <div class="button-section offset-3 mt-2">
                            <button type="button" class="btn btn-dark col-8">Sign In</button>
                        </div>
                        <div class="register-question col-6 offset-3 mt-2">
                            Don't have an account? 
                            <a href="#" class="sign-up-text">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>