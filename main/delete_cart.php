<?php
include "../conf/config.php";
mysqli_query($conn, "DELETE FROM tb_cart WHERE id_cart = '$_GET[id]'");
header("Location:index.php");
