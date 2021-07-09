<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Pembeli</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Waktu</th>
            <th>Kasir</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $row = mysqli_query($conn, "select tb_payment.id_payment, tb_payment.pembeli, tb_payment.total_bayar, tb_payment.total_bayar as kembalian, tb_payment.update_at, penjual from tb_payment, tb_history where tb_payment.id_payment = tb_history.id_payment group by tb_payment.id_payment order by tb_payment.update_at desc");

        while ($r = mysqli_fetch_array($row)) {
            echo "
            <tr>
                <td>$no</td>
                <td>$r[pembeli]</td>
                <td>" . rupiah($r["total_bayar"]) . "</td>
                <td>" . rupiah($r["kembalian"]) . "</td>
                <td>$r[update_at]</td>
                <td>$r[penjual]</td>
                <td><a href='cetak_struk.php?id=$r[id_payment]'>Cetak Struk</a></td>
            </tr>";
            $no++;
        }
        ?>

    </table>
</body>

</html>