<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $r = mysqli_query($conn, "SELECT * from tb_user where username = '$user'");

    if (mysqli_num_rows($r) === 1) {
        // echo "user ditemukan";
        //cek password
        $row = mysqli_fetch_assoc($r);
        // echo $row['password'];
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
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/flickity.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-rubiklato.css" rel="stylesheet" type="text/css" media="all" />
    <title>Admin Kasir Kantin Kejujuran</title>
</head>

<body>
    <div class="main-container">
        <section class="height-100 imagebg text-center" data-overlay="4">

            <div class="background-image-holder">
                <!-- Letakkan file sumber background -->
            </div>
            <div class="container pos-vertical-center">
                <div class="row">
                    <div class="col-md-7 col-lg-5">
                        <h2>Login to continue</h2>
                        <p class="lead">
                            Selamat Datang, silakan masuk menggunakan akun yang telah terdaftar dalam sistem Kasir Kantin Kejujuran
                        </p>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="username" placeholder="Username" autofocus />
                                </div>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="Password" />
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn--primary type--uppercase" name="login" type="submit">Login</button>
                                </div>
                            </div>
                            <!--end of row-->
                        </form>

                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
    </div>

    <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/flickity.min.js"></script>
    <script src="../js/easypiechart.min.js"></script>
    <script src="../js/parallax.js"></script>
    <script src="../js/typed.min.js"></script>
    <script src="../js/datepicker.js"></script>
    <script src="../js/isotope.min.js"></script>
    <script src="../js/ytplayer.min.js"></script>
    <script src="../js/lightbox.min.js"></script>
    <script src="../js/granim.min.js"></script>
    <script src="../js/jquery.steps.min.js"></script>
    <script src="../js/countdown.min.js"></script>
    <script src="../js/twitterfetcher.min.js"></script>
    <script src="../js/spectragram.min.js"></script>
    <script src="../js/smooth-scroll.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>