<?php

namespace App;

class App
{
    /**
     * Construtor da classe App.
     * Carrega as configurações e inicializa os serviços necessários.
     * 
     * @param mixed $configPath
     * @throws \Exception
     */
    public function __construct($configPath)
    {
        if (file_exists($configPath)) {
            include $configPath;
        } else {
            throw new \Exception("Config file not found: $configPath");
        }
    }

    /**
     * Método para lidar com a requisição e renderizar a view apropriada.
     * 
     * @return void
     */
    public function handleRequest(): void
    {   
        include_once VIEW_PATH . "/header.php";

        $view = isset($_GET['page']) ? $_GET['page'] : 'home';
        $viewFile = VIEW_PATH. "/".$view.".php";
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            include VIEW_PATH . "/error.php";
        }
        
        include_once VIEW_PATH . "/footer.php";
    }
}

// Exemplo de uso:
$app = new App(__DIR__ . '/config/config.php');
$app->handleRequest();