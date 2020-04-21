<?php
ob_start(); ?>


<section>
    <article>
        <div class="message">
    <?= $chatDatas ?>
        </div>

        <form action="index.php?action=#" method="POST">
            <textarea name="message" placeholder="Saisir un message"></textarea>
            <input type="submit" id='submit' value='Envoyer' >
        </form>
    </article>
</section>


<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>