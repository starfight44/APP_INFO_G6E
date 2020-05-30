<?php
ob_start(); ?>

    <section><h2>Faire un test :</h2></section>
    <section>
            <p align="center" class="warning"><strong>INSTRUCTIONS :</strong> cliquez sur un test pour le supprimer<br>Ajoutez les tests dans l'ordre dans lesquels vous voulez les executer</p>
            <br><br>
        <div id="addTest">
            <form action="index.php?action=addTest" method="POST">

                <select name="id_sensor" id ="id_sensor">
                    <option value="1">Capteur cardiaque</option>
                    <option value="2">Capteur de température</option>
                    <option value="3">Stimulus visuel</option>
                    <option value="4">Stimulus sonore</option>
                    <option value="5">Reconnaissance vocale</option>
                </select>
                <input type="submit" id='submit' value='Ajouter' >
            </form>
        </div>

        <div class="sensor">
            <?= $sensorsChoice ?>
        </div>

        <div class="button_center" id="scroll">
            <a href="index.php?action=executeTest"><input type="button" value="Exécuter le test"> </a>

        </div>
        </article>
    </section>
<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>