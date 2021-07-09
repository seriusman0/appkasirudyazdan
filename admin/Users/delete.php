<?php
mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$_GET[id]'");
header("Location:index.php?page=user");
