<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <h1>Daftar Barang</h1>
    <table border="1">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Barang</td>
                <td align="center">Nama Barang</td>
                <td align="center">Modal </td>
                <td align="center">Harga </td>
                <td align="center">Stok </td>
                <td align="center">Action</td>
            </tr>
        </thead>
        <tbody>
            <a href="index.php?page=add">Tambah</a>
            <?php
            $barang = query("tb_barang");
            $no = 1;
            while ($r = mysqli_fetch_array($barang)) {
                echo "<tr>
                <td align='center'>{$no}</td>
                            <td>$r[id_barang]</td>
                            <td>$r[nama_barang]</td>
                            <td align='right'>" . rp($r["modal_barang"]) . "</td>
                            <td align='right'>" . rp($r["harga_barang"]) . "</td>
                            <td align='center'>$r[stok_barang]</td>
                            <td><a href='index.php?page=update&id={$r['id_barang']}'>Edit</a>
                            <a href='index.php?page=delete&id={$r['id_barang']}' onclick=\"return confirm('Yakin Bahwa Data ini Dihapus?')\"  >Delete</a></td>
                    </tr>";
                $no++;
            }
            ?>

        </tbody>
    </table>
</body>

</html>