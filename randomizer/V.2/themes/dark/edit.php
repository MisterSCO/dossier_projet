<header class="bg-light p-1 rounded text-center">
    <h1>Edition d'un dieu</h1>
</header>
<div class="container bg-light">
    <div class="m-5">
        <form action="/edit" method="post">
            <fieldset>
                <?= $message ?>
                <input type="hidden" name="id_god" value="<?= $aFormDatas['id_god'] ?>">
                <div class="row">
                    <div class="mb-3 col">
                        <label for="name" class="form-label">Nom du dieu</label>
                        <input type="name" name="name" id="name" class="form-control fs-4" value="<?= htmlspecialchars($aFormDatas['name']) ?>">
                    </div>

                    <div class="mb-3 col">
                        <label for="title" class="form-label">Titre</label>
                        <input type="title" name="title" id="title" class="form-control fs-4" value="<?= htmlspecialchars($aFormDatas['title']) ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="mythologie" class="form-label">Mythologie</label>
                        <input type="mythologie" name="mythologie" id="mythologie" class="form-control fs-4" value="<?= htmlspecialchars($aFormDatas['mythologie']) ?>">
                    </div>

                    <div class="mb-3 col">
                        <label for="id_class" class="form-label">Classe</label>
                        <select class="form-select fs-4" aria-describedby="help-user" name="id_class">
                            <option value="" class="fs-4" selected disabled>Choisir la classe du dieu</option>
                            <?php foreach ($aClasses as $oClasse) : ?>
                                <option <?php if ($oClasse->getId() == $aFormDatas['id_class']) : ?> selected <?php endif; ?> class="fs-4" value="<?= intval($oClasse->getId()) ?>">
                                    <?= htmlspecialchars($oClasse->getLabel()) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">L'histoire du dieu</label>
                    <textarea name="description" id="description" class="form-control fs-4" cols="10" rows="10"><?= htmlspecialchars($aFormDatas['description']) ?></textarea>
                </div>
            </fieldset>
            <input class="btn btn-success fs-4 ms-4" type="submit" value="Envoyer">
        </form>
    </div>
</div>