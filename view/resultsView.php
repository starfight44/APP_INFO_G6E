<?php
ob_start(); ?>

    <section>
        <h2>Détails de vos résultats moyens sur tous vos test</h2>
        <article>
            <div id="results_container">
                <div class="result_data">
                    <h6>Fréquence cardiaque moyenne</h6>
                    <h5><?php if($averagecCardiacFrequency != 0) {
                            echo $averagecCardiacFrequency . ' Bpm';
                        }else{
                            echo 'X';
                        }?> </h5>
                </div>
                <div class="result_data">
                    <h6>Température moyenne</h6>
                    <h5><?php if($averageTemperture != 0) {
                            echo $averageTemperture . ' °C';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div class="result_data">
                    <h6>Stimulus visuel</h6>
                    <h5><?php if($averageVisualStimulus != 0) {
                            echo $averageVisualStimulus . ' ns';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div class="result_data">
                    <h6>Stimulus sonore</h6>
                    <h5><?php if($averageSoundStimulus != 0) {
                            echo $averageSoundStimulus . ' ns';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div id="large_weigth" class="result_data">
                    <h6>Reconnaissance sonore</h6>
                    <h5><?php if($averageMinFrequency != 0) {
                            echo $averageMinFrequency .' - '.$averageMaxFrequency. ' Hertz';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>

            </div>
        </article>
    </section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>