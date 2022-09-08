<?php


$sauce_page = 1;

if (isset($_GET["sauce_page"]) && !empty($_GET["sauce_page"])) {
    $sauce_page = $_GET["sauce_page"];
}

$sauces = liste_sauce($sauce_page);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Page d'accueil</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <?php

            if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) {

            ?>

                <div class="alert alert-danger" role="alert">

                    <?= $_GET["erreur"]; ?>

                </div>

            <?php

            }

            if (isset($_GET["success"]) && !empty($_GET["success"])) {

            ?>

                <div class="alert alert-success" role="alert">

                    <?= $_GET["success"]; ?>

                </div>

            <?php

            }

            ?>

            <div class="row">

                <?php

                if (isset($sauces) && !empty($sauces)) {

                    foreach ($sauces as $key => $sauce) {

                ?>

                        <div class="col-md-3">
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-white">

                                    <img class="img-fluid" src="<?= $sauce["image"]; ?>" alt="User Avatar">

                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="index.php?page=details-sauce&id-sauce=<?= $sauce["id"]; ?>" class="nav-link">
                                                <?= $sauce["titre"]; ?>
                                                <span class="float-right badge bg-white">
                                                    31
                                                    <i class="fas fa-heart"></i>
                                                </span>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php

                    }

                    ?>

            </div>

            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous" id="example2_previous">

                            <a href="index.php?page=accueil&sauce_page=<?= ($sauce_page - 1 <= 0) ? 1 : $sauce_page - 1; ?>" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Précédent</a>

                        </li>

                        <li class="paginate_button page-item active">

                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">

                                <?= $sauce_page; ?>

                            </a>

                        </li>

                        <li class="paginate_button page-item next" id="example2_next">

                            <a href="index.php?page=accueil&sauce_page=<?= $sauce_page + 1; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Suivant</a>

                        </li>
                    </ul>
                </div>
            </div>

        <?php


                } else {

                    echo "<p>Aucune sauce n'est disponible pour le moment.</p>";
                }

        ?>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->