<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="public/CSS/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title><?= $title ?></title>
</head>

<body>
<header>
    <div id ="top">
        <a href="index.php" class="logoLink")">
            <img src="public/images/Infinite_measures.gif" alt="logoImage" class="logoImage" width="150em"/>
        </a>
        <?= $nav ?>
    </div>
</header>

<?= $content ?>

<a href="#"><img src="public/images/remonter.png" class= "remonter" /></a><!-- met une image permettant de remonter en haut de la page-->

<footer>
    <div id="social">
        <p><strong>Our social networks : </strong></p>
        <a href="https://www.facebook.com/InfiniteMeasuresFr/"><img src="public/images/facebook.png" class="socialLogo"></a>
        <a href="https://www.instagram.com/infinite_measures/"><img src="public/images/instagram.png" class="socialLogo"></a>
    </div>

    <div id="footer_link">
        <a href=<?= $footer_link ?>><?= $label_footer_link ?></a>
        <br>
        <br>
        <a href="http://infinite-measures.freeboxos.fr:10/en" class="flag"><img src="public/images/en.jpg" width="30px"></a>
        <a href="http://infinite-measures.freeboxos.fr:10" class="flag"><img src="public/images/fr.svg" width="30px"></a>
    </div>

</footer>

<?php
if(isset($script)){
    echo $script;
}
?>
</body>
</html>
