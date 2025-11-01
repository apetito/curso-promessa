<div class="content_container">
    <h1>Biblia - Livros</h1>
    <p>Biblia OnLine!</p>
    <div>
        <div>
            <h4>
                <center>
                    <i>
                        <?php
                        $randomVerse = getRandomVerse();
                        if (null !== $randomVerse) {
                            ?>
                            <?=$randomVerse['text']?> - <small><?=$randomVerse['book'].', '.$randomVerse['reference']?></small>
                            <?php
                        }
                        ?>
                    </i>
                </center>
            </h4>
            <h2>Livros</h2>
            <div>
                <?php
                $bibliaBooks = getBibliaBooks();
                if (null !== $bibliaBooks){
                    ?>
                    <ul>
                        <?php
                        foreach ($bibliaBooks as $book) {
                            ?>
                            <li>
                                <?=$book['abbrev']?> - <?=$book['name']?> 
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</di>