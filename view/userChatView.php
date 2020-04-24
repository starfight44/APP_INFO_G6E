<?php
ob_start(); ?>

<section>
    <article>
        <form action="index.php?action=newUserMessage" method="POST">
            <textarea name="message" placeholder="Saisir un message"></textarea>
            <input type="submit" id='submit' value='Envoyer' >
        </form>
        <div class="message">
            <?= $chatDatas ?>
        </div>

    </article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>