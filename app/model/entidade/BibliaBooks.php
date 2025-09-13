<?php

function getBibliaBooks(): array
{
    $db = getDatabaseConnection();
    $stmt = $db->query("SELECT * FROM books");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>