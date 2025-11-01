<?php

function getDatabaseConnection()
{
    $host = DB_HOST;
    $user = DB_USER;
    $pass = DB_PASS;
    $port = DB_PORT;
    $dbName = DB_NAME;

    try {

        // build the DSN including SSL settings
        $conn = "mysql:";
        $conn .= "host=" . $host;
        $conn .= ";port=" . $port;
        $conn .= ";dbname=" . $dbName;
        $conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

        $pdo = new PDO($conn, $user, $pass);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Could not connect to the database $db :" . $e->getMessage());
    }
}

?>