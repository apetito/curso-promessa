<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?=NOME_DO_SITE;?>
    </title>
    <link rel="stylesheet" href="<?=SITE_URL?>/app/view/layout/css/main.css">
    <link rel="stylesheet" href="<?=SITE_URL?>/app/view/layout/css/structure.css">
    <script src="<?=SITE_URL?>/app/view/layout/js/utils.js"></script>
</head>
<body>
    <div class="header_container">
        <div class="logo_container">
            <img src="<?=PUBLIC_URL?>/images/logo.png" alt="Logo">
        </div>
        <div class="menu_container">
            <nav>
                <a href="<?=SITE_URL?>/index.php">Home</a>
                <a href="<?=SITE_URL?>/index.php?page=contact">Contato</a>
                <a href="<?=SITE_URL?>/index.php?page=galeria">Galeria</a>
                <a href="<?=SITE_URL?>/index.php?page=news">News</a>
                <a href="<?=SITE_URL?>/index.php?page=starwars">Star Wars</a>
            </nav>
        </div>
    </div>
    