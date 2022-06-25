<?php

$result = mysqli_query($conn, "DELETE FROM pembayaran_hutang WHERE id_pembayaran_hutang= '$_GET[id]'");
header("location:index.php?page=pembayaran_hutang&id=$_GET[id_hutang]");
