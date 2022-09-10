<?php

include "../conf/config.php";

$id_barang = json_decode($_POST['id_barang']);
$nama_barang = json_decode($_POST['nama_barang']);
$harga_barang = json_decode($_POST['harga_barang']);

$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang where id_barang = '$id_barang'"));

$query = mysqli_query($conn, "select * from tb_barang  where id_barang = '$id_barang'");

if ($check > 0) {
    echo json_encode([
        "status" => "success",
        "message" => "Barang sudah ada",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
} else
    echo json_encode([
        "status" => "success",
        "message" => "Barang belum ada di DB",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
