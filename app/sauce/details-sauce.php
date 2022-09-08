<?php

$sauce = [];

if (isset($_GET["id-sauce"]) && !empty($_GET["id-sauce"])) {

    $id = $_GET["id-sauce"];

    $sauce = recuperer_une_sauce_par_son_id($id);

    if (!isset($sauce) || empty($sauce)) {

        header('location: index.php?page=accueil&erreur=Sauce introuvable. Veuillez réesayé.');
    }
} else {

    header('location: index.php?page=accueil&erreur=Sauce introuvable. Veuillez réesayé.');
}



?>


<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">
                        <?= $sauce["titre"]; ?>
                    </h3>
                    <div class="col-12">
                        <img src="<?= $sauce["image"]; ?>" class="product-image" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">
                        <?= $sauce["titre"]; ?>
                    </h3>
                    <p>
                        <?= $sauce["description"]; ?>
                    </p>

                    <hr>

                    <?php

                    $id_utilisateur_connecte = "";

                    if (isset($_COOKIE["utilisateur_connecter"]) && !empty($_COOKIE["utilisateur_connecter"])) {

                        $utilisateur_connecter = json_decode($_COOKIE["utilisateur_connecter"], true);

                        if (isset($utilisateur_connecter["id"]) && !empty($utilisateur_connecter["id"])) {

                            $id_utilisateur_connecte = $utilisateur_connecter["id"];
                        }
                    }

                    if ($id_utilisateur_connecte == $sauce["id_user"]) {

                    ?>
                        <div class="mt-4">
                            <a href="index.php?page=modifier-sauce&id-sauce=<?= $sauce["id"]; ?>" class="btn btn-warning btn-lg btn-flat">
                                Modifier
                            </a>

                            <a class="btn btn-danger btn-lg btn-flat" data-toggle="modal" data-target="#modal-supprimer-sauce">
                                Supprimer
                            </a>
                        </div>

                    <?php

                    }

                    ?>

                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>


<div class="modal fade" id="modal-supprimer-sauce">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression d'une sauce</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes vous sur de vouloir supprimer cette sauce ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="#" type="button" class="btn btn-default" data-dismiss="modal">Non</a>
                <a href="index.php?page=supprimer-sauce&id-sauce=<?= $sauce['id']; ?>" type="button" class="btn btn-primary">Oui</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>