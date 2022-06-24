<?php
if (isset($_POST['add_pelanggan'])) {
    mysqli_query($conn, "INSERT INTO pelanggan VALUES(null, '$_POST[nama_pelanggan]')");
    header('Location:index.php?page=pelanggan');
}
