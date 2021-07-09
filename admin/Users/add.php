<?php
if (isset($_POST['add_user'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tb_user VALUES(null, '$_POST[nama_user]', '$_POST[nohp_user]', '$_POST[username]', '$password')");
    header('Location:index.php?page=user');
}
