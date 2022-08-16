<?php
include '../fonction.php';

if(est_connecter()){

    header("location: ../index.php");

}

$donnee = array();

if(isset($_COOKIE["donnee_utilisateur"]) && !empty($_COOKIE["donnee_utilisateur"])){

    $donnee = json_decode($_COOKIE["donnee_utilisateur"], true);

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Connexion | Piiquante</title>
</head>
<body>
    <?php include '../header.php' ?>

    <div class="container">

        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6">

                <form action="connexion-traitement.php" method="POST">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse mail:</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            aria-describedby="emailHelp"
                            value="<?php echo (isset($donnee["email"]) && !empty($donnee["email"])) ? $donnee["email"] : "" ;?>"
                        />
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label for="mot-de-passe" class="form-label">Mot de passe</label>
                        <input 
                        type="password" 
                        class="form-control" 
                        id="mot-de-passe" 
                        name="mot-de-passe"
                        value="<?php echo (isset($donnee["mot-de-passe"]) && !empty($donnee["mot-de-passe"])) ? $donnee["mot-de-passe"] : "" ;?>"
                    />
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="se-souvenir-de-moi" name="se-souvenir-de-moi"/>
                        <label class="form-check-label" for="se-souvenir-de-moi">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Se connecter</button>

                </form>

            </div>
            
            <div class="col-md-3"></div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>