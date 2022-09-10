<?php

include "../conf/config.php";

$data       = mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang");
$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

echo json_encode($data);
