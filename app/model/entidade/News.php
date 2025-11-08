<?php

function getNoticias(string $tipoNoticia): ?array 
{

    // Noticias:
    $news['politica'][] = [
        'title' => 'Noticia 1 - Politica',
        'description' => 'lkjgsldfkgsdfgsf gsdgfsgfs gfsdf gsdf gsfd gsdfgdf'
    ];

    $news['atualidades'][] = [
        'title' => 'Noticia 1 - Atualidades',
        'description' => 'adfgsdfgsdfg sdgf sdf gsdfg sfg sf'
    ];

    $news['policia'][] = [
        'title' => 'Noticia 1 - Policia',
        'description' => 'adfgsdfgsdfg sdgf sdf gsdfg sfg sf'    
    ];

    if (isset($news[$tipoNoticia])) {
        return $news[$tipoNoticia];
    }

    return null;
}

?>