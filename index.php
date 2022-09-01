<?php

session_start();

include('app/fonction.php');

?>


<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PIIQUANTE</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="public/css/styles.css">

</head>

<body class="hold-transition sidebar-collapse layout-top-nav">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <span class="brand-text font-weight-light">Piiquante</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php?page=accueil" class="nav-link">Sauces</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=ajouter-sauce" class="nav-link">Ajouter sauce</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=contact" class="nav-link">Contact</a>
                        </li>
                    </ul>

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php

                    if (est_connecter()) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=deconnexion" role="button">
                                Déconnexion
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index-authentification.php?page=connexion" role="button">
                                Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-authentification.php?page=inscription" role="button">
                                Inscription
                            </a>
                        </li>
                    <?php
                    }

                    ?>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <?php

        router();

        //include('accueil.php');

        ?>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Consulter des recettes de sauces piquantes
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a href="#">Piquante</a>.</strong> Tous les droits réservés.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/js/demo.js"></script>
</body>

</html>