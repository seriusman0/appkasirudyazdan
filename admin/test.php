<?php
include "../conf/config.php";
for ($i = 0; $i < 10; $i++) {
    mysqli_query($conn, "INSERT INTO `tb_barang` 
    (`id_barang`, `nama_barang`, `modal_barang`, `harga_barang`, `stok_barang`) 
    VALUES ('$i', 'Barang $i','$i', '$i', '$i')");
}
