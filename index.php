<?php

include 'fonction.php';

if(est_connecter()){

    echo "Voici ma page d'accueil avec la liste des sauces";

    echo "<a href='deconnexion.php'>Se déconecter</a>";

}else{

    header("location: authentification/connexion.php");

}

