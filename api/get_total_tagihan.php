
<?php

include "../conf/config.php";

// $id_payment = $_POST['id_payment'];
$id_payment = $_GET['id_payment'];

function totalTagihan($id_payment)
{
    global $conn;
    $result = mysqli_fetch_array(mysqli_query($conn, "select sum(tb_barang.harga_barang) from tb_barang, tb_history where tb_history.id_barang = tb_barang.id_barang and tb_history.id_payment='$id_payment'"));
    return $result[0];
}



echo json_encode(["total_tagihan" => totalTagihan($id_payment)]);
