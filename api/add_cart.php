<?php

include "../conf/config.php";

$idProduct = json_decode($_POST['id']);

$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang where id_barang = '$idProduct'"));

if ($check > 0) {
    $r = mysqli_query($conn, "INSERT INTO tb_cart SET id_barang = '$idProduct' ");

    if ($r) echo "Berhasil";
    else echo "gagal";
} else echo "Barang tidak ditemukan";
