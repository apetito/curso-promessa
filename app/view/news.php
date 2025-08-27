<?php

include_once ENTITY_PATH . "/News.php";
?>
<div class="content_container">
    <h1>Notícias</h1>
    <p>Fique por dentro das últimas novidades!</p>
    <div>
        <div>
            Política
            <div>
                <?php
                $newsPolitica = getNoticias('politica', $news);
                if (null !== $newsPolitica) {
                    foreach ($newsPolitica as $noticia) {
                        ?>
                        <h1>
                            <?=$noticia['title']?>
                        </h1>
                        <p>
                            <?=$noticia['description']?>
                        </p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>