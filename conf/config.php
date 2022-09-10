<?php
$server = "localhost";
$username = "root";
$password = 'tmDevFlats0987^(';
$database = "kantinkejujuran";

// $server = "154-26-131-254.cprapid.com";
// $username = "icondiskominfo_root";
// $password = "tmDevFlats0987^(";
// $database = "icondiskominfo_kantin";

// $conn = mysqli_connect($server, $username, $password, $database) or die("Gagal");
$conn = new mysqli($server, $username, $password, $database, 8000) or die("Gagal");
