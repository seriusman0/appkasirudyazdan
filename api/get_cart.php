<?php

include "../conf/config.php";

$data       = mysqli_query($conn, "SELECT tb_cart.id_cart, tb_barang.id_barang, nama_barang, harga_barang,tb_cart.jumlah, tb_cart.jumlah*tb_barang.harga_barang as total from tb_barang, tb_cart where tb_cart.id_barang = tb_barang.id_barang ORDER BY tb_cart.update_at DESC");
$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

echo json_encode($data);
