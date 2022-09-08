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
        }
    }
} else {

    header('location: index.php?page=accueil&erreur=Sauce introuvable. Veuillez réesayé.');
}

$_SESSION["erreurs_modification_sauce"] = [];

$donnee = array();

$erreurs = array();

if (isset($_POST["titre"]) && !empty($_POST["titre"])) {

    $donnee["titre"] = $_POST["titre"];
} else {

    $erreurs["titre"] = "Le titre de la sauce est incorrect. Veuillez réessayer";
}

if (isset($_POST["description"]) && !empty($_POST["description"])) {

    $donnee["description"] = $_POST["description"];
} else {

    $erreurs["description"] = "La description de la sauce est incorrect. Veuillez réessayer";
}

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

    if ($_FILES["image"]["size"] <= 3000000) {

        $nom_ficher = $_FILES["image"]["name"];

        $informations_fichier = pathinfo($nom_ficher);

        $extension_fichier = $informations_fichier["extension"];

        $extensions_autoriser = array("png", "jpg", "jpeg", "gif");

        $mon_fichier_est_autoriser = in_array($extension_fichier, $extensions_autoriser);

        if ($mon_fichier_est_autoriser) {

            $dossier_upload = 'uploads';

            if (!is_dir($dossier_upload)) {

                mkdir($dossier_upload);
            }

            $deplacement = move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));

            $donnee["image"] = 'uploads/' . basename($_FILES['image']['name']);
        } else {

            $erreurs["image"] = "L'image de la sauce a une extension non autorisé. Veuillez réessayer";
        }
    } else {

        $erreurs["image"] = "L'image de la sauce est trop lourd. Veuillez réessayer";
    }
} else {

    $donnee["image"] = $sauce['image'];
}

//$donnee = array_merge($sauce, $donnee);

$donnee["id"] = $sauce["id"];

$donnee["id_user"] = $sauce["id_user"];

setcookie(
    "donnee_modification_sauce",
    json_encode($donnee),
    [
        'expires' => time() + 365 * 24 * 3600,
        'path' => '/',
        'secure' => true,
        'httponly' => true,
    ]
);

if (empty($erreurs)) {

    $donnee_utilisateur_connecter = json_decode($_COOKIE["utilisateur_connecter"], true);

    $donnee["user_id"] = "";

    if (isset($donnee_utilisateur_connecter["id"]) && !empty($donnee_utilisateur_connecter["id"])) {

        $donnee["user_id"] = $donnee_utilisateur_connecter["id"];
    }

    $modifier_sauce = modifier_sauce($sauce["id"], $donnee["titre"],  $donnee["description"],  $donnee["image"]);

    if ($modifier_sauce) {

        header("location: index.php?page=accueil&success=Sauce modifié avec succès");
    } else {

        header("location: index.php?page=modifier-sauce&id-sauce=" . $sauce['id'] .  "&erreur=Oupss!!! Une erreure s'est produite lors de la modification de la sauce. Veuillez réessayer ou contacter l'admin du site.");
    }
} else {

    $_SESSION["erreurs_modification_sauce"] = $erreurs;

    header("location: index.php?page=ajouter-sauce");
}
