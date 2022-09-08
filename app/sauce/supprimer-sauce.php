<?php

$sauce = [];

if (isset($_GET["id-sauce"]) && !empty($_GET["id-sauce"])) {

    $id = $_GET["id-sauce"];

    $sauce = recuperer_une_sauce_par_son_id($id);

    if (!isset($sauce) || empty($sauce)) {

        header('location: index.php?page=accueil&erreur=Sauce introuvable. Veuillez réesayé.');
    } else {

        $id_utilisateur_connecte = "";

        if (isset($_COOKIE["utilisateur_connecter"]) && !empty($_COOKIE["utilisateur_connecter"])) {

            $utilisateur_connecter = json_decode($_COOKIE["utilisateur_connecter"], true);

            if (isset($utilisateur_connecter["id"]) && !empty($utilisateur_connecter["id"])) {

                $id_utilisateur_connecte = $utilisateur_connecter["id"];
            }
        }

        if ($id_utilisateur_connecte != $sauce["id_user"]) {

            header('location: index.php?page=accueil&erreur=Désolé vous n\'etes pas l\'auteur de cette sauce. Veuillez réesayé.');
        } else {

            $supprimer_sauce = supprimer_sauce($sauce["id"]);

            if ($supprimer_sauce) {

                header('location: index.php?page=accueil&success=Sauce supprimer.');
            } else {

                header('location: index.php?page=accueil&erreur=Oupss! Une erreur s\'est produite lors de la suppression de la sauce. Veuillez réesayé.');
            }
        }
    }
} else {

    header('location: index.php?page=accueil&erreur=Sauce introuvable. Veuillez réesayé.');
}
