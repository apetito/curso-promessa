<?php

include_once "../config/config.php";

header('Content-Type: application/json; charset=utf-8');

$books = getBibliaBooks();
if (!$books) {
    http_response_code(404);
    echo json_encode(["error" => "No books found"]);
    exit;
}

http_response_code(200);
echo json_encode($books);
exit;
    