<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="public/CSS/formulaire.css" rel="stylesheet">
</head>
<body>


<div id = "main_container">
    <header>
        <a href="index.php"> <img src="public/images/Infinite_measures.gif" alt="logo" id = "logo"/></a>
    </header>


        <?= $formContent ?>

</div>

<?php
if(isset($script)){
    echo $script;
}
?>
</body>
</html>