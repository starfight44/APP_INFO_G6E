<?php
ob_start(); ?>
<section>
    <h3>Liste des chats actifs</h3>
    <article>
        <table>
        <?= $userChatList ?>
        </table>
    </article>
</section>
<?php $content = ob_get_clean();
require('view/managerSpaceView.php');?>
