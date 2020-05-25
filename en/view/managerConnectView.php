<?php $title = 'Espace Manager';?>

<?php ob_start(); ?>

    <div id="connection_container">
        <form action="index.php?action=manager" method="POST">
            <h1>Espace Manager</h1>

            <label><b>E-mail</b></label>
            <input type="email" placeholder="Entrer votre mail manager" name="email" required>


            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

            <a href="index.php?action=connect" id = "inscription">Si vous êtes client Infinite Measures, cliquez ici</a>

            <br>
            <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

            <input type="submit" id='submit' value='SE CONNECTER' >
        </form>
    </div>

<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>