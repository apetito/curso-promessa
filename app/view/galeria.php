<div class="content_container">
    <h1>Galeria</h1>
    <p>Bem-vindo à galeria de imagens!</p>
    <div>
        <div>
            <h2>Wallpapers</h2>
            <div>
                <?php
                $images = getAllWallpapers();
                if (null !== $images) {
                    ?>
                    <div class="image_gallery">
                        <?php
                        foreach ($images as $image) {
                            ?>
                            <img src="<?=$image?>" onclick="openImageModal('<?=$image?>')" />
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>