<?php
require "config.php";

$conn = mysqli_connect("localhost", "root", "", "dutybase");

$current_page = $_POST['current_page'];

$id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM preferences WHERE id_user = $id";
$result = mysqli_query($conn, $query);
$choice = mysqli_fetch_assoc($result);

$query1 = "UPDATE preferences SET color_mode = 0 WHERE id_user = $id";
$query2 = "UPDATE preferences SET color_mode = 1 WHERE id_user = $id";

if($choice['color_mode'] == 0){
    mysqli_query($conn, $query2);
    header('location: ' .$current_page);
}else{
    mysqli_query($conn, $query1);
    header('location: ' .$current_page);
}
