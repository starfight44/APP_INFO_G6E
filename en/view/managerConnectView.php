<?php $title = 'Espace Manager';?>

<?php ob_start(); ?>

    <div id="connection_container">
        <form action="index.php?action=manager" method="POST">
            <h1>Manager space</h1>

            <label><b>E-mail</b></label>
            <input type="email" placeholder="EEnter your mailr" name="email" required>


            <label><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <a href="index.php?action=connect" id = "inscription">If you are an Infinite Measures customer, click here</a>

            <br>
            <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

            <input type="submit" id='submit' value='Login' >
        </form>
    </div>

<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>