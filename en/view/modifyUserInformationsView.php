<?php $title = 'Modifier mes informations'; ?>

<?php ob_start(); ?>

    <div id="registration_container"> <!-- Cadre contenant le formulaire -->

        <form onsubmit="return validateForm()" action="index.php?action=modifyUserInformations" method="POST" name="modify"> <!--  formulaire d'inscription  -->

            <h1>Modify my informations </h1>

            <label><b>First name</b></label>
            <input type="text" placeholder="Enter name" name="lastName" value="<?= $userDatas['Nom'] ?>" required>

            <label><b>Last name</b></label>
            <input type="text" placeholder="Enter first name" name="firstName" value="<?= $userDatas['Prénom'] ?>" required>

            <label><b>Height</b></label>
            <input type="number" placeholder="size in cm" name="height" value="<?= $userDatas['Taille']?>" required>

            <label><b>Weight</b></label>
            <input type="number" placeholder="weight in kg" name="weight" value="<?= $userDatas['Poids']?>" required>

            <label><b>Actual password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <label><b>New password (if you want to change it)</b></label>
            <input type="password" placeholder="Enter a new password" name="newPassword">

            <br>
            <br>
            <p class="warning" id="warning">
            <?php if(isset($warning_message)){ ?> <?= $warning_message ?><?php ;} ?>
            </p>
            <input type="submit" id='submit' value="Confirm changes">
        </form>
    </div>

<?php $formContent = ob_get_clean(); ?>

<?php ob_start(); ?>

    <script type="text/javascript">
        function validateForm(){
            var msg;
            var password = document.forms["modify"]["newPassword"].value;

            if ((!password.match( /[0-9]/g) ||
                !password.match( /[A-Z]/g) ||
                !password.match(/[a-z]/g) ||
                !password.match( /[^a-zA-Z\d]/g) ||
                password.length <= 5) && password.length>0){
                msg = "Password too weak, it must contain 1 uppercase character, 1 lowercase character, 1 digit, 1 special character and a minimum of 5 characters.";
                document.getElementById("warning").innerHTML= msg;

                return false;
            }
            else {
                return true;
            }
        }
    </script>
<?php $script = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>