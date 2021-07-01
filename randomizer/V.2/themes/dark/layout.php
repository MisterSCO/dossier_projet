<!doctype HTML>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?= $title ?> Smite Random Build</title>
    <meta name="description" content="<?= $descrip ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<?= $theme_default . "icon/smite_lightning.png" ?>">

    <link rel="stylesheet" href="<?= $theme_default . "css/main.min.css" ?>">

</head>


<body>
    <header class="header">
        <a class="logo" href="./">Smite Random Build</a>
        <nav class="nav">
            <?php if (!empty($_SESSION)) : ?>
                <a href="/admin">Administration</a>
                <a href="/logout">Déconnexion</a>
            <?php endif ?>
        </nav>
        </div>
    </header>
    <main class="main">
        <?php include  $template . '.php' ?>
    </main>
    <footer class="footer">
        <p>Projet réalisé par - &copy; <a href="https://www.linkedin.com/in/lecomte-loic/" class="text-light" target="_blank">Loïc LECOMTE</a></p>
        <p>Nous remercions les auteurs des images présentées sur ce site, récoltées sur
            <a href="https://www.smitegame.com" target="_blank">Smite</a>
        </p>

    </footer>

    <script src="<?= $theme_default . "js/main.js" ?>"></script>

</body>

</html>