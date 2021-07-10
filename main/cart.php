<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <table>
        <tr>
            <td>No</td>
            <td>Barcode</td>
            <td>Nama Barang</td>
            <td>Harga Satuan</td>
            <td>Jumlah Item</td>
            <td>Total</td>
            <td>Action</td>
        </tr>
        <?php
        $no = 1;
        $row = mysqli_query($conn, "SELECT tb_cart.id_cart, tb_barang.id_barang, nama_barang, harga_barang,tb_cart.jumlah, tb_cart.jumlah*tb_barang.harga_barang as total from tb_barang, tb_cart where tb_cart.id_barang = tb_barang.id_barang ORDER BY tb_cart.update_at DESC");
        while ($r = mysqli_fetch_array($row)) {
            echo "
                <tr>
                <td>$no</td>
                <td>$r[id_barang]</td>
                <td>$r[nama_barang]</td>
                <td align='right'>" . rupiah($r["harga_barang"]) . "</td>
                <td align='right'>$r[jumlah]</td>
                <td align='right'>" . rupiah($r["total"]) . "</td>
                <td>
                    <div class='modal-instance'>
                        <a class='btn modal-trigger' href='#'>
                            <span class='btn__text'>
                                EDIT
                            </span>
                        </a>
                        <div class='modal-container'>
                            <div class='modal-content'>
                                <form action='updateCart.php?id=$r[id_cart]' method='post'>
                                    <input type='number' name='newCount' placeholder='jumlah' value='$r[jumlah]' required>
                                    <input type='submit' name='update' value='UPDATE'>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class='btn' href='delete_cart.php?id=$r[id_cart]'>Delete</a>
                </td>
                </tr>";
            $no++;
        }
        ?>

        <tr>
            <th colspan="5" align="right">Total</th>
            <th colspan="2"><?= rupiah(mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang"))['total']) ?></th>
        </tr>

    </table>
</body>

</html>