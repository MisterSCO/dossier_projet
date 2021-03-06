<section>
    <header class="bg-light p-1 rounded text-center">
        <h1>Tableau de bord</h1>
        <p>Gestion des dieux</p>
        <form class="d-flex col-sm-4">
            <input class="form-control form-control-lg search fs-4" name="search" type="search" placeholder="Rechercher via le nom, la classe ou la mythologie" aria-label="Search" value="<?php if (!empty($_GET['search'])) {
                                                                                                                                                                                            echo $_GET['search'];
                                                                                                                                                                                        }; ?>">
            <button class="btn btn-outline-success fs-2" type="submit">Recherche</button>
        </form>
    </header>
    <div class="bg-light table-responsive">
        <table class="table table-striped">
            <caption class="ms-5">Liste des dieux</caption>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Classe</th>
                    <th>Titre du dieu</th>
                    <th>Mythologie</th>
                    <th>Description du dieu</th>
                    <th class="text-center">Modifier</th>
                    <th class="text-center">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($aGods as $oGod) : ?>
                    <tr>
                        <td><?= intval($oGod->getId()) ?></td>
                        <td><?= htmlspecialchars($oGod->getName()) ?></td>
                        <td><?= htmlspecialchars($oGod->getClass_label()) ?></td>
                        <td><?= htmlspecialchars($oGod->getTitle()) ?></td>
                        <td><?= htmlspecialchars($oGod->getMythologie()) ?></td>
                        <td><?= substr(htmlspecialchars($oGod->getDescription()), 0, 30) ?>...</td>
                        <td class="text-center">
                            <a href="/edit?id=<?= intval($oGod->getId()) ?>" class="btn btn-info text-light" title="Editer l'article">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/delete?id=<?= intval($oGod->getId()) ?>" class="btn btn-danger confirm_delete" title="Supprimer l'article">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                    <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>