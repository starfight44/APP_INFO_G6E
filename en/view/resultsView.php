<?php
ob_start(); ?>

    <section>
        <h2>Details of your average results on all your tests</h2>
        <article>
            <div id="results_container">
                <div class="result_data">
                    <h6>Average heart rate</h6>
                    <h5><?php if($averagecCardiacFrequency != 0) {
                            echo $averagecCardiacFrequency . ' Bpm';
                        }else{
                            echo 'X';
                        }?> </h5>
                </div>
                <div class="result_data">
                    <h6>Mean temperature</h6>
                    <h5><?php if($averageTemperture != 0) {
                            echo $averageTemperture . ' °C';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div class="result_data">
                    <h6>Visual stimulus</h6>
                    <h5><?php if($averageVisualStimulus != 0) {
                            echo $averageVisualStimulus . ' ns';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div class="result_data">
                    <h6>Sound stimulus</h6>
                    <h5><?php if($averageSoundStimulus != 0) {
                            echo $averageSoundStimulus . ' ns';
                        }else{
                            echo 'X';
                        }?></h5>
                </div>
                <div id="large_weigth" class="result_data">
                    <h6>Sound recognition</h6>
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