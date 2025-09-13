<?php

function getAllVerses(): array
{
    $db = getDatabaseConnection();
    $stmt = $db->query("SELECT * FROM verses");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getVerseByBook($bookId): array
{
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM verses WHERE book = :book_id");
    $stmt->bindParam(':book_id', $bookId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getVerseByBookAndChapter($bookId, $chapter): array
{
    $db = getDatabaseConnection();
    $sql = "SELECT 
                b.name as book, 
                concat(b.abbrev,' ',v.chapter,':',v.verse) as reference, 
                v.version, 
                t.name as testament, 
                v.text 
            FROM verses v 
                INNER JOIN books b ON b.external_id = v.book 
                INNER JOIN testament t ON t.id = v.testament 
            WHERE b.external_id = :book_id AND v.chapter = :chapter
            ORDER BY v.id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':book_id', $bookId);
    $stmt->bindParam(':chapter', $chapter);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getVerseByBookAndChapterAndVerse($bookId, $chapter, $verse): array
{
    $db = getDatabaseConnection();
    $sql = "SELECT 
                b.name as book, 
                concat(b.abbrev,' ',v.chapter,':',v.verse) as reference, 
                v.version, 
                t.name as testament, 
                v.text
            FROM verses v 
                INNER JOIN books b ON b.external_id = v.book 
                INNER JOIN testament t ON t.id = v.testament 
            WHERE b.external_id = :book_id AND v.chapter = :chapter AND v.verse = :verse
            ORDER BY v.id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':book_id', $bookId);
    $stmt->bindParam(':chapter', $chapter);
    $stmt->bindParam(':verse', $verse);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>