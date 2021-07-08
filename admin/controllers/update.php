<?php
if (isset($_POST['update'])) {
    // var_dump($_POST);
    update("tb_barang", $_GET['id'], $_POST);
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
    <h1>Update barang</h1>
    <form action="" method="POST">
        <!-- <div class="form-group-row">
            <label for="id_barang">ID BARANG : </label>
            <div class="col-sm-10">
                <input required type="text" class="form-control-plaintext border border-warning progress-bar text-dark" name="id_barang" autofocus>
            </div>
        </div> -->
        <div>
            <label for="nama_barang">Nama Barang : </label>
            <div class="col-sm-10">
                <input required type="text" class="form-control-plaintext border border-warning progress-bar text-dark" name="nama_barang" value="<?= queryone("tb_barang", $_GET['id'], "nama_barang") ?>">
            </div>
        </div>
        <div>
            <label for="harga">Harga Modal : </label>
            <div class="col-sm-10">
                <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="modal_barang" value="<?= queryone("tb_barang", $_GET['id'], "modal_barang") ?>">
            </div>
        </div>
        <div>
            <div>
                <label for="harga">Harga Jual : </label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="harga_barang" value="<?= queryone("tb_barang", $_GET['id'], "harga_barang") ?>">
                </div>
            </div>
            <div>
                <label for="stok">Stok : </label>
                <div class="col-sm-10">
                    <input required type="number" class="form-control-plaintext border border-warning progress-bar text-dark" name="stok_barang" value="<?= queryone("tb_barang", $_GET['id'], "stok_barang") ?>">
                </div>
            </div>
            <br>
            <input type="submit" class="fas fa-shopping-cart btn btn-warning btn-lg btn-block" name="update" value="update">
    </form>
</body>

</html>