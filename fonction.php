<?php

function router(){

    if(isset($_GET["page"]) && !empty($_GET["page"])){

        switch($_GET["page"]){

            case "connexion":
                if(!est_connecter()){
                    include "authentification/connexion.php";
                }else{
                    include "acceuil.php";
                }
                break;

            case "connexion-traitement":
                if(!est_connecter()){
                    include "authentification/connexion-traitement.php";
                }else{
                    include "acceuil.php";
                }
                break;

            case "inscription":
                if(!est_connecter()){
                    include "authentification/inscription.php";
                }else{
                    include "acceuil.php";
                }
                break;

            case "inscription-traitement":
                if(!est_connecter()){
                    include "authentification/inscription-traitement.php";
                }else{
                    include "acceuil.php";
                }
                break;

            case "acceuil":
                if(!est_connecter()){
                    include "authentification/connexion.php";
                }else{
                    include "acceuil.php";
                }
                break;

            case "ajouter-sauce":
                if(!est_connecter()){
                    include "authentification/connexion.php";
                }else{
                    include "ajouter-sauce.php";
                }
                break;

                case "deconnexion":
                    include "authentification/deconnexion.php";
                    break;

            default:
                include "404.php";
                break;

        }

    } else {
        include "404.php";
    }

}


function est_connecter(): bool
{

    $est_connecter = false;

    if(isset($_COOKIE["utilisateur_connecter"]) && !empty($_COOKIE["utilisateur_connecter"])){

        $est_connecter = true;

    }

    return $est_connecter;

}

function se_deconnecter()
{
    setcookie(
        "utilisateur_connecter",
         "",
        [
        'expires' => time(),
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        ]
    );
}

function connexion_base_de_donnee(){

    $bd = "";

    try
    {
        $bd = new PDO('mysql:host=localhost;dbname=piiquante;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        $bd = "Une erreur s'est produite lors de la connexion a la base de donnée.";
    }

    return $bd;
}

function verifier_un_utilisateur_via_un_email($email){

    $utilisateur_existe = false;

    $bd = connexion_base_de_donnee();

    $requette = "SELECT * FROM utilisateur WHERE email=:email";

    $preparation_requette = $bd->prepare($requette);

    $execution_requette = $preparation_requette->execute(['email' => $email]);

    if($execution_requette){

        $donnees = $preparation_requette->fetchAll(PDO::FETCH_ASSOC);

        if(isset($donnees) && !empty($donnees) && is_array($donnees)){

            $utilisateur_existe = true;

        }
    }

    return $utilisateur_existe;

}

function verifier_un_utilisateur_via_un_nom_utilisateur($nom_utilisateur){

    $utilisateur_existe = false;

    $bd = connexion_base_de_donnee();

    $requette = "SELECT * FROM utilisateur WHERE nom_utilisateur=:nom_utilisateur";

    $preparation_requette = $bd->prepare($requette);

    $execution_requette = $preparation_requette->execute(['nom_utilisateur' => $nom_utilisateur]);

    if($execution_requette){

        $donnees = $preparation_requette->fetchAll(PDO::FETCH_ASSOC);

        if(isset($donnees) && !empty($donnees) && is_array($donnees)){

            $utilisateur_existe = true;

        }
    }

    return $utilisateur_existe;

}