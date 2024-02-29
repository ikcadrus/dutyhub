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

        if(mysqli_num_rows($emailDuplicate) > 0){
            $_SESSION['signUp'] = "Email is already taken!";
        }elseif(mysqli_num_rows($usernameDuplicate) > 0){
            $_SESSION['signUp'] = "Username is already taken!";
        }elseif(!(preg_match($emailConstruction, $email))){
            $_SESSION['signUp'] = "Email must look like: name@example.domain!";
        }elseif(empty($email)){
            $_SESSION['signUp'] = "Please enter your email!";
        }elseif(strlen($username) < 6){
            $_SESSION['signUp'] = "User should include a minimum of 6 letters!";
        }elseif($password !== $repassword){
            $_SESSION['signUp'] = "Password doesn't match!";       
        }elseif($username == $password){
            $_SESSION['signUp'] = "The username must not be the same as the password!";   
        }elseif(!$uppercase || !$lowercase){
            $_SESSION['signUp'] = "The password must contain uppercase and lowercase letters!"; 
        }elseif(!$number){
            $_SESSION['signUp'] = "The password must contain numbers!"; 
        }elseif(!$specialchars){
            $_SESSION['signUp'] = "The password must contain special chars!"; 
        }elseif(!($responseData && isset($responseData->success) && $responseData->success === true)){
            $_SESSION['signUp'] = "Recaptcha verification failed!";
        }
    }

    if(isset($_SESSION['signUp'])){

        $_SESSION['signUp_data'] = $_POST;
        header('location:'. $root . 'signUp.php');
        die();

    }else{

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (email,password,username) VALUES('$email', '$hashPassword', '$username')";
        mysqli_query($conn, $query);
        header("Location: signin.php");
        die();

    }
}else{
    header('location: '. $root . 'signUp.php');
}
