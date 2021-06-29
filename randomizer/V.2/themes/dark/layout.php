<!doctype HTML>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $descrip ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<?= $theme_default . "icon/smite_lightning.png" ?>">

    <link rel="stylesheet" href="<?= $theme_default . "css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?= $theme_default . "css/main.min.css" ?>">

</head>


<body class="min-vh-100 d-flex flex-column">
    <header class="navbar navbar-expand-sm navbar-dark bg-dark px-4">
        <a class="navbar-brand fs-2 p-3" href="./">Smite Random Build</a>
        <?php if (!empty($_SESSION)) : ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Ouvrir ou fermer le menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        <?php endif ?>
        <div id="menu" class="collapse navbar-collapse ms-auto w-auto">

            <nav class="navbar-nav ms-auto">
                <?php if (!empty($_SESSION)) : ?>
                    <a class="nav-link" href="/admin">Administration</a>
                    <a class="nav-link text-danger" href="/logout">Déconnexion</a>
                <?php endif ?>
            </nav>
        </div>
    </header>
    <main class="container-fluid d-flex flex-column pb-5 main">

        <?php if ($template !== 'homepage' && $template !== '404' && $template !== 'login_admin') {
            include $theme_default . 'nav_admin.php';
        } ?>
        <?php include  $template . '.php' ?>
        <div id="curseur" class="infobulle"></div>
    </main>
    <footer class="p-3 mt-auto mb-0 position-relative text-center bg-dark">
        <p class="m-0 text-light">Projet réalisé par - &copy;
            <a href="https://www.linkedin.com/in/lecomte-loic/" class="text-light" target="_blank">Loïc LECOMTE</a>
        </p>
        <p class="m-0 text-light">Nous remercions les auteurs des images présentées sur ce site, récoltées sur
            <a class="text-light" href="https://www.smitegame.com" target="_blank">Smite</a>
        </p>

    </footer>

    <script src="<?= $theme_default . "js/main.js" ?>"></script>
    <script src="<?= $theme_default . "js/popper.min.js" ?>"></script>
    <script src="<?= $theme_default . "js/bootstrap.min.js" ?>"></script>

</body>

</html>