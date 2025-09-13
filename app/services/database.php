<?php

function getDatabaseConnection()
{

    $host = DB_HOST;
    $db = 'biblia_nvi';
    $user = DB_USER;
    $pass = DB_PASS;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Could not connect to the database $db :" . $e->getMessage());
    }
}

?>