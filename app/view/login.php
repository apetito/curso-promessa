<?php
session_start();

$hardcoded_user = 'admin';
$hardcoded_pass = 'senha123'; // senha hardcoded para exemplo

$uploadsDir = PUBLIC_PATH . '/images/uploads';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}

$loginError = '';
$uploadMessage = '';

// Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();

    header('Location: '.SITE_URL.'/index.php');
    exit;
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = ($_POST['username'] ?? '');
    $pass = ($_POST['password'] ?? '');
    if ($user === $hardcoded_user && $pass === $hardcoded_pass) {
        $_SESSION['user'] = $user;
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    } else {
        $loginError = 'Usuário ou senha incorretos.';
    }
}

// Handle file upload (only for logged users)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload']) && isset($_SESSION['user'])) {
    if (!isset($_FILES['image'])) {
        $uploadMessage = 'Nenhum arquivo enviado.';
    } else {
        $file = $_FILES['image'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $uploadMessage = 'Erro no upload. Código: ' . $file['error'];
        } else {
            // Basic validation: is an image?
            $tmpPath = $file['tmp_name'];
            $imgInfo = @getimagesize($tmpPath);
            $allowedMimes = ['image/jpeg'];
            if ($imgInfo === false || !in_array($imgInfo['mime'], $allowedMimes, true)) {
                $uploadMessage = 'Tipo de arquivo inválido. Envie imagens JPG.';
            } else {
                // sanitize filename
                $origName = basename($file['name']);
                $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
                $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
                $newName = $safeName . '_' . time() . '.' . $ext;
                $dest = $uploadsDir . '/' . $newName;
                if (move_uploaded_file($tmpPath, $dest)) {
                    $uploadMessage = 'Arquivo enviado com sucesso: ' . htmlspecialchars($newName, ENT_QUOTES);
                } else {
                    $uploadMessage = 'Falha ao mover o arquivo.';
                }
            }
        }
    }
}

// List uploaded images (for logged users)
$uploadedFiles = [];
if (is_dir($uploadsDir)) {
    foreach (scandir($uploadsDir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $uploadsDir . '/' . $f;
        if (is_file($path)) {
            $uploadedFiles[] = $f;
        }
    }
}
?>

<div class="content_container">
    <div class="card">
    <?php if (!isset($_SESSION['user'])): ?>
        <h2>Login</h2>
        <?php if ($loginError): ?><p class="error"><?= htmlspecialchars($loginError) ?></p><?php endif; ?>
        <form method="post" action="">
            <div>
                <label>Usuário:<br>
                    <input type="text" name="username" required>
                </label>
            </div>
            <div>
                <label>Senha:<br>
                    <input type="password" name="password" required>
                </label>
            </div>
            <div style="margin-top:0.5rem;">
                <button type="submit" name="login">Entrar</button>
            </div>
        </form>
        <!--
        <p><small>Usuário: <code><?= htmlspecialchars($hardcoded_user) ?></code> — Senha: <code><?= htmlspecialchars($hardcoded_pass) ?></code></small></p>
        -->
    <?php else: ?>
        <h2>Área restrita</h2>
        <p>Olá, <?= htmlspecialchars($_SESSION['user']) ?>. <a href="?page=login&action=logout">Sair</a></p>

        <h3>Enviar imagem</h3>
        <?php if ($uploadMessage): ?>
            <p class="<?= strpos($uploadMessage, 'sucesso') !== false ? 'success' : 'error' ?>">
                <?= htmlspecialchars($uploadMessage) ?>
            </p>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data" action="">
            <div>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <div style="margin-top:0.5rem;">
                <button type="submit" name="upload">Enviar</button>
            </div>
        </form>

        <?php if (count($uploadedFiles) > 0): ?>
            <h3>Imagens enviadas</h3>
            <div class="image_gallery">
                <?php foreach ($uploadedFiles as $f): ?>
                    <img src="<?=PUBLIC_URL.'/images/uploads/'. rawurlencode($f) ?>" alt="<?= htmlspecialchars($f) ?>" class="thumb">
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Nenhuma imagem enviada ainda.</p>
        <?php endif; ?>
    <?php endif; ?>
    </div>
</div>