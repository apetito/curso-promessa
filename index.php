<?php
// Adicionando configurações
include_once "config/config.php";
include_once VIEW_PATH."/header.php";

if (isset($_GET['page'])) {
    $file = VIEW_PATH . '/' . basename($_GET['page']) . '.php';
    if (file_exists($file)) {
        include_once $file;
    } else {
        include_once VIEW_PATH . "/error.php";
    }
} else {
    include_once VIEW_PATH . "/home.php";
}

include_once VIEW_PATH."/footer.php";

?>