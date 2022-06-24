<?php
if (isset($_POST['edit_pelanggan'])) {
    mysqli_query($conn, "UPDATE pelanggan SET 
    `nama_pelanggan` = '$_POST[nama_pelanggan]' 
    where id_pelanggan = '$_GET[id]'");
    header('Location:index.php?page=pelanggan');
}
