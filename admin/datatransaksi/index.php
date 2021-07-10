<table>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Pembeli</th>
        <th>Penjual</th>
    </tr>
    <?php
    $no = 1;
    $r = mysqli_query($conn, "SELECT tb_barang.nama_barang, tb_barang.harga_barang, tb_history.jumlah, (tb_barang.harga_barang*tb_history.jumlah) as total, tb_payment.pembeli, tb_payment.penjual  
            FROM tb_barang, tb_history, tb_payment where tb_history.id_barang = tb_barang.id_barang and tb_history.id_payment = tb_payment.id_payment");
    while ($row = mysqli_fetch_array($r)) {
        echo "
            <tr>
                <td align='right'>$no</td>
                <td align='left'>$row[nama_barang]</td>
                <td align='right'>" . rupiah($row["harga_barang"]) . "</td>
                <td align='right'>$row[jumlah]</td>
                <td align='right'>" . rupiah($row["total"]) . "</td>
                <td align='left'>$row[pembeli]</td>
                <td align='left'>$row[penjual]</td>
            </tr>";
        $no++;
    }
    ?>
</table>