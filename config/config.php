<?php

define('SITE_PATH', "projeto");
define('NOME_DO_SITE',"Site do Rodrigo");
define("VIEW_PATH",$_SERVER['DOCUMENT_ROOT'].SITE_PATH."/app/view");
define("SITE_URL", "https://localhost:8000/".SITE_PATH);

// Controllers
define("CONTROLLER_PATH", $_SERVER['DOCUMENT_ROOT'].SITE_PATH."/app/controller");

// Entity Models
define("ENTITY_PATH", $_SERVER['DOCUMENT_ROOT'].SITE_PATH."/app/model/entidade");

define('LAYOUT_URL', SITE_URL."/app/view/layout");
define('PUBLIC_PATH', $_SERVER['DOCUMENT_ROOT'].SITE_PATH."/public");
define('PUBLIC_URL', SITE_URL."/public");


// Add utils
include_once $_SERVER['DOCUMENT_ROOT'].SITE_PATH."/app/services/utils.php";
loadAllEntities(); // Carrega todas as entidades do diretório especificado

// Database settings
/*
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "abcd1234");
define("DB_PORT", "3306");
define("DB_NAME", "biblia_nvi");
*/

// Remote Database settings


define("INITIAL_VERSE_ID", 1);
define("FINAL_VERSE_ID", 31062);
define("VERSE_PRIORITY", [
     1001 => 5, 
     1004 => 5,
     1007 => 5,
     1207 => 5,
     1215 => 5,
     1503 => 5,
     1803 => 5,
     2203 => 5,
     2305 => 5,
     2504 => 5,
     2603 => 5,
     2704 => 5,
     2904 => 5,
     3005 => 5
]);

include_once $_SERVER['DOCUMENT_ROOT'].SITE_PATH."/app/services/database.php";