<section id="random" class="container">
    <h1 class="text-light">Randomizer SMITE</h1>
    <a class="text-light randomize-button" href="">Tirage</a>

    <div class="grid">
        <div id="god">
            <p class="god_name text-light"><?= htmlspecialchars($oGod->getName()) ?></p>
            <p class="god_title text-light"><?= htmlspecialchars($oGod->getTitle()) ?></p>
            <img onmouseover="montre('<?php echo (htmlspecialchars($oGod->getDescription())); ?>')" onmouseout="cache()" class="god_picture" src="<?= htmlspecialchars($oGod->getImg()) ?>">
        </div>

        <div id="items">
            <?php while ($items = $query_items->fetch()) : ?>
                <div class="item">
                    <p class="item_name text-light"><?= htmlspecialchars($items['name']) ?></p>
                    <img onmouseover="montre('<?php if (!empty($items['passif'])) {echo (htmlspecialchars($items['passif']));} else {echo ("Cet objet n\'a pas de passif");} ?>')" onmouseout="cache()" class="item_picture" src="<?= htmlspecialchars($items['picture_item']) ?>">
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>