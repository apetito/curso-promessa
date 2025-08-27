<?php

function getAllWallpapers()
{
    $wallpaperPath = PUBLIC_PATH . "/images/wallpapers";
    $wallpapers = [];
    try {
        foreach (glob($wallpaperPath . "/*.jpg") as $filename) {
            $wallpapers[] = PUBLIC_URL."/images/wallpapers/".basename($filename);
        }
    } catch (Exception $e) {
        dd("Error loading wallpapers: " . $e->getMessage());
    }

    return $wallpapers;
}