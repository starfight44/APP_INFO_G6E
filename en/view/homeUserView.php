<?php
ob_start(); ?>

<section>
    <article>
        <p><strong><?php  echo $_SESSION['pseudo']; ?></strong>, You are well connected to your account and we are delighted to know you among our users. </p>
        <p>Here is a summary of the actions you can perform on your user space:
            <ul>
            <li>Access and modify your personal information</li>
            <li>Perform a custom test</li>
            <li>Access the average of your results </li>
            <li>Access your test history</li>
            <li>Chat with a manager</li>
        </ul>
        </p>
        <p>Thank you for the trust you place in Infinite Measures,</p>
        <p>The Infinite Measures team.</p>
        <br>
        <img src="public/images/f1_user.png" class= "bannerImage">
    </article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>
