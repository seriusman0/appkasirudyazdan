<?php
if (isset($_POST['pay'])) {

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_cart")) > 0) {
        $tagihan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang"))['total'];

        if ($_POST["bayar"] >= $tagihan) {
            $sisa = intval($_POST['bayar']) - $tagihan;
            echo "  <div class='alert alert-danger role='alert'>
                        <div class='alert__body'>
                            <span> Uang Kembali " . rupiah($sisa) . "</span>
                        </div>
                        <div class='alert__close'>
                            ×
                        </div>
                    </div>";
            $pay = mysqli_query($conn, "INSERT INTO tb_payment 
            VALUES(null, '$_POST[penjual]', '$_POST[pembeli]', '$_POST[bayar]', CURRENT_TIMESTAMP)");
            if ($pay) {
                $last_id = mysqli_insert_id($conn);
                $state = mysqli_query($conn, "SELECT * FROM tb_cart");
                while ($get = mysqli_fetch_array($state)) {
                    $exec = mysqli_query($conn, "INSERT INTO tb_history VALUES(null, '$get[id_barang]', '$get[jumlah]', '$last_id', CURRENT_TIMESTAMP)");
                    $updateBarang = mysqli_query($conn, "UPDATE tb_barang SET stok_barang = stok_barang-'$get[jumlah]' WHERE id_barang = '$get[id_barang]'");
                    if ($exec) {
                        mysqli_query($conn, "TRUNCATE tb_cart");
                    }
                }
            } else {
            };
        } else {
            $minus = $tagihan - $_POST['bayar'];
            echo "  <div class='alert alert-danger role='alert'>
                        <div class='alert__body'>
                            <span>Uangnya Kurang,  " . rupiah($minus) . " Lagi</span>
                        </div>
                        <div class='alert__close'>
                            ×
                        </div>
                    </div>";
        }
    } else echo "  <div class='alert alert-danger'>
                    <div class='alert__body'>
                        <span>Keranjang Belanja Kosong</span>
                    </div>
                    <div class='alert__close'>
                        ×
                    </div>
                </div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <label for="penjual">Nama Penjual : </label>
            <input type="text" name="penjual" required>
        </div>
        <div>
            <label for="pembeli">Nama Pembeli : </label>
            <input type="text" name="pembeli" required>
        </div>
        <div>
            <label for="bayar">Bayar : </label>
            <input type="number" name="bayar" required>
        </div>

        <input type="submit" name="pay" value="Bayar">
    </form>
</body>

</html>