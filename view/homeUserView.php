<?php
ob_start(); ?>

<section>
    <article>
        <p><strong><?php  echo $_SESSION['pseudo']; ?></strong>, Vous êtes bien connecté sur votre compte et nous sommes ravis de vous savoir parmis nos utilisateurs. </p>
        <p>Voici un récapitulatif des actions que vous pouvez exécuter sur votre espace utilisateur :
            <ul>
            <li>Accéder à vos informations et les modifier</li>
            <li>Réaliser un test personnalisé</li>
            <li>Accéder à vos derniers résultats</li>
            <li>Accéder à votre historique de résultat</li>
            <li>Discuter avec un manager</li>
        </ul>
        </p>
        <p>Nous vous remercions pour la confiance que vous accordez à Infinite Measures.</p>
        <p>L'équipe Infinite Measures.</p>
        <br>
        <img src="public/images/f1_user.png" class= "bannerImage">
    </article>
</section>

<?php  $content = ob_get_clean();
require('view/userSpaceView.php') ; ?>
