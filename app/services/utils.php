<?php

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

function randomico($inicial, $final): int 
{
    return rand($inicial, $final);
}
/**
  * Sorteia um número com prioridade para uma lista específica
  * @param array $prioritarios Lista de números que devem ter mais chance de serem sorteados
  * @param int $min Valor mínimo
  * @param int $max Valor máximo
  * @return int Número sorteado
  */
function randomicoPrioridade(): int
{
    $pesoPrioritarios = 5.0;
    // Garante que os prioritários estão dentro do intervalo permitido
    $prioritarios = array_filter(VERSE_PRIORITY, fn($n) => $n >= INITIAL_VERSE_ID && $n <= FINAL_VERSE_ID);
    // Cria um pool de números: os prioritários com mais "peso"
    $pool = [];
    foreach ($prioritarios as $num => $peso) {
        $quantidade = max(1, (int)($peso * $pesoPrioritarios));
        for ($i = 0; $i < $quantidade; $i++) {
            $pool[] = $num;
        }
    }

    // Retorna um número aleatório do pool, ou um número aleatório normal se o pool estiver vazio
    return $pool ? $pool[array_rand($pool)] : randomico(INITIAL_VERSE_ID, FINAL_VERSE_ID);
}

?>