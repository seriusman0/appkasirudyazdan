<?php
if (isset($_POST['tambah'])) {
    $_POST['jumlah'] = (int) filter_var($_POST['jumlah'], FILTER_SANITIZE_NUMBER_INT);
    $result = mysqli_query($conn, "INSERT INTO pembayaran_hutang VALUES(null, '$_GET[id]', '$_POST[jumlah]', '$_POST[oleh]', current_date)");
    if ($result) {
        header("location:index.php?page=pembayaran_hutang&id=$_GET[id]");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran Hutang</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Pembayaran Hutang</h1>
        <form action="" method="POST">
            <div>
                <label for="nama_barang">Jumlah Pembayaran : </label>
                <div class="">
                    <input required autofocus type="text" id='rupiah' class="form-control-plaintext border border-warning progress-bar text-dark" name="jumlah" placeholder="Masukkan Nilai Pembayaran . Rp. ">
                </div>
            </div>
            <div>
                <label for="harga">Dibayar Oleh : </label>
                <div class="">
                    <input type="text" class=" form-control-plaintext border border-warning progress-bar text-dark" name="oleh" placeholder="boleh dikosongkan">
                </div>
            </div>

            <br>
            <input type="submit" class=" btn btn-warning btn-lg " name="tambah" value="Tambah">
        </form>
    </div>
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