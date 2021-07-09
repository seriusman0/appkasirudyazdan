<?php
include "../conf/config.php";
mysqli_query($conn, "UPDATE tb_cart set tb_cart.`jumlah` = '$_POST[newCount]' WHERE id_cart = '$_GET[id]'");
// header("Location:index.php");
