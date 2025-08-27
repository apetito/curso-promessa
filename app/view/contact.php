<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = false;
    if (isset($_POST['nome'], $_POST['email'], $_POST['message'])) {
        $nome = htmlspecialchars(trim($_POST['nome']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        salvarContato([
            'nome' => $nome,
            'email' => $email, 
            'mensagem' => $message
        ]);
        $success = true;
    } 
}

?>
<div class="content_container">
    <?php 
    if (isset($success) && $success) { ?>
        <div class="success">Obrigado pelo seu contato!</div>
        <?php
    } 
    ?>
    <h1>Contato</h1>
    <form action="<?=SITE_URL?>/index.php?page=contact" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Mensagem:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</div>