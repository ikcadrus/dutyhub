<?php

require "config.php";
require "secret.php";

$conn = mysqli_connect("localhost", "root", "", "dutybase");
$secretKey = $key;
$status = 'error';

if(isset($_POST['submit_frm'])){

    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialchars = preg_match('/[\'!^$%&()@#?><,.=_+-]/', $password);
    $usernameDuplicate = mysqli_query($conn, "SELECT * FROM users where username = '$username'");
    $emailDuplicate = mysqli_query($conn, "SELECT * FROM users where email = '$email'");
    $emailConstruction = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if(mysqli_num_rows($emailDuplicate) > 0){
        echo "<script> alert('Email is already taken'); </script>";
    }else {
        if(!(preg_match($emailConstruction, $email))) {
            echo "<script> alert('Email must look like: name@example.domain')</script>";
        } else {
            if (mysqli_num_rows($usernameDuplicate) > 0) {
                echo "<script> alert('Username is already taken'); </script>";
            } else {
                if (strlen($username) < 6) {
                    echo "<script> alert('User should include a minimum of 6 letters'); </script>";
                } else {
                    if ($password == $repassword) {
                        if ($username != $password) {
                            if (!(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8 || strlen($password) > 128)) {
                                    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                                        $api_captcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                                        $resq_data = array(
                                            'secret' => $secretKey,
                                            'response' => $_POST['g-recaptcha-response'],
                                            'remoteip' => $_SERVER['REMOTE_ADDR']
                                        );
                                
                                        $curlConfig = array(
                                            CURLOPT_URL => $api_captcha_url,
                                            CURLOPT_POST => true,
                                            CURLOPT_RETURNTRANSFER => true,
                                            CURLOPT_POSTFIELDS => $resq_data
                                        );
                                
                                        $ch = curl_init();
                                        curl_setopt_array($ch, $curlConfig);
                                        $response = curl_exec($ch);
                                        curl_close($ch);
                                
                                        $responseData = json_decode($response);
                                
                                        if($responseData && isset($responseData->success) && $responseData->success === true) {
                                            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                                    $query = "INSERT INTO users (email,password,username) VALUES('$email', '$hashPassword', '$username')";
                                    mysqli_query($conn, $query);
                                    echo "<script>
                                        if(window.confirm('Registration successful')){
                                            window.location = 'signin.php';
                                        }else{
                                            window.location = 'index.php';
                                        }
                                        </script>";
                                        } else {
                                            echo "<script>alert('reCAPTCHA verification failed. Please try again.')</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Please complete the reCAPTCHA.')</script>";
                                    }
                            } else {
                                echo "<script>alert('Error in password validation');</script>";}
                        } else {
                            echo "<script>alert('User must not consist of the same as the password');</script>";}
                    } else {
                        echo "<script> alert('Password does not match'); </script>";}
                }
            }
        }
    }

}

