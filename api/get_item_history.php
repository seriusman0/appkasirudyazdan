<?php

include "../conf/config.php";

$id_payment = $_GET['id_payment'];

$query = mysqli_query($conn, "
    select tb_history.id_barang, 
    tb_history.jumlah, 
    tb_barang.harga_barang,
    tb_barang.nama_barang,
    (tb_history.jumlah * tb_barang.harga_barang) as total
    from tb_history, tb_barang 
    where tb_history.id_barang = tb_barang.id_barang 
    and tb_history.id_payment = '$id_payment';
");

if (mysqli_num_rows($query) < 1) {
    echo json_encode([
        "status" => "success",
        "message" => "ID Payment tidak valid",
        "body" => ""
    ]);
} else {
    echo json_encode([
        "status" => "success",
        "message" => "ID Payment valid",
        "body" => mysqli_fetch_all($query, MYSQLI_ASSOC)
    ]);
}
