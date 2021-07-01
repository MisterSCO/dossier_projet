<section class="random">
    <h1 class="h1">Votre personnage</h1>


    <figure class="god popover-container" tabindex="0">
        <figcaption>
            <header class="header-figcaption">
                <h1 class="god_name"><?= htmlspecialchars($oGod->getName()) ?></h1>
                <p class="god_title"><?= htmlspecialchars($oGod->getTitle()) ?></p>
            </header>

            <div class="popover"><?= htmlspecialchars($oGod->getDescription()) ?></div>
        </figcaption>

        <img class="god_picture test" src="themes/dark/img/Bellona_1920.jpg" alt="<?= htmlspecialchars($oGod->getName()) . ', ' . htmlspecialchars($oGod->getTitle()) ?>">

    </figure>

    <ul class="items">
        <?php while ($items = $query_items->fetch()) : ?>
            <li>
                <figure class="popover-container item" tabindex="0">
                    <figcaption>
                        <h1 class="item_name"><?= htmlspecialchars($items['name']) ?></h1>
                        <div class="popover"><?= htmlspecialchars($items['passif']) ?></div>
                    </figcaption>
                    <img class="item_picture" src="<?= htmlspecialchars($items['picture_item']) ?>" alt="<?= htmlspecialchars($items['name']) ?>">
                </figure>
            </li>
        <?php endwhile ?>
    </ul>

</section>