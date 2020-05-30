<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

    <div id="connection_container">
        <form action="index.php?action=connect" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="pseudo" value="<?php if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'];} ?>" required>


            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <a href="index.php?action=register" id = "inscription">S'inscrire</a>

            <br>
            <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

            <input type="submit" id='submit' value='SE CONNECTER' >
        </form>
    </div>

    <a href="index.php?action=manager" id="manager">Espace Manager</a>
<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>