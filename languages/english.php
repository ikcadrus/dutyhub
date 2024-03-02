<?php
require "../config.php";

$conn = mysqli_connect("localhost", "root", "", "dutybase");

$current_page = $_POST['current_page'];

$id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM preferences WHERE id_user = $id";
$result = mysqli_query($conn, $query);
$choice = mysqli_fetch_assoc($result);

$query_english = "UPDATE preferences SET languages = 0 WHERE id_user = $id";


if($choice['languages'] == 1){
    mysqli_query($conn, $query_english);
    header('location: ' .$current_page);
}else{
    header('location: ' .$current_page);
}