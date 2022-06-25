<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <h1 align="center">Daftar Pembayaran Hutang</h1>
    <table border="1" class="border--round table--alternate-row container">
        <thead>
            <tr>
                <td align="center">No Pembayaran</td>
                <td align="center">Sebesar</td>
                <td align="center">Oleh</td>
                <td align="center">Tanggal </td>
                <td align="center">Action</td>
            </tr>
        </thead>
        <tbody>
            <div class="container">
                <a href="index.php?page=add_pembayaran_hutang&id=<?= $_GET['id'] ?>">Tambah</a>
            </div>
            <?php
            // $barang = query("tb_barang");
            $pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran_hutang WHERE id_hutang='$_GET[id]' ORDER BY `id_pembayaran_hutang` asc");
            $no = 1;
            while ($r = mysqli_fetch_array($pembayaran)) {
                echo "<tr>
                <td align='center'>Pembayaran Ke - {$no}</td>
                            <td align='right'>" . rupiah($r["jumlah"]) . "</td>
                            <td>$r[oleh]</td>
                            <td align='right'>$r[tgl]</td>
                            <td>
                                <a class='btn' href='index.php?page=edit_pembayaran_hutang&id={$r['id_pembayaran_hutang']}&id_hutang=$_GET[id]'>Edit</a>
                                <a class='btn btn-danger' href='index.php?page=delete_pembayaran_hutang&id={$r['id_pembayaran_hutang']}&id_hutang=$_GET[id]' onclick=\"return confirm('Yakin Bahwa Data ini Dihapus?')\"  >Delete</a>
                            </td>
                    </tr>";
                $no++;
            }
            ?>

        </tbody>
    </table>
    <script type="text/javascript">
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
</body>

</html>