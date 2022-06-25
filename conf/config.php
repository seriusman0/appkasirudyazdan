<?php
$server = "localhost";
$username = "root";
$password = 'tmDevFlats0987^(';
$database = "udyazdan";

// $conn = mysqli_connect($server, $username, $password, $database) or die("Gagal");
$conn = new mysqli($server, $username, $password, $database, 8000) or die("Gagal");
