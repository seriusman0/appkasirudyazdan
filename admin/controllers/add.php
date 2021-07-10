<?php
if (isset($_POST['tambah'])) {
    // var_dump($_POST);
    insert("tb_barang", $_POST);
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
                <input required type="text" class="form-control-plaintext border border-warning progress-bar text-dark" name="nama_barang">
            </div>
        </div>
        <div>
            <label for="harga">Harga Modal : </label>
            <div class="col-sm-10">
                <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="modal_barang">
            </div>
        </div>
        <div>
            <div>
                <label for="harga">Harga Jual : </label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="harga_barang">
                </div>
            </div>
            <div>
                <label for="stok">Stok : </label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="stok_barang">
                </div>
            </div>
            <br>
            <input type="submit" class="fas fa-shopping-cart btn btn-warning btn-lg btn-block" name="tambah" value="Tambah">
    </form>
</body>

</html>