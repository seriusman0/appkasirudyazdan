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
