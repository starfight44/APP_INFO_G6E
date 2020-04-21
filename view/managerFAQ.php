<?php ob_start(); ?>
<section>
    <h2>Gestion de la F.A.Q</h2>
    <article>

    <form action="index.php?action=addQuestion" method="POST">
            <textarea id="FAQQuestion" name="question" placeholder="Question"></textarea>
            <textarea id="FAQResponse" name="response" placeholder="Réponse"></textarea>
        <input type="submit" id='submit' value='Ajouter à la FAQ' >
    </form>

        <table>
        <?= $FAQ ?>
        </table>
    </article>
</section>
<?php $content = ob_get_clean();
require('view/managerSpaceView.php');?>
