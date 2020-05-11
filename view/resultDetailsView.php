<?php
ob_start(); ?>

    <section>
        <a href="index.php?action=userHistory"><input type="button" value="Historique des test"></a>
        <article>
            <h2><?= $title ?></h2>
            <article>
                <div id="results_container">
                    <div class="result_data">
                        <h6>Fréquence cardiaque</h6>
                        <h5><?php if(isset($cardiac_frequency)) {
                                echo $cardiac_frequency . 'Bpm';
                             }else{
                                 echo 'X';
                            }?></h5>
                    </div>
                    <div class="result_data">
                        <h6>Température</h6>
                        <h5><?php if(isset($temperature)) {
                                echo $temperature . '°C';
                            }else{
                                echo 'X';
                            }?> </h5>
                    </div>
                    <div class="result_data">
                        <h6>Réaction à un stimulus visuel</h6>
                        <h5><?php if(isset($visual_stimulus)) {
                                echo $visual_stimulus . 'ns';
                            }else{
                                echo 'X';
                            }?></h5>
                    </div>
                    <div class="result_data">
                        <h6>Réaction à un stimulus sonore</h6>
                        <h5><?php if(isset($sound_stimulus)) {
                                echo $sound_stimulus . 'ns';
                            }else{
                                echo 'X';
                            }?></h5>
                    </div>
                    <div id="large_weigth" class="result_data">
                        <h6>Intervalle de reconnaissance sonore</h6>
                        <h5><?php if(isset($min_frequency_recognition)) {
                                echo $min_frequency_recognition .' - '.$max_frequency_recognition. ' Hertz';
                            }else{
                                echo 'X';
                            }?></h5>
                    </div>

                </div>

        </article>
    </section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?><?php
