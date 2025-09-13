<?php

function getApiData($url)
{
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception('Erro buscando dados da API: ' . curl_error($ch));
        }
        curl_close($ch);

        return json_decode($response, true);
        
    } catch (\Throwable $th) {
        throw new Exception("Error Processing Request", 1);
    }
    
}

function getStarWarsData(string $endpoint)
{
    $url = "https://swapi.info/api/{$endpoint}";

    $data = getApiData($url);
    return $data;
}

function getStarWarsPeople(int $page = 1)
{
    $data = getStarWarsData("people?page={$page}");
    return $data ?? [];
}

function getStarWarsPlanets(int $page = 1)
{
    $data = getStarWarsData("planets?page={$page}");
    return $data ?? [];
}

function getStarWarsVehicles(int $page = 1)
{
    $data = getStarWarsData("vehicles?page={$page}");
    return $data ?? [];
}

function getStarWarsStarships(int $page = 1)
{
    $data = getStarWarsData("starships?page={$page}");
    return $data ?? [];
}

function getStarWarsSpecies(int $page = 1)
{
    $data = getStarWarsData("species?page={$page}");
    return $data ?? [];
}
function getStarWarsFilms(int $page = 1)
{
    $data = getStarWarsData("films");

    return $data ?? [];
}

function getPeopleDetail(int $id)
{
    $data = getStarWarsData("people/{$id}");
    return $data ?? [];
}

?>

