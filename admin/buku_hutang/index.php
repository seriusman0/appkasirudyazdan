<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Hutang</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Total Hutang</th>
                <th>Total Terbayar</th>
                <th>Sisa Hutang</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $total_bayar = 0;
            function total_bayar($id)
            {
                global $conn;
                $total_bayar = mysqli_fetch_row(mysqli_query($conn, "select sum(pembayaran_hutang.jumlah) 
                                                from pembayaran_hutang, hutang 
                                                where pembayaran_hutang.id_hutang = hutang.id_hutang 
                                                and pembayaran_hutang.id_hutang = '$id'"));
                return $total_bayar[0];
            }
            $r = mysqli_query($conn, "SELECT *,`pelanggan`.`nama_pelanggan` as nama, (select  
                sum(
                    (item_hutang.jumlah_barang)*`tb_barang`.`harga_barang`) as total
                                                        from `item_hutang`, `tb_barang` 
                                                        where `item_hutang`.`id_barang` = `tb_barang`.`id_barang`
                                                        and item_hutang.id_hutang = hutang.id_hutang) as total_hutang
            from hutang, pelanggan where pelanggan.id_pelanggan = hutang.id_pelanggan");
            while ($row = mysqli_fetch_array($r)) {
                $sisa = $row["total_hutang"] - total_bayar($row['id_hutang']);
                $status = ($sisa == 0) ? "Lunas" : "Belum Lunas";
                echo "
            <tr>
                <td align='right'>$no</td>
                <td align='left'>$row[nama]</td>
                <td align='right'>" . rupiah($row["total_hutang"]) . "</td>
                <td align='right'>" . rupiah(total_bayar($row['id_hutang'])) . "</td>
                <td align='right'>" . rupiah($sisa) . "</td>
                <td align='right'>$status</td>
                <td align='right'>$row[tgl]</td>
                <td>
                    <a class='btn btn-success' href=index.php?page=lunas_pembayaran_hutang&id=$row[id_hutang]&sisa=$sisa>Lunasi</a>
                    <a class='btn' href=index.php?page=pembayaran_hutang&id=$row[id_hutang]>Bayar</a>
                </td>
            </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</body>

</html>