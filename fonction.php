<?php


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