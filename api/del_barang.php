<?php

include "../conf/config.php";


$id_barang = $_POST['id_barang'];

$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang where id_barang = '$id_barang'"));

$query = mysqli_query($conn, "select * from tb_barang order by created_at DESC");

if ($check < 0) {
    echo json_encode([
        "status" => "success",
        "message" => "Barang tidak ada",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
} else {
    $result = mysqli_query($conn, "DELETE FROM tb_barang WHERE 
        id_barang = '$id_barang'
    ");

    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode([
            "status" => "success",
            "message" => "Affected Rows " . mysqli_affected_rows($conn),
            "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
        ]);
    } else
        echo json_encode([
            "status" => "gagal",
            "message" => "Affected Rows " . mysqli_affected_rows($conn),
            "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
        ]);
}
