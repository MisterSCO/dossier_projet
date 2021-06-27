<div class="container bg-light">
    <div class="m-5 row">
        <form action="./login" method="post">
            <fieldset>
                <h1>Se connecter</h1>
                <?= $message ?>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="email" class="form-label">Email</label>
                        <input value="l.lecomte77@gmail.com" type="email" name="email" id="email" class="form-control fs-4">
                    </div>
                    <div class="mb-3 col">
                        <label for="pass" class="form-label">Mot de passe</label>
                        <input value="123456" type="password" name="pass" id="pass" class="form-control fs-4">
                    </div>
                </div>
            </fieldset>
            <input class="btn btn-success fs-4 ms-4" type="submit" value="Envoyer">
        </form>
    </div>
</div>