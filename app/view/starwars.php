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
                        <p>
                            <b>Personagens:</b>
                        </p>
                        <ul>
                            <?php
                            $allCharacters = [];
                            foreach ($movie['characters'] as $characterUrl) {
                                $urlData = explode('/', $characterUrl);
                                $characterId = end($urlData);
                                if ($characterId) {
                                    if (!isset($allCharacters[$characterId])) {
                                        $characterData = getPeopleDetail((int)$characterId);
                                        if ($characterData) {
                                            $allCharacters[$characterId] = htmlspecialchars($characterData['name']);
                                        }
                                        ?>
                                        <li>
                                            <a href="?page=starwars-people-detail&id=<?=$characterId?>">
                                                <?=$allCharacters[$characterId] ?? "Desconhecido"?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

</di>