
<nav class="m-2 ps-2" style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
    <ol class="breadcrumb mt-2">
        <li class="breadcrumb-item active text-warning ms-5">
            <?php if ($template !== 'admin') {
                echo '<a class="link-light" href="/admin">Liste des dieux</a>';
            } else {
                echo 'Liste des dieux';
            } ?>
        </li>
        <li class="breadcrumb-item active text-warning ms-5">
            <?php if ($template !== 'add') {
                echo '<a class="link-light" href="/add">Ajouter un dieu</a>';
            } else {
                echo 'Ajouter un dieu';
            } ?>
        </li>
    </ol>
</nav>