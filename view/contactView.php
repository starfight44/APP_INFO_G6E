<?php $title = 'Formulaire de contact'; ?>

<?php ob_start(); ?>

<div id="contact_container">
    <form action="index.php?action=contact" method="POST">
        <h1>Nous contacter</h1>

        <label><b>Pseudo</b></label>
        <input type="text" placeholder="Entrez votre nom d'utilisateur" name="pseudo" required>


        <label><b>E-Mail</b></label>
        <input type="email" placeholder="Entrez votre mail" name="email" required>

        <label><b>Message</b></label>
        <textarea name="message" rows="20" cols="50" placeholder="Tapez votre message ici : " required></textarea>


        <input type="checkbox" id="CGU" required/>
        <label for="CGU">J'accepte les<a href="index.php?action=CGU">CGU</a> </label>

        <br>
        <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

        <input type="submit" id='submit' value='VALIDER' >
    </form>
</div>

<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>
