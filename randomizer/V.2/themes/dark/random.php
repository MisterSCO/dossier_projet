<section class="random">
    <header>
        <h1 class="main-title">Ton destin est scellé, tu seras :</h1>
    </header>

    <figure class="god popover-container">
        <figcaption>
            <header class="header-figcaption">
                <h2 class="god_name"><?= htmlspecialchars($oGod->getName()) ?></h2>
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
        <?php foreach ($aItems as $oItem) : ?>
            <li>
                <figure class="popover-container item">
                    <figcaption>
                        <h1 class="item_name"><?= htmlspecialchars($oItem->getName()) ?></h1>
                        <div class="popover"><?= htmlspecialchars($oItem->getPassif()) ?></div>
                    </figcaption>
                    <img class="item_picture" src="<?= htmlspecialchars($oItem->getImg()) ?>" alt="<?= htmlspecialchars($oItem->getName()) ?>">
                </figure>
            </li>
        <?php endforeach ?>
    </ul>
    <a class="text-light randomize-button" href="">Essaye encore</a>
</section>