<?php

$donnees = array();

$erreurs = array();

if(isset($_COOKIE["donnee_utilisateur_inscription"]) && !empty($_COOKIE["donnee_utilisateur_inscription"])){

    $donnees = json_decode($_COOKIE["donnee_utilisateur_inscription"], true);

}

if(isset($_SESSION["erreurs_inscription"]) && !empty($_SESSION["erreurs_inscription"])){

    $erreurs = $_SESSION["erreurs_inscription"];

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

                <form action="index.php?page=inscription-traitement" method="POST">

                <div class="mb-3">
                        <label for="nom" class="form-label">Nom de famille:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nom" 
                            name="nom" 
                            value="<?php echo (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : "" ;?>"
                        />
                        <?php
                            if(isset($erreurs["nom"]) && !empty($erreurs["nom"])){
                                echo "<p class='text-danger'>". $erreurs["nom"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="prenom" 
                            name="prenom" 
                            value="<?php echo (isset($donnees["prenom"]) && !empty($donnees["prenom"])) ? $donnees["prenom"] : "" ;?>"
                        />
                        <?php
                            if(isset($erreurs["prenom"]) && !empty($erreurs["prenom"])){
                                echo "<p class='text-danger'>". $erreurs["prenom"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="nom_utilisateur" class="form-label">Nom utilisateur:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nom_utilisateur" 
                            name="nom_utilisateur" 
                            value="<?php echo (isset($donnees["nom_utilisateur"]) && !empty($donnees["nom_utilisateur"])) ? $donnees["nom_utilisateur"] : "" ;?>"
                        />
                        <?php
                            if(isset($erreurs["nom_utilisateur"]) && !empty($erreurs["nom_utilisateur"])){
                                echo "<p class='text-danger'>". $erreurs["nom_utilisateur"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3">

                        <label for="sexe" class="form-label">Sexe:</label>

                        <label for="sexe-m">
                            <input type="radio" class="" id="sexe-m" name="sexe" value="M" />
                            Masculin
                        </label>

                        <label for="sexe-f">
                            <input type="radio" class="" id="sexe-f" name="sexe" value="F" />
                            Féminin
                        </label>

                        <label for="sexe-a">
                            <input type="radio" class="" id="sexe-a" name="sexe" value="A"/>
                            Autre
                        </label>
                        <?php
                            if(isset($erreurs["sexe"]) && !empty($erreurs["sexe"])){
                                echo "<p class='text-danger'>". $erreurs["sexe"] . "</p>";
                            }
                        ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse mail:</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            value="<?php echo (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : "" ;?>"
                        />
                        <?php
                            if(isset($erreurs["email"]) && !empty($erreurs["email"])){
                                echo "<p class='text-danger'>". $erreurs["email"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="mot-de-passe" class="form-label">Mot de passe</label>
                        <input 
                        type="password" 
                        class="form-control" 
                        id="mot-de-passe" 
                        name="mot-de-passe"
                        value="<?php echo (isset($donnees["mot-de-passe"]) && !empty($donnees["mot-de-passe"])) ? $donnees["mot-de-passe"] : "" ;?>"
                    />
                        <?php
                            if(isset($erreurs["mot-de-passe"]) && !empty($erreurs["mot-de-passe"])){
                                echo "<p class='text-danger'>". $erreurs["mot-de-passe"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="confimer-mot-de-passe" class="form-label">Confirmer Mot de passe</label>
                        <input 
                        type="password" 
                        class="form-control" 
                        id="confimer-mot-de-passe" 
                        name="confimer-mot-de-passe"
                        value="<?php echo (isset($donnees["confimer-mot-de-passe"]) && !empty($donnees["confimer-mot-de-passe"])) ? $donnees["confimer-mot-de-passe"] : "" ;?>"
                    />
                        <?php
                            if(isset($erreurs["confimer-mot-de-passe"]) && !empty($erreurs["confimer-mot-de-passe"])){
                                echo "<p class='text-danger'>". $erreurs["confimer-mot-de-passe"] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms"/>
                        <label class="form-check-label" for="terms">J'accepte les termes et conditions du site</label>
                        <?php
                            if(isset($erreurs["terms"]) && !empty($erreurs["terms"])){
                                echo "<p class='text-danger'>". $erreurs["terms"] . "</p>";
                            }
                        ?>
                    </div>

                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>

                </form>

            </div>
            
            <div class="col-md-3"></div>

        </div>