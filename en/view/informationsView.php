<?php
ob_start(); ?>

    <section>
        <article>

            <div id="results_container">
                <div class="result_data_small">
                    <h6>Pseudo</h6>
                    <h5><?= $donnees['Pseudo'] ?></h5>
                </div>
                <div class="result_data_small">
                    <h6>First name</h6>
                    <h5><?= $donnees['Prénom'] ?></h5>
                </div>
                <div class="result_data_small">
                    <h6>Last name</h6>
                    <h5><?= $donnees['Nom'] ?></h5>
                </div>
                <div class="result_data_small">
                    <h6>Sex</h6>
                    <h5><?= $donnees['Sexe'] ?></h5>
                </div>
                <div class="result_data_large">
                    <h6>Country</h6>
                    <h5><?= $donnees['Pays'] ?></h5>
                </div>

                <div class="result_data_large">
                    <h6>E-Mail</h6>
                    <h5><?= $donnees['Mail'] ?></h5>
                </div>

                <div class="result_data_small">
                    <h6>Heigth</h6>
                    <h5><?= $donnees['Taille'] ?> cm</h5>
                </div>
                <div class="result_data_small">
                    <h6>Weigth</h6>
                    <h5><?= $donnees['Poids'] ?> Kg</h5>
                </div>
                <div class="result_data_small_without_border">
                    <h6></h6>
                    <a href="index.php?action=modifyUserInformations"><h6>Modify my informations</h6></a>
                </div>

            </div>
        </article>
    </section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>