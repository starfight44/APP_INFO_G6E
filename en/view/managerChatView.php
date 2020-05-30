<?php
ob_start(); ?>

    <section>
        <article>
            <a href="index.php?action=deleteMessages"><input type="button" value="Delete chat" onclick="return(confirm('Are you sure you want to delete all messages?'))"></a>
            <form action="index.php?action=newManagerMessage" method="POST">
                <textarea name="message" placeholder="Enter a message"></textarea>
                <input type="submit" id='submit' value='Send' >
            </form>
            <div class="message">
                <?= $chatDatas ?>
            </div>

        </article>
    </section>


<?php $content = ob_get_clean();
require('view/managerSpaceView.php');?>
