<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_SESSION["user_id"])) {
    $user_id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
    if(isset($_POST["submit"])) {
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $duty = filter_var($_POST['duty'],FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "UPDATE duties SET duty='$duty' WHERE id=$id ";
        $result = mysqli_query($conn, $query);
    }
}

header('Location: duties.php');
die();
