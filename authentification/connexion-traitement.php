<?php

$donnee = array();

$erreurs = array();

if(isset($_POST["email"]) && !empty($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))){
    
    $donnee["email"] = $_POST["email"];

}else{

    $erreurs["email"] = "L'adresse email est incorrect. Veuillez réessayer";
    
}

if(isset($_POST["mot-de-passe"]) && !empty($_POST["mot-de-passe"])){
    
    $donnee["mot-de-passe"] = $_POST["mot-de-passe"];

}else{

    $erreurs["mot-de-passe"] = "Le mot de passe est incorrect. Veuillez réessayer";
    
}

if(isset($_POST["se-souvenir-de-moi"]) && !empty($_POST["se-souvenir-de-moi"])){

    setcookie(
        "donnee_utilisateur", 
        json_encode($donnee),
        [
            'expires' => time() + 365*24*3600,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
        ]
    );

}

if(empty($erreurs)){

    $bd = connexion_base_de_donnee();

    // Ecriture de la requête
    $requette_recuperation = "SELECT id, nom, prenom, email, sexe FROM utilisateur WHERE email=:email and mot_de_passe=:mot_de_passe";

    // Préparation
    $preparation_requette_recuperation = $bd->prepare($requette_recuperation);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette_recuperation->execute([
        'email' => $_POST["email"],
        'mot_de_passe' => sha1($_POST["mot-de-passe"]),
    ]);


    if($resultat){

        $utilisateur_connecter = $preparation_requette_recuperation->fetch(PDO::FETCH_ASSOC);

        if(isset($utilisateur_connecter) && !empty($utilisateur_connecter) && is_array($utilisateur_connecter)){

            setcookie(
                "utilisateur_connecter", 
                json_encode($utilisateur_connecter),
                [
                    'expires' => time() + 365*24*3600,
                    'path' => '/',
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            header("location: index.php?page=acceuil");

        }else{

            header("location: index.php?page=connexion&erreur=Identifiant incorrect. Veuillez réessayer.");
            
        }


    }else{

        header("location: index.php?page=connexion&erreur=Oups!!! Une erreur s'est produite lors de la verification de l'utilisateur.");

    }

}else{

 $_SESSION["erreurs_connexion"] = $erreurs;

 header("location: index.php?page=connexion");

}
