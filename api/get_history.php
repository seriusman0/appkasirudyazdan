<?php

include "../conf/config.php";

$data       = mysqli_query($conn, "SELECT * from tb_payment");

$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

echo json_encode($data);
