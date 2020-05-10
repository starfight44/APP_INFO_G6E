<?php
ob_start(); ?>


<section>
    <article>
<div id="results_container">
    <div id="cardiac" class="result_data">
        <h6>Fréquence cardiaque moyenne</h6>
        <h5>150 Bpm</h5>
    </div>
    <div id="temp" class="result_data">
        <h6>Température moyenne</h6>
        <h5>37,5 °C</h5>
    </div>
    <div id="visualStimulus" class="result_data">
        <h6>Stimulus visuel</h6>
        <h5>100 ns</h5>
    </div>
    <div id="soundStimulus" class="result_data">
        <h6>Stimulus sonore</h6>
        <h5>150 ns</h5>
    </div>
    <div id="soundRec" class="result_data">
        <h6>Reconnaissance sonore</h6>
        <h5>20 - 20 000 Hertz</h5>
    </div>

</div></article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>