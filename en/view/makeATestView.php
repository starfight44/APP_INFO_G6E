<?php
ob_start(); ?>

    <section><h2>Make a test</h2></section>
    <section>
            <p align="center" class="warning"><strong>INSTRUCTIONS :</strong> Add up to 5 tests in the list below, click on a test to delete it <br> Adjust the different sensors on your body before running the test</p>
            <br><br>
        <div id="addTest">
            <form action="index.php?action=addTest" method="POST">

                <select name="id_sensor" id ="id_sensor">
                    <option value="1">Cardiac sensor</option>
                    <option value="2">Temperature sensor</option>
                    <option value="3">Visual stimulus</option>
                    <option value="4">Sound stimulus</option>
                    <option value="5">Sound recognition</option>
                </select>
                <input type="submit" id='submit' value='Add' >
            </form>
        </div>

        <div class="sensor">
            <?= $sensorsChoice ?>
        </div>

        <div class="button_center">
            <a href="index.php?action=executeTest"><input type="button" value="Execute the test"> </a>

        </div>
        </article>
    </section>
<?php  $content = ob_get_clean();


require('view/userSpaceView.php') ; ?>