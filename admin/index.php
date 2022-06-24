<?php
session_start();
// error_reporting(0);
include "functions.php";
include "../conf/config.php";
if ($_SESSION["login"] != true) {
    include "login.php";
} else {
    include "route.php";
}
