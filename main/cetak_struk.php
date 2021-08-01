<?php
error_reporting();
include "../conf/config.php";
include "../admin/functions.php";


$id = $_GET['id'];
$r = mysqli_query($conn, "SELECT tb_payment.update_at, tb_barang.nama_barang, tb_barang.harga_barang, tb_history.jumlah, tb_payment.total_bayar 
FROM tb_history, tb_barang, tb_payment WHERE tb_payment.id_payment = '1' and tb_history.id_barang = tb_barang.id_barang and tb_payment.id_payment= tb_history.id_payment;");
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT tb_payment.pembeli, tb_payment.penjual, tb_payment.update_at, tb_payment.total_bayar FROM tb_payment WHERE id_payment = '$id'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Struk</title>
</head>

<body>
    <div class="">
        <div class="">
            <table class="rincian" padding="">
                <tr>
                    <td colspan="5">
                        <img src="../img/CoP.png">
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="center">
                        STRUK TRANSAKSI UD YAZDAN
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="center">
                        DESA LAHEMO KECAMATAN GIDO
                    </td>
                </tr>
                <tr height="10"></tr>
                <tr>
                    <td align="left" colspan="3">No : <?= $id ?></td>
                    <td align="left" colspan="2">Tgl : <?= tgl_indo($data["update_at"]) ?></td>
                </tr>
                <tr>
                    <td>Pembeli : </td>
                    <td colspan="2"><?= $data['pembeli'] ?></td>
                    <td>Kasir : </td>
                    <td colspan="2"><?= $data['penjual'] ?></td>
                </tr>
                <tr height="10"></tr>
                <?php
                $no = 1;
                $r = mysqli_query($conn, "SELECT * FROM tb_history, tb_barang WHERE id_payment = '$id' and tb_history.id_barang = tb_barang.id_barang");
                while ($row = mysqli_fetch_array($r)) {
                    echo "
                <tr>
                    <td align='center'>$no</td>
                    <td>$row[nama_barang]</td>
                    <td align='right'>" . rupiah($row["harga_barang"]) . " x </td>
                    <td align='right'>$row[jumlah]</td>
                    <td align='right'>" . rupiah($row["harga_barang"] * $row["jumlah"]) . "</td>
                </tr>";
                    $no++;
                }
                ?>
                <?php
                $total = mysqli_fetch_assoc(mysqli_query(
                    $conn,
                    "select sum(tb_barang.harga_barang*tb_history.jumlah) as total 
                        from tb_history,tb_payment, tb_barang where tb_history.id_payment = tb_payment.id_payment 
                        and tb_barang.id_barang = tb_history.id_barang and tb_history.id_payment = '$id'"
                ));

                ?>
                <tr height="10"></tr>
                <tr>
                    <th colspan="4" align="right">Total :</th>
                    <th align="right"><?= rupiah($total['total']) ?></th>
                </tr>
                <tr>
                    <th colspan="4" align="right">Bayar :</th>
                    <th align="right"><?= rupiah($data['total_bayar']) ?></th>
                </tr>
                <tr>
                    <th colspan="4" align="right">Kembali :</th>
                    <th align="right"><?= rupiah($data['total_bayar'] - $total['total']) ?></th>
                </tr>
                <tr height="20"></tr>
                <tr>
                    <td colspan="5" align="center">TERIMAKASIH TELAH BERBELANJA</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">Barang yang sudah di beli tidak boleh</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">ditukar atau dikembalikan</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">--UD YAZDAN--</td>
                </tr>
                <tr>
                    <td colspan="5" align="center">+62 822-4636-3510</td>
                </tr>
            </table>

        </div>
    </div>
</body>

</html>