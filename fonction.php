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