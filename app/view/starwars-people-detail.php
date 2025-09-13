<?php
$characterData = getPeopleDetail((int)$_GET['id']);
?>
<div class="content_container">
    <h1>
        <?=$characterData['name'] ?? "Desconhecido"?>
    </h1>
    <div>
        <div>
            <b>Altura:</b> <?=$characterData['height'] ?? "Desconhecido"?>
            <br>
            <b>Peso:</b> <?=$characterData['mass'] ?? "Desconhecido"?>
            <br>
            <b>Cor do cabelo:</b> <?=$characterData['hair_color'] ?? "Desconhecido"?>
            <br>
            <b>Cor da pele:</b> <?=$characterData['skin_color'] ?? "Desconhecido"?>
            <br>
            <b>Cor dos olhos:</b> <?=$characterData['eye_color'] ?? "Desconhecido"?>
        </div>
    </div>
</div>