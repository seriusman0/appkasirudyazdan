<?php
include "../conf/config.php";

$bayar = (int) filter_var($_POST['bayar'], FILTER_SANITIZE_NUMBER_INT);
$pembeli = $_POST['pembeli'];


if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_cart")) > 0) {
    $tagihan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(tb_barang.harga_barang*tb_cart.jumlah)as total FROM tb_barang, tb_cart WHERE tb_barang.id_barang = tb_cart.id_barang"))['total'];
    if ($bayar >= $tagihan) {
        $sisa = $bayar - $tagihan;
        // echo "<div class='alert alert-danger role='alert'>
        //                 <div class='alert__body'>
        //                     <span> Uang Kembali " . rupiah($sisa) . "</span>
        //                 </div>
        //                 <div class='alert__close'>
        //                     ×
        //                 </div>
        //             </div>";
        echo "sampai sini berjalan dengan baik ";
        $pay = mysqli_query($conn, "INSERT INTO tb_payment 
            VALUES(null, '', '$pembeli', '$bayar', CURRENT_TIMESTAMP)");
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
            echo "  <div class='alert alert-danger role='alert'>
                        <div class='alert__body'>
                            <span> Transaksi Gagal </span>
                        </div>
                        <div class='alert__close'>
                            ×
                        </div>
                    </div>";
        };
    } else {
        echo "Uangnya kurang $bayar";
        // $minus = $tagihan - $bayar;
        // echo "  Uangnya Kurang,  " . rupiah($minus) . " Lagi";
    }
} else echo "Keranjang Belanja Kosong";
