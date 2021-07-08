<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <h1>Ini adalah tampilan view</h1>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>ID Barang</td>
                <td>Nama Barang</td>
                <td>Modal </td>
                <td>Harga </td>
                <td>Stok </td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <a href="index.php?page=add">Tambah</a>
            <?php
            $barang = query("tb_barang");
            $no = 1;
            while ($r = mysqli_fetch_array($barang)) {
                echo "<tr>
                <td>{$no}</td>
                            <td>{$r['id_barang']}</td>
                            <td>{$r['nama_barang']}</td>
                            <td>{$r['modal_barang']}</td>
                            <td>{$r['harga_barang']}</td>
                            <td>{$r['stok_barang']}</td>
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