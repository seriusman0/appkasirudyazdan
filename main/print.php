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
    <title>Kantin Kejujuran</title>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Pembeli</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $row = mysqli_query($conn, "select tb_payment.id_payment, tb_payment.pembeli, tb_payment.total_bayar, tb_payment.total_bayar as kembalian, tb_payment.update_at, penjual from tb_payment, tb_history where tb_payment.id_payment = tb_history.id_payment group by tb_payment.id_payment order by tb_payment.update_at desc");

        while ($r = mysqli_fetch_array($row)) {
            $total = mysqli_fetch_assoc(mysqli_query(
                $conn,
                "select sum(tb_barang.harga_barang*tb_history.jumlah) as total 
                    from tb_history,tb_payment, tb_barang where tb_history.id_payment = tb_payment.id_payment 
                    and tb_barang.id_barang = tb_history.id_barang and tb_history.id_payment = '$r[id_payment]'"
            ));
            echo "
            <tr>
                <td>$no</td>
                <td>$r[pembeli]</td>
                <td><a href='cetak_struk.php?id=$r[id_payment]'>Cetak Struk</a></td>
            </tr>";
            $no++;
        }
        ?>

    </table>
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