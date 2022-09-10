<?php

include "../conf/config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "select * from tb_user where username = '$username' and password = '$password'");
if ((mysqli_num_rows($query)) > 0) {
    echo json_encode([
        "status" => "success",
        "message" => "Username and Password valid",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Username or Password invalid",
        "body" => ""
    ]);
}
