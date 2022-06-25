
<?php
$result = mysqli_query($conn, "INSERT INTO pembayaran_hutang VALUES(null, '$_GET[id]', '$_GET[sisa]', '', current_date)");
if ($result) {
    header("location:index.php?page=buku_hutang");
}
?>