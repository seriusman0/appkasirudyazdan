<?php
$total = rupiah(mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang"))['total']);
$date = date("Y-m-d");
if (isset($_POST['hutang'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_cart")) > 0) {
        $tagihan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang"))['total'];
        $pay = mysqli_query($conn, "INSERT INTO hutang 
            VALUES(null, '$_POST[pelanggan]', $date");
        echo "<script>alert('pelanggan = $date')</script>";
        if ($pay) {
            $last_id = mysqli_insert_id($conn);
            $state = mysqli_query($conn, "SELECT * FROM hutang");
            while ($get = mysqli_fetch_array($state)) {
                $exec = mysqli_query($conn, "INSERT INTO tb_history VALUES(null, '$get[id_barang]', '$get[jumlah]', '$last_id', CURRENT_TIMESTAMP)");
                $updateBarang = mysqli_query($conn, "UPDATE tb_barang SET stok_barang = stok_barang-'$get[jumlah]' WHERE id_barang = '$get[id_barang]'");
                if ($exec) {
                    mysqli_query($conn, "TRUNCATE tb_cart");
                }
            }
        } else {
            echo "  <div class='alert alert-danger role='alert'>
                        <div class='alert__body'>
                            <span> Transaksi Gagal </span>
                        </div>
                        <div class='alert__close'>
                            ×
                        </div>
                    </div>";
        };
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
    <div class="container">
        <?php
        $no = 1;
        $row = mysqli_query($conn, "SELECT tb_cart.id_cart, tb_barang.id_barang, nama_barang, harga_barang,tb_cart.jumlah, tb_cart.jumlah*tb_barang.harga_barang as total from tb_barang, tb_cart where tb_cart.id_barang = tb_barang.id_barang ORDER BY tb_cart.update_at DESC");
        while ($r = mysqli_fetch_array($row)) {
        ?>
            <div class="alert">
                <div class="alert__body">
                    <span><?= $no . "." ?></span>
                    <span><?= $r['nama_barang'] ?></span>
                    &nbsp;
                    <span><?= rupiah($r['harga_barang']) ?></span>
                </div>
            </div>
        <?php $no++;
        } ?>
    </div>
    <br>
    <br>
    <form action="" method="POST" class="fixed-bottom container">
        <div>
            <label for="penjual">Nama Penjual : </label>
            <select name="penjual" id="penjual">
                <option value="Yuniman Waruwu">Yuniman Waruwu</option>
                <option value="Eka Krisman Gulo">Eka Krisman Gulo</option>
                <option value="Vivin Gulo">Vivin Gulo</option>
                <option value="Tiara Gulo">Tiara Gulo</option>
            </select>
        </div>
        <br>
        <div>
            <label for="pelanggan">Nama Pelanggan : </label>
            <select name="pelanggan" id="pelanggan">
                <?php
                $row = mysqli_query($conn, "SELECT * FROM pelanggan");
                while ($r = mysqli_fetch_array($row)) {
                    echo "  
                <option value=" . $r['id_pelanggan'] . ">" . $r['nama_pelanggan'] . "</option>";;
                }  ?>
            </select>
        </div>
        <input type="submit" name="hutang" class="bg-danger" value="Tambahkan <?= $total ?> Ke Buku Hutang">
    </form>
</body>

</html>