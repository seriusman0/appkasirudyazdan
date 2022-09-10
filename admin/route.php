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
    <title>Index</title>
</head>

<body>
    <div class="bar bg--dark boxed boxed--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="bar__module">
                        <ul class="menu-horizontal">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="../main/index.php">Transaksi</a>
                            </li>
                            <!-- <li>
                                <a href="index.php?page=user">User</a>
                            </li>
                            <li>
                                <a href="index.php?page=data_transaksi">Data Transaksi</a>
                            </li>
                            <li>
                                <a href="index.php?page=pelanggan">Pelanggan</a>
                            </li>
                            <li>
                                <a href="index.php?page=hutang">Hutang</a>
                            </li>
                            <li>
                                <a href="index.php?page=buku_hutang">Buku Hutang</a>
                            </li>
                            <li>
                                <a href="index.php?page=pembayaran_hutang">Pembayaran Hutang</a>
                            </li> -->
                            <li>
                                <a href="logout.php">Logout</a>
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
    <?php
    if ($_GET['page'] == '') {
        include "controllers/index.php";
    } elseif ($_GET['page'] == 'add') {
        include "controllers/add.php";
    } elseif ($_GET['page'] == 'delete') {
        include "controllers/delete.php";
    } elseif ($_GET['page'] == 'update') {
        include "controllers/update.php";
    } elseif ($_GET['page'] == 'view') {
        include "controllers/view.php";
    }


    //users
    elseif ($_GET['page'] == 'user') {
        include "Users/index.php";
    } elseif ($_GET['page'] == 'add_user') {
        include "Users/add.php";
    } elseif ($_GET['page'] == 'edit_user') {
        include "Users/edit.php";
    } elseif ($_GET['page'] == 'delete_user') {
        include "Users/delete.php";
    }

    //pelanggan
    elseif ($_GET['page'] == 'pelanggan') {
        include "pelanggan/index.php";
    } elseif ($_GET['page'] == 'add_pelanggan') {
        include "pelanggan/add.php";
    } elseif ($_GET['page'] == 'edit_pelanggan') {
        include "pelanggan/edit.php";
    } elseif ($_GET['page'] == 'delete_pelanggan') {
        include "pelanggan/delete.php";
    }

    //hutang
    elseif ($_GET['page'] == 'hutang') {
        include "hutang/index.php";
    } elseif ($_GET['page'] == 'add_hutang') {
        include "hutang/add.php";
    } elseif ($_GET['page'] == 'edit_hutang') {
        include "hutang/edit.php";
    } elseif ($_GET['page'] == 'delete_hutang') {
        include "hutang/delete.php";
    }

    //buku_hutang
    elseif ($_GET['page'] == 'buku_hutang') {
        include "buku_hutang/index.php";
    } elseif ($_GET['page'] == 'add_buku_hutang') {
        include "buku_hutang/add.php";
    } elseif ($_GET['page'] == 'edit_buku_hutang') {
        include "buku_hutang/edit.php";
    } elseif ($_GET['page'] == 'delete_buku_hutang') {
        include "buku_hutang/delete.php";
    }

    //pembayaran_hutang
    elseif ($_GET['page'] == 'pembayaran_hutang') {
        include "pembayaran_hutang/index.php";
    } elseif ($_GET['page'] == 'add_pembayaran_hutang') {
        include "pembayaran_hutang/add_pembayaran_hutang.php";
    } elseif ($_GET['page'] == 'edit_pembayaran_hutang') {
        include "pembayaran_hutang/edit_pembayaran_hutang.php";
    } elseif ($_GET['page'] == 'delete_pembayaran_hutang') {
        include "pembayaran_hutang/delete_pembayaran_hutang.php";
    }

    //lunas
    elseif ($_GET['page'] == 'lunas_pembayaran_hutang') {
        include "pembayaran_hutang/lunas_pembayaran_hutang.php";
    }


    // datatransaksi
    elseif ($_GET['page'] == 'data_transaksi') {
        include "datatransaksi/index.php";
    }
    ?>

</body>

</html>