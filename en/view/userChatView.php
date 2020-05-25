<?php
ob_start(); ?>

<section>
    <article>
        <form action="index.php?action=newUserMessage" method="POST">
            <textarea name="message" placeholder="Enter your message"></textarea>
            <input type="submit" id='submit' value='send' >
        </form>
        <div class="message">
            <?= $chatDatas ?>
        </div>

    </article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>