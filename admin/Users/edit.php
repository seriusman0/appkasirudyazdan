<?php
if (isset($_POST['edit_user'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE tb_user SET 
    `nama_user` = '$_POST[nama_user]', 
    `nohp_user` = '$_POST[nohp_user]', 
    `username` = '$_POST[username]', 
    `password` = '$password' where id_user = '$_GET[id]'");
    header('Location:index.php?page=user');
}
