<nav class="navbar navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">
    PIIQUANTE
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
            if(est_connecter()){

              ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php?page=acceuil">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=ajouter-sauce">Ajouter une sauce</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=deconnexion">Deconnexion</a>
                </li>

              <?php

            }else{

              ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php?page=connexion">Connexion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=inscription">Inscription</a>
                </li>

              <?php

            }
          ?>
      </ul>
    </div>
</div>

</nav>