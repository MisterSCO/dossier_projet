<section class="random">
    <header>

        <h1 class="main-title">Ton destin est scellé, tu seras :</h1>
    </header>

    <figure class="god popover-container" tabindex="0">
        <figcaption>
            <header class="header-figcaption">
                <h1 class="god_name"><?= htmlspecialchars($oGod->getName()) ?></h1>
                <p class="god_title"><?= htmlspecialchars($oGod->getTitle()) ?></p>
            </header>

            <div class="popover"><?= htmlspecialchars($oGod->getDescription()) ?></div>
        </figcaption>


        <picture class="god_picture test" alt="<?= htmlspecialchars($oGod->getName()) . ', ' . htmlspecialchars($oGod->getTitle()) ?>">
            <source srcset="themes/dark/img/<?= htmlspecialchars($oGod->getName()) ?>_1920.jpg" media="(min-width:1025px)">
            <source srcset="themes/dark/img/<?= htmlspecialchars($oGod->getName()) ?>_1024.jpg" media="(min-width:769px)">
            <img src="themes/dark/img/<?= htmlspecialchars($oGod->getName()) ?>_768.jpg">
        </picture>

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
    <a class="text-light randomize-button" href="">Essaye encore</a>
</section>