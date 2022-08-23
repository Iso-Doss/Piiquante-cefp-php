<?php

session_start();

$_SESSION["erreurs_inscription"] = [];

include ("../fonction.php");

$donnees = [];

$erreurs = [];

if(isset($_POST["nom"]) && !empty($_POST["nom"])){

    $donnees["nom"] = $_POST["nom"];

}else{

    $erreurs["nom"] = "Le champ Nom est vide. Veuillez le renseigné.";

}

if(isset($_POST["prenom"]) && !empty($_POST["prenom"])){

    $donnees["prenom"] = $_POST["prenom"];

}else{

    $erreurs["prenom"] = "Le champ Prénom est vide. Veuillez le renseigné.";

}

if(isset($_POST["nom_utilisateur"]) && !empty($_POST["nom_utilisateur"])){

    $donnees["nom_utilisateur"] = $_POST["nom_utilisateur"];

}else{

    $erreurs["nom_utilisateur"] = "Le champ Nom d'utilisateur est vide. Veuillez le renseigné.";

}

if(isset($_POST["sexe"]) && !empty($_POST["sexe"])){

    $donnees["sexe"] = $_POST["sexe"];

    if("F" != $_POST["sexe"] && "M" != $_POST["sexe"] && "A" != $_POST["sexe"]){

        $erreurs["sexe"] = "Le champ Sexe a une valeur incorrect. Veuillez le renseigné.";

    }


}else{

    $erreurs["sexe"] = "Le champ Sexe est vide. Veuillez le renseigné.";

}

if(isset($_POST["email"]) && !empty($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))){
    
    $donnees["email"] = $_POST["email"];

}else{

    $erreurs["email"] = "le champ adresse email est incorrect. Veuillez le renseigné.";
    
}

if(isset($_POST["mot-de-passe"]) && !empty($_POST["mot-de-passe"])){
    
    $donnees["mot-de-passe"] = $_POST["mot-de-passe"];

}else{

    $erreurs["mot-de-passe"] = "Le champ mot de passe est vide ou incorrect. Veuillez le renseigné";
    
}

if(isset($_POST["confimer-mot-de-passe"]) && !empty($_POST["confimer-mot-de-passe"])){
    
    $donnees["confimer-mot-de-passe"] = $_POST["confimer-mot-de-passe"];

}else{

    $erreurs["confimer-mot-de-passe"] = "Le champ de confirmation du mot de passe est vide ou incorrect. Veuillez le renseigné";
    
}

if(isset($_POST["terms"]) && !empty($_POST["terms"])){
    
    $donnees["terms"] = $_POST["terms"];

}else{

    $erreurs["terms"] = "Le champ de termes et condition du site n'est pas accepter. Veuillez coché cette case s'il vous plait.";
    
}

if($_POST["mot-de-passe"] != $_POST["confimer-mot-de-passe"]){

    $erreurs["confimer-mot-de-passe"] .= "Les mots de passe ne sont pas identiques. Veuillez renseigés des mots de passes identiques.";

}

setcookie(
    "donnee_utilisateur_inscription", 
    json_encode($donnees),
    [
        'expires' => time() + 365*24*3600,
        'path' => '/',
        'secure' => true,
        'httponly' => true,
    ]
);


if(empty($erreurs)){

    $bd =  connexion_base_de_donnee();

    if(is_object($bd)){

        //On a reussire a se connecter a la base de donner

        echo sha1("toto");

        // Ecriture de la requête
        $requette_insertion = 'INSERT INTO utilisateur(nom, prenom, sexe, email, mot_de_passe, nom_utilisateur) VALUES (:nom, :prenom, :sexe, :email, :mot_de_passe, :nom_utilisateur)';

        // Préparation
        $preparation_requette_insertion = $bd->prepare($requette_insertion);

        // Exécution ! La recette est maintenant en base de données
        $resultat = $preparation_requette_insertion->execute([
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'sexe' => $_POST["sexe"],
            'email' => $_POST["email"],
            'mot_de_passe' => sha1($_POST["mot-de-passe"]),
            'nom_utilisateur' => $_POST["nom_utilisateur"]
        ]);

        if($resultat){

            header("location: inscription.php?success=Inscription éffectué avec succèss. Veuillez vous connecté.");

        }else{

            header("location: inscription.php?erreur=Oupss!!! Une erreure s'est produite lors de l'enregistrement de l'utilisateur. Veuillez réessayer ou contacter l'admin du site.");

        }

        

    }else{

        header("location: inscription.php?erreur=" . $bd);

    }


}else{

    $_SESSION["erreurs_inscription"] = $erreurs;

    header("location: inscription.php");

}
