`<?php

function debugging($data): void
{
    echo "<div class='debugging'>";
    echo "<pre>";
    if (is_array($data) || is_object($data)) {  
        print_r($data);
    } else {
        var_dump($data);
    }
    echo "</pre>";
    echo "</div>";
}

function dd($data): never
{
    debugging($data);
    die();
}

function loadAllEntities()
{
    $entityPath = ENTITY_PATH;
    try {
        foreach (glob($entityPath . "/*.php") as $filename) {
            require_once $filename;
        }
    } catch (Exception $e) {
        dd("Error loading entities: " . $e->getMessage());
    }
}

?>