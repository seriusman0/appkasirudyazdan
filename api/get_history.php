<?php

include "../conf/config.php";

$tb_payment       = mysqli_query($conn, "SELECT * from tb_payment");
$tb_history       = mysqli_query($conn, "SELECT * from tb_history order by tb_history.update_at DESC");
$tb_barang       = mysqli_query($conn, "SELECT * from tb_barang");

$data = mysqli_fetch_all($tb_payment, MYSQLI_ASSOC);

function totalTagihan($id_payment)
{
    global $conn;
    $result = mysqli_fetch_array(mysqli_query($conn, "select sum(tb_barang.harga_barang) from tb_barang, tb_history where tb_history.id_barang = tb_barang.id_barang and tb_history.id_payment='$id_payment' "));
    return $result[0];
}
$result = array();

echo json_encode($data);
