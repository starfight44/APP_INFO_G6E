<?php
ob_start(); ?>

    <section><h2>Faire un test :</h2></section>
    <section>
            <p align="center" class="warning"><strong>INSTRUCTIONS :</strong> cliquez sur un test pour le supprimer</p>
            <br><br>
        <div id="addTest">
            <form action="index.php?action=addTest" method="POST">

                <select name="test">
                    <option value="1">Capteur cardiaque</option>
                    <option value="2">Capteur de température</option>
                    <option value="3">Stimulus visuel</option>
                    <option value="4">Stimulus sonore</option>
                    <option value="5">Reconnaissance vocale</option>
                </select>
                <input type="submit" id='submit' value='Ajouter' >
            </form>
        </div>

            <?= $sensorsChoice ?>


            <a href=""><input type="button" value="Exécuter le test"> </a>
        </article>
    </section>
<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>