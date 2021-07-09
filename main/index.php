<?php
include "../conf/config.php";
include "../admin/functions.php";
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
    <title>UD Yazdan</title>
</head>

<body>
    <a id="start"></a>


    <!--end of modal instance-->

    <div class="bar bg--dark boxed boxed--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="bar__module">
                        <ul class="menu-horizontal">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="../admin/index.php">Admin</a>
                            </li>
                            <li>
                                <a href="#">History</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end of bar-->
    <center>
        <h1>APLIKASI KASIR UD YAZDAN</h1>
    </center>
    <table class="border--round">
        <tr>
            <th>Tambah Produk</th>
            <th>Pembayaran</th>
        </tr>
        <tr>
            <td valign="top"><?php include "add_cart.php" ?></td>
            <td><?php include "payment.php" ?></td>
        </tr>
        <tr>
            <th colspan="2">Keranjang</th>
        </tr>
        <tr>
            <td colspan="2">
                <?php include "cart.php" ?>
            </td>
        </tr>
        <tr>
            <th>Sejarah</th>
            <th>Struk</th>
        </tr>
        <tr>
            <td><?php include "history.php" ?></td>
            <td valign="top" rowspan="2"><?php include "payment_history.php" ?></td>
        </tr>

    </table>

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