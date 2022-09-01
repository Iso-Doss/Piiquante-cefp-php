<?php
$donnee = array();

$erreurs = array();

if (isset($_COOKIE["donnee_utilisateur_inscription"]) && !empty($_COOKIE["donnee_utilisateur_inscription"])) {

    $donnees = json_decode($_COOKIE["donnee_utilisateur_inscription"], true);
}

if (isset($_SESSION["erreurs_inscription"]) && !empty($_SESSION["erreurs_inscription"])) {

    $erreurs = $_SESSION["erreurs_inscription"];
}

?>
<div class="card">
    <div class="card-body register-card-body">

        <p class="login-box-msg">Enregistrez un nouveau membre</p>

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

        <form action="index-authentification.php?page=inscription-traitement" method="post" novalidate>

            <div class="input-group">
                <input type="text" name="nom" class="form-control" placeholder="Veuillez entrer votre nom">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {

                    echo "<p class='text-danger'>" . $erreurs["nom"] . "</p>";
                }
                ?>
            </p>

            <div class="input-group mb-3">
                <input type="text" name="prenom" class="form-control" placeholder="Veuillez entrer votre prénom">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) {

                    echo "<p class='text-danger'>" . $erreurs["prenom"] . "</p>";
                }
                ?>
            </p>

            <div class="input-group mb-3">
                <input type="text" name="nom_utilisateur" class="form-control" placeholder="Veuillez entrer votre nom d'utilisateur">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["nom_utilisateur"]) && !empty($erreurs["nom_utilisateur"])) {

                    echo "<p class='text-danger'>" . $erreurs["nom_utilisateur"] . "</p>";
                }
                ?>
            </p>

            <label class="col-form-label" for="inputError">Sexe</label>
            <div class="input-group">
                <div class="form-group">
                    <div class="form-check">
                        <input id="sexe-f" class="form-check-input" type="radio" name="sexe" value="F" checked="">
                        <label for="sexe-f" class="form-check-label">Féminin</label>
                    </div>
                    <div class="form-check">
                        <input id="sexe-m" class="form-check-input" type="radio" name="sexe" value="M">
                        <label for="sexe-m" class="form-check-label">Masculin</label>
                    </div>
                    <div class="form-check">
                        <input id="sexe-a" class="form-check-input" type="radio" name="sexe" value="A">
                        <label for="sexe-a" class="form-check-label">Autre</label>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Veuillez entrer votre email">
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

            <div class="input-group mb-3">
                <input type="password" name="mot-de-passe" class="form-control" placeholder="Veuillez entrer votre mot de passe">
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

            <div class="input-group mb-3">
                <input type="password" name="confimer-mot-de-passe" class="form-control" placeholder="Veuillez entrer votre la confirmation de votre mot de passe">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger mb-3">
                <?php
                if (isset($erreurs["confimer-mot-de-passe"]) && !empty($erreurs["confimer-mot-de-passe"])) {

                    echo "<p class='text-danger'>" . $erreurs["confimer-mot-de-passe"] . "</p>";
                }
                ?>
            </p>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            J'accepte les <a href="#">termes</a> et <a href="#">conditions</a>.
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="index-authentification.php?page=connexion" class="text-center">J'ai déja un compte</a>
    </div>
    <!-- /.form-box -->
</div>