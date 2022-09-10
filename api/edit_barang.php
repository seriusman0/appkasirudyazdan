<?php

include "../conf/config.php";


$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_barang = str_replace(['+', '-'], '', filter_var($_POST['harga_barang'], FILTER_SANITIZE_NUMBER_INT));


$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang where id_barang = '$id_barang'"));

$query = mysqli_query($conn, "select * from tb_barang order by created_at DESC");

if ($check < 1) {
    echo json_encode([
        "status" => "gagal",
        "message" => "Barang tidak ada",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
} else {
    $result = mysqli_query($conn, "UPDATE tb_barang SET 
            nama_barang = '$nama_barang',  
            harga_barang = '$harga_barang'
        WHERE id_barang = '$id_barang'
    ");
    var_dump(($_POST));

    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode([
            "status" => "Success",
            "message" => "Affected Rows " . mysqli_affected_rows($conn),
            "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
        ]);
    } else
        echo json_encode([
            "status" => "Gagal",
            "message" => "Affected Rows " . mysqli_affected_rows($conn),
            "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
        ]);
}
