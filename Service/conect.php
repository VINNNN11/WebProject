<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($hostname, $username, $password, $database);

if ($conn->connect_error) {
    echo"error";
    // die("koneksi gagal :" . mysqli_connect_error());
}