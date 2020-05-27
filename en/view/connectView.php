<?php $title = 'Connection'; ?>

<?php ob_start(); ?>

    <div id="connection_container">
        <form action="index.php?action=connect" method="POST">
            <h1>connection</h1>

            <label><b>user name</b></label>
            <input type="text" placeholder="Enter your user name" name="pseudo" required>


            <label><b>password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <a href="index.php?action=register" id = "inscription">register</a>

            <br>
            <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

            <input type="submit" id='submit' value='Login' >
        </form>
    </div>

    <a href="index.php?action=manager" id="manager">Manager Space</a>
<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>