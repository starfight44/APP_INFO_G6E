<?php
ob_start(); ?>
<section>
    <h3>List of active cats</h3>
    <article>
        <table>
        <?= $userChatList ?>
        </table>
    </article>
</section>
<?php $content = ob_get_clean();
require('view/managerSpaceView.php');?>
