<?php $title = 'Contact form'; ?>

<?php ob_start(); ?>

<div id="contact_container">
    <form action="index.php?action=contact" method="POST">
        <h1>Contact us</h1>

        <label><b>E-Mail</b></label>
        <input type="email" placeholder="Enter your e-mail" name="email" required>

        <label><b>Message</b></label>
        <textarea name="message" rows="20" cols="50" placeholder="Type your message here : " required></textarea>


        <input type="checkbox" id="CGU" required/>
        <label for="CGU">I accept the <a href="index.php?action=CGU">terms</a> </label>

        <br>
        <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

        <input type="submit" id='submit' value='VALIDATE' >
    </form>
</div>

<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>
