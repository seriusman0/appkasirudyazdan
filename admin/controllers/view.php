<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <h1>Daftar Barang</h1>
    <table border="1" class="border--round table--alternate-row">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Barang</td>
                <td align="center">Nama Barang</td>
                <td align="center">Modal </td>
                <td align="center">Harga </td>
                <td align="center">Stok </td>
                <td align="center">Action</td>
            </tr>
        </thead>
        <tbody>
            <a href="index.php?page=add">Tambah</a>
            <?php
            // $barang = query("tb_barang");
            $barang = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY `created_at` DESC limit 10");
            $no = 1;
            while ($r = mysqli_fetch_array($barang)) {
                echo "<tr>
                <td align='center'>{$no}</td>
                            <td>$r[id_barang]</td>
                            <td>$r[nama_barang]</td>
                            <td align='right'>" . rp($r["modal_barang"]) . "</td>
                            <td align='right'>" . rp($r["harga_barang"]) . "</td>
                            <td align='center'>$r[stok_barang]</td>
                            <td><a href='index.php?page=update&id={$r['id_barang']}'>Edit</a>
                            <a href='index.php?page=delete&id={$r['id_barang']}' onclick=\"return confirm('Yakin Bahwa Data ini Dihapus?')\"  >Delete</a></td>
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