<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <div class='modal-instance'>
        <a class='btn modal-trigger' href='#'>
            <span class='btn__text'>
                Tambah User
            </span>
        </a>
        <div class='modal-container'>
            <div class='modal-content'>
                <form action='index.php?page=add_user' method='post'>
                    <input type='text' placeholder='Nama' name='nama_user' required>
                    <input type='text' placeholder='No HP' name='nohp_user' required>
                    <input type='text' placeholder='Username' name='username' required>
                    <input type='password' placeholder='Password' name='password' required>
                    <input type='submit' name='add_user' value='Tambah'>
                </form>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>username</th>
            <th>Aksi</th>
        </tr>
        <?php
        $row = mysqli_query($conn, "SELECT * FROM tb_user");
        $no = 1;
        while ($r = mysqli_fetch_array($row)) {
            echo "
            <tr>
                <td>$no</td>
                <td>$r[nama_user]</td>
                <td>$r[username]</td>
                <td> 
                
                <div class='modal-instance'>
                    <a class='btn modal-trigger' href='#'>
                        <span class='btn__text'>
                            EDIT
                        </span>
                    </a>
                    <div class='modal-container'>
                        <div class='modal-content'>
                            <form action='index.php?page=edit_user&id=$r[id_user]' method='post'>
                                <input type='text'  name='nama_user' value='$r[nama_user]' required>
                                <input type='text'  name='nohp_user' value='$r[nohp_user]' required>
                                <input type='text'  name='username' value='$r[username]' required>
                                <input type='password'  name='password' required>
                                <input type='submit' name='edit_user' value='Tambah'>
                            </form>
                        </div>
                    </div>
                </div>
                <a class='btn' href='index.php?page=delete_user&id=$r[id_user]'>
                    <span class='btn__text'>
                        DELETE
                    </span>
                </a>
                
                </td>
            </tr>
                ";
            $no++;
        }
        ?>

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