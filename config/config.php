<?php

define('SITE_PATH', "");
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

