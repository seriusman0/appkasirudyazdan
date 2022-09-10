<?php

include "../conf/config.php";

$idCart = json_decode($_POST['idCart']);
$jumlah = json_decode($_POST['jumlah']);
for ($i = 0; $i < sizeOf($idCart); $i++) {
    if ($jumlah[$i] < 1) {
        mysqli_query($conn, "DELETE FROM tb_cart WHERE id_cart = '$idCart[$i]'");
    } else {
        mysqli_query($conn, "update tb_cart set jumlah='$jumlah[$i]' where id_cart='$idCart[$i]'");
    }
}

// $data       = mysqli_query($conn, "SELECT tb_cart.id_cart, tb_barang.id_barang, nama_barang, harga_barang,tb_cart.jumlah, tb_cart.jumlah*tb_barang.harga_barang as total from tb_barang, tb_cart where tb_cart.id_barang = tb_barang.id_barang ORDER BY tb_cart.update_at DESC");
$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

echo json_encode($data);
