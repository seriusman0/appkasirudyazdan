<?php if (isset($_POST['submit'])) {
    $barcode = htmlspecialchars($_POST["barcode"]);
    $r = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '$barcode'"));
    if ($r > 0) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_barang = '$_POST[barcode]'")) > 0) {
            $update = mysqli_query($conn, "UPDATE tb_cart SET jumlah = jumlah+1, update_at = current_time WHERE id_barang = '$_POST[barcode]'");
        } else {
            $insert = mysqli_query($conn, "INSERT INTO tb_cart VALUES (null, '$_POST[barcode]', '1', current_timestamp)");
        }
    } else {
        echo "  <div class='alert alert-danger'>
                        <div class='alert__body'>
                            <span>Barcode Tidak Ditemukan</span>
                        </div>
                        <div class='alert__close'>
                            ×
                        </div>
                    </div>";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Scan Barcode</h1>
    <form action="" method="post"><input type="text" name="barcode" autofocus placeholder="Scan Di sini">
        <input type="submit" name="submit" value="Tambah" autocomplete="off">
    </form>
</body>

</html>