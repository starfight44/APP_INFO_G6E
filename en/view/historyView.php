<?php
ob_start(); ?>

<section>
    <h2>history of your results</h2>
    <br>
    <article>
        <table>
            <?= $resultList ?>
        </table>
    </article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>