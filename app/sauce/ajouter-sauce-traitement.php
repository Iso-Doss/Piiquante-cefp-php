<?php

$_SESSION["erreurs_ajout_sauce"] = [];

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

    $erreurs["image"] = "Une erreur s'est produite lors de l'envoi de l'image de la sauce. Veuillez réessayer";
}

setcookie(
    "donnee_ajout_sauce",
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

    if(isset($donnee_utilisateur_connecter["id"]) && !empty($donnee_utilisateur_connecter["id"])){
        
        $donnee["user_id"] = $donnee_utilisateur_connecter["id"];

    }

    $ajouter_sauce = ajouter_sauce($donnee["titre"],  $donnee["description"],  $donnee["image"],  $donnee["user_id"]);

    if($ajouter_sauce){

        header("location: index.php?page=accueil&success=Sauce ajouté avec succès");

    }else{

        header("location: index.php?page=ajouter-sauce&erreur=Oupss!!! Une erreure s'est produite lors de l'enregistrement de l'utilisateur. Veuillez réessayer ou contacter l'admin du site.");

    }

} else {

    $_SESSION["erreurs_ajout_sauce"] = $erreurs;

    header("location: index.php?page=ajouter-sauce");
}
