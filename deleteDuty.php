<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_GET["id"])){

    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM duties WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $deleteDuty = "DELETE FROM duties WHERE id=$id LIMIT 1";
        $deleteResult = mysqli_query($conn, $deleteDuty);
    }

}
header('Location: duties.php');
die();
