<?php $title = 'Modifier mes informations'; ?>

<?php ob_start(); ?>

    <div id="registration_container"> <!-- Cadre contenant le formulaire -->

        <form onsubmit="return validateForm()" action="index.php?action=modifyUserInformations" method="POST" name="modify"> <!--  formulaire d'inscription  -->

            <h1>Modifier mes informations : </h1>

            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrer le nom" name="lastName" value="<?= $userDatas['Nom'] ?>" required>

            <label><b>Prenom</b></label>
            <input type="text" placeholder="Entrer le prenom" name="firstName" value="<?= $userDatas['Prénom'] ?>" required>

            <label><b>Taille</b></label>
            <input type="number" placeholder="taille en cm" name="height" value="<?= $userDatas['Taille']?>" required>

            <label><b>Poids</b></label>
            <input type="number" placeholder="poids en kg" name="weight" value="<?= $userDatas['Poids']?>" required>

            <label><b>Mot de passe actuel</b></label>
            <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

            <label><b>Nouveau mot de passe (si vous souhaitez le modifier)</b></label>
            <input type="password" placeholder="Entrez un nouveau mot de passe" name="newPassword">

            <br>
            <br>
            <p class="warning" id="warning">
            <?php if(isset($warning_message)){ ?> <?= $warning_message ?><?php ;} ?>
            </p>
            <input type="submit" id='submit' value="Confirmer les modifications">
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
                msg = "Mot de passe trop faible, il doit contenir 1 caractère majuscule, 1 caractère minuscule, 1 chiffre,1 caractère spécial et un minimum de 5 caractères.";
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