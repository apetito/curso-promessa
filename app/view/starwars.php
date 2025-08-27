<div class="content_container">
    <h1>Star Wars</h1>
    <p>Explore o universo de Star Wars!</p>
    <div>
        <div>
            <h2>Filmes</h2>
            <div>
                <?php
                $starWarsMovies = getStarWarsFilms();
                if (null !== $starWarsMovies) {
                    foreach ($starWarsMovies as $movie) {
                        ?>
                        <h3>
                            <?=$movie['title']?>
                        </h3>
                        <p>
                            <?=$movie['opening_crawl']?>
                        </p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

</di>