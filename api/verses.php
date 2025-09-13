<?php

include_once "../config/config.php";

header('Content-Type: application/json; charset=utf-8');

$verses = getAllVerses();
if (!$verses) {
    http_response_code(404);
    echo json_encode(["error" => "No verses found"]);
    exit;
}

if (isset($_GET['book_id']) && isset($_GET['chapter']) && isset($_GET['verse'])) {
    $chapter = intval($_GET['chapter']);
    $verse = intval($_GET['verse']);
    $verses = getVerseByBookAndChapterAndVerse($id, $chapter, $verse);
    if (!$verses) {
        http_response_code(404);
        echo json_encode(["error" => "Verse not found"]);
        exit;
    }
    echo json_encode($verses);
    exit;
}

if (isset($_GET['book_id']) && isset($_GET['chapter'])) {
    $chapter = intval($_GET['chapter']);
    $bookId = intval($_GET['book_id']);
    $verses = getVerseByBookAndChapter($bookId, $chapter);
    if (!$verses) {
        http_response_code(404);
        echo json_encode(["error" => "Verse not found"]);
        exit;
    }
    echo json_encode($verses);
    exit;
}

if (isset($_GET['book_id'])) {
    $id = intval($_GET['book_id']);
    $verses = getVerseByBook($id);
    if (!$verses) {
        http_response_code(404);
        echo json_encode(["error" => "Verse not found"]);
        exit;
    }
    echo json_encode($verses);
    exit;
}

http_response_code(200);
echo json_encode($verses);
exit;
    