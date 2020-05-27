<?php ob_start(); ?>
<section>
    <h2>Management of the F.A.Q</h2>
    <article>

    <form action="index.php?action=addQuestion" method="POST" >
            <textarea id="FAQQuestion" name="question" placeholder="Question" required></textarea>
            <textarea id="FAQResponse" name="response" placeholder="Response" required></textarea>
        <input type="submit" id='submit' value='Add to FAQ' onclick="return(confirm('Do you want to add this question to the F.A.Q.?'))">
    </form>

        <table>
        <?= $FAQ ?>
        </table>
    </article>
</section>
<?php $content = ob_get_clean();
require('view/managerSpaceView.php');?>
