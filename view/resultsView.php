<?php
ob_start(); ?>

    <section>
        <h2>Détails de vos résultats moyens sur tous vos test</h2>
        <article>
            <div id="results_container">
                <div class="result_data">
                    <h6>Fréquence cardiaque moyenne</h6>
                    <h5><?= $averagecCardiacFrequency ?> Bpm</h5>
                </div>
                <div class="result_data">
                    <h6>Température moyenne</h6>
                    <h5><?= $averageTemperture ?> °C</h5>
                </div>
                <div class="result_data">
                    <h6>Stimulus visuel</h6>
                    <h5><?= $averageVisualStimulus ?> ns</h5>
                </div>
                <div class="result_data">
                    <h6>Stimulus sonore</h6>
                    <h5><?= $averageSoundStimulus ?> ns</h5>
                </div>
                <div id="large_weigth" class="result_data">
                    <h6>Reconnaissance sonore</h6>
                    <h5><?= $averageMinFrequency ?> - <?= $averageMaxFrequency ?> Hertz</h5>
                </div>

            </div>
        </article>
    </section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>