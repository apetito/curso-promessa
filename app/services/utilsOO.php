<?php

namespace App\Services;

class Utils
{
    /**
     * Função para depurar dados e encerrar a execução do script.
     * Útil para debugging.
     * @param mixed $data
     * @return never
     */
    public static function dd($data): never
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }

    /**
     * Função para carregar todos os models automaticamente.
     * Útil para evitar a necessidade de incluir manualmente cada model.
     * Certifique-se de que os models estão no diretório correto.
     */
    public static function loadAllControllers()
    {
        $controllerPath = CONTROLLER_PATH;
        foreach (glob($controllerPath . "/*.php") as $filename) {
            require_once $filename;
        }
    }

    /**
     * Função para carregar todos os models automaticamente.
     * Útil para evitar a necessidade de incluir manualmente cada model.
     * Certifique-se de que os entities estão no diretório correto.
     */
    public static function loadAllEntities()
    {
        $entityPath = ENTITY_PATH;
        foreach (glob($entityPath . "/*.php") as $filename) {
            require_once $filename;
        }
    }
}