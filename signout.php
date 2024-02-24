<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");
session_destroy();
header("Location: signin.php");
die();
