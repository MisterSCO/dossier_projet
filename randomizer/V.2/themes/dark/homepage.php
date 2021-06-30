<section id="s1" class="random">
    <a class="text-light randomize-button" href="">Tirage</a>

    <div class="grid">
        <figure class="god infobulle">
            <figcaption>
                <h1 class="god_name"><?= htmlspecialchars($oGod->getName()) ?></h1>
                <p class="god_title"><?= htmlspecialchars($oGod->getTitle()) ?></p>
                <span class="span"><?= htmlspecialchars($oGod->getDescription()) ?></span>
            </figcaption>

            <img class=" god_picture test" src="<?= htmlspecialchars($oGod->getImg()) ?>" alt="<?= htmlspecialchars($oGod->getName()) . ', ' . htmlspecialchars($oGod->getTitle()) ?>">

        </figure>

        <ul class="items">
            <?php while ($items = $query_items->fetch()) : ?>
                <li>
                    <figure class="infobulle">
                        <figcaption>
                            <h2 class="item_name"><?= htmlspecialchars($items['name']) ?></h2>
                            <span class="span"><?= htmlspecialchars($items['passif']) ?></span>
                        </figcaption>
                        <img class="item_picture" src="<?= htmlspecialchars($items['picture_item']) ?>" alt="<?= htmlspecialchars($items['name']) ?>">
                    </figure>
                </li>
            <?php endwhile ?>
        </ul>
    </div>
</section>