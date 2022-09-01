<?php
$donnee = array();

$erreurs = array();

if(isset($_COOKIE["donnee_utilisateur"]) && !empty($_COOKIE["donnee_utilisateur"])){

    $donnees = json_decode($_COOKIE["donnee_utilisateur"], true);

}

if(isset($_SESSION["erreurs_connexion"]) && !empty($_SESSION["erreurs_connexion"])){

    $erreurs = $_SESSION["erreurs_connexion"];

}

?>

<div class="card">
    <div class="card-body login-card-body">

        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

        <?php

        if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) {

        ?>

            <div class="alert alert-danger" role="alert">

                <?= $_GET["erreur"]; ?>

            </div>

        <?php

        }

        if (isset($_GET["success"]) && !empty($_GET["success"])) {

        ?>

            <div class="alert alert-success" role="alert">

                <?= $_GET["success"]; ?>

            </div>

        <?php

        }

        ?>

        <form action="index-authentification.php?page=connexion-traitement" method="post" novalidate>

            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Veuillez renseigné votre email" 
                value="<?php echo (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : "" ;?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["email"]) && !empty($erreurs["email"])) {
                    echo "<p class='text-danger'>" . $erreurs["email"] . "</p>";
                }
                ?>
            </p>

            <div class="input-group">
                <input type="password" name="mot-de-passe" class="form-control" placeholder="Veuillez renseigné votre mot de passe"
                value="<?php echo (isset($donnees["mot-de-passe"]) && !empty($donnees["mot-de-passe"])) ? $donnees["mot-de-passe"] : "" ;?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["mot-de-passe"]) && !empty($erreurs["mot-de-passe"])) {
                    echo "<p class='text-danger'>" . $erreurs["mot-de-passe"] . "</p>";
                }
                ?>
            </p>

            <div class="row">
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="se-souvenir-de-moi" value="1">
                        <label for="remember">
                            Rappel
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            <a href="#">Mot de passe oublié</a>
        </p>
        <p class="mb-0">
            <a href="index-authentification.php?page=inscription" class="text-center">S'inscrire</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>