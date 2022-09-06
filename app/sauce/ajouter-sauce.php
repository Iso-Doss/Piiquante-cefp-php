<?php
$donnee = array();

$erreurs = array();

if (isset($_COOKIE["donnee_ajout_sauce"]) && !empty($_COOKIE["donnee_ajout_sauce"])) {

    $donnees = json_decode($_COOKIE["donnee_ajout_sauce"], true);
}

if (isset($_SESSION["erreurs_ajout_sauce"]) && !empty($_SESSION["erreurs_ajout_sauce"])) {

    $erreurs = $_SESSION["erreurs_ajout_sauce"];
}

?>

<div class="card">
    <div class="card-body login-card-body">

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


        <div class="row">

            <div class="col"></div>

            <div class="col-8">


                <form action="index.php?page=ajouter-sauce-traitement" method="post" novalidate enctype="multipart/form-data">

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un sauce</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="titre-sauce">Titre de la sauce</label>
                                    <input type="text" class="form-control" name="titre" id="titre-sauce" placeholder="Veuillez entrer le titre de la sauce" value="<?php echo (isset($donnees["titre"]) && !empty($donnees["titre"])) ? $donnees["titre"] : ""; ?>">
                                    <p class="text-danger">
                                        <?php
                                        if (isset($erreurs["titre"]) && !empty($erreurs["titre"])) {
                                            echo "<p class='text-danger'>" . $erreurs["titre"] . "</p>";
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="description-sauce">Description de la sauce</label>
                                    <textarea class="form-control" rows="3" name="description" id="description-sauce" placeholder="Veuillez entrer la description de la sauce"><?php echo (isset($donnees["description"]) && !empty($donnees["description"])) ? $donnees["description"] : ""; ?></textarea>
                                    <p class="text-danger">
                                        <?php
                                        if (isset($erreurs["description"]) && !empty($erreurs["description"])) {
                                            echo "<p class='text-danger'>" . $erreurs["description"] . "</p>";
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="image-sauce">Image de la sauce</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image-sauce">
                                        <label class="custom-file-label" for="image-sauce">Sélectionner une image</label>
                                    </div>
                                    <p class="text-danger">
                                        <?php
                                        if (isset($erreurs["image"]) && !empty($erreurs["image"])) {
                                            echo "<p class='text-danger'>" . $erreurs["image"] . "</p>";
                                        }
                                        ?>
                                    </p>
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Ajouter">
                                <input type="reset" class="btn btn-danger" value="Annuler">
                            </div>
                        </form>
                    </div>

                </form>

            </div>

            <div class="col"></div>

        </div>

    </div>
    <!-- /.login-card-body -->
</div>