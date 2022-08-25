<?php
$donnee = array();

if(isset($_COOKIE["donnee_utilisateur"]) && !empty($_COOKIE["donnee_utilisateur"])){

    $donnee = json_decode($_COOKIE["donnee_utilisateur"], true);

}

?>

<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

    <?php

                    if(isset($_GET["erreur"]) && !empty($_GET["erreur"])){

                        ?>

                            <div class="alert alert-danger" role="alert">

                                <?= $_GET["erreur"]; ?>
                                
                            </div>

                        <?php

                    }

                    if(isset($_GET["success"]) && !empty($_GET["success"])){

                        ?>

                            <div class="alert alert-success" role="alert">

                                <?= $_GET["success"]; ?>
                                
                            </div>

                        <?php

                    }

        ?>  

        <form action="index.php?page=connexion-traitement" method="POST">
            
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
