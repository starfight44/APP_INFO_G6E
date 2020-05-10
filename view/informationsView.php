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
                    <h6>Prénom</h6>
                    <h5><?= $donnees['Prénom'] ?></h5>
                </div>
                <div class="result_data_small">
                    <h6>Nom</h6>
                    <h5><?= $donnees['Nom'] ?></h5>
                </div>
                <div class="result_data_small">
                    <h6>Sexe</h6>
                    <h5><?= $donnees['Sexe'] ?></h5>
                </div>
                <div class="result_data_large">
                    <h6>Pays</h6>
                    <h5><?= $donnees['Pays'] ?></h5>
                </div>

                <div class="result_data_large">
                    <h6>E-Mail</h6>
                    <h5><?= $donnees['Mail'] ?></h5>
                </div>

                <div class="result_data_small">
                    <h6>Taille</h6>
                    <h5><?= $donnees['Taille'] ?> cm</h5>
                </div>
                <div class="result_data_small">
                    <h6>Poids</h6>
                    <h5><?= $donnees['Poids'] ?> Kg</h5>
                </div>

            </div>
            <a href="index.php?action=modifyUserInformations"><input type="button" value="Modifier mes informations"> </a>
        </article>
    </section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>