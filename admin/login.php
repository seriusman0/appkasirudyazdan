<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $r = mysqli_query($conn, "SELECT * from tb_user where username = '$user'");

    if (mysqli_num_rows($r) === 1) {
        echo "user ditemukan";
        //cek password
        $row = mysqli_fetch_assoc($r);
        echo $row['password'];
        var_dump($row);
        if (password_verify($pass, $row["password"])) {
            echo "Berhasil verivikasi";
            $_SESSION["login"] = true;
            $_SESSION["nama_user"] = $row["nama_user"];

            header('location:index.php');
        } else {
            echo "<script>alert('Password Salah');
            window.location('index.php');</script>";
        }
    } else {
        echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                window.location('index.php');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kasir UD Yazdan</title>
</head>

<body>
    <h1>LOGIN PAGE</h1>
    <form action="" method="post">
        <input type="text" placeholder="username" autofocus name="username" autocomplete="off">
        <input type="password" placeholder="password" name="password" autocomplete="off">
        <input type="submit" name="login" value="Login">
    </form>

</body>
    
</html>