<?php

/**
 * Mon router
 */
function router()
{

    if (isset($_GET["page"]) && !empty($_GET["page"])) {

        switch ($_GET["page"]) {

            case "accueil":
                include('accueil.php');
                break;

            case "ajouter-sauce":
                include('app/sauce/ajouter-sauce.php');
                break;

            case "contact":
                include('app/contact.php');
                break;

            case "connexion":
                include('app/authentification/connexion.php');
                break;

            case "connexion-traitement":
                include('app/authentification/connexion-traitement.php');
                break;

            case "inscription":
                include('app/authentification/inscription.php');
                break;

            case "inscription-traitement":
                include('app/authentification/inscription-traitement.php');
                break;

            case "deconnexion":
                include('app/authentification/deconnexion.php');
                break;
                    
            default:
                include('app/erreur/404.php');
                break;
        }
    } else {

        include('accueil.php');

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