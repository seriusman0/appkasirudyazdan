<?php
if (isset($_POST['tambah'])) {
    $namaBarang = $_POST['nama_barang'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tb_barang` WHERE `id_barang` = '$_POST[id_barang]'")) > 0) {
        mysqli_query($conn, "UPDATE `tb_barang` SET `stok_barang`= (`stok_barang` + '$_POST[stok_barang]'), created_at = CURRENT_TIMESTAMP
    where `id_barang` = '$_POST[id_barang]'");
    } else insert("tb_barang", $_POST);
    $_POST['harga_barang'] = (int) filter_var($_POST['harga_barang'], FILTER_SANITIZE_NUMBER_INT);

    mysqli_query($conn, "INSERT INTO `tb_barang` (`id_barang`, `nama_barang`,`modal_barang`, `harga_barang`, `stok_barang`, `created_at`) values(
        '$_POST[id_barang]', '$_POST[nama_barang]','$_POST[modal_barang]','$_POST[harga_barang]','$_POST[stok_barang]', CURRENT_TIMESTAMP
    )");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>

<body>
    <h1>Tambah Barang</h1>
    <form action="" method="POST">
        <div class="form-group-row">
            <label for="id_barang">ID BARANG : </label>
            <div class="col-sm-10">
                <input required type="text" class="form-control-plaintext border border-warning progress-bar text-dark" name="id_barang" autocomplete="off" autofocus>
            </div>
        </div>
        <div>
            <label for="nama_barang">Nama Barang : </label>
            <div class="col-sm-10">
                <input required type="text" class="form-control-plaintext border border-warning progress-bar text-dark" name="nama_barang" value='<?= $namaBarang ?>'>
            </div>
        </div>
        <div>
            <label for="harga">Harga Modal : </label>
            <div class="col-sm-10">
                <input required type="number" class=" form-control-plaintext border border-warning progress-bar text-dark" name="modal_barang" <?= (isset($_POST["modal_barang"]) ? ("value=" . $_POST['modal_barang'] . "") : "") ?>>
            </div>
        </div>
        <div>
            <div>
                <label for="harga">Harga Jual : </label>
                <div class="col-sm-10">
                    <input required type="text" id="rupiah" class=" form-control-plaintext border border-warning progress-bar text-dark" name="harga_barang" <?= (isset($_POST["harga_barang"]) ? ("value=" . $_POST['harga_barang'] . "") : "") ?>>
                </div>
            </div>
            <div>
                <label for="stok">Stok : </label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="stok_barang" <?= (isset($_POST["stok_barang"]) ? ("value=" . $_POST['stok_barang'] . "") : "1") ?>>
                </div>
            </div>
            <br>
            <input type="submit" class="fas fa-shopping-cart btn btn-warning btn-lg btn-block" name="tambah" value="Tambah">
    </form>
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
</body>


</html>