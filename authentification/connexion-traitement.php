<?php
session_start();

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

    setcookie(
        "utilisateur_connecter", 
        json_encode($donnee),
        [
            'expires' => time() + 365*24*3600,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
        ]
    );

    header("location: ../index.php");

}else{

 $_SESSION["erreurs_connexion"] = $erreurs;

 header("location: connexion.php");

}
