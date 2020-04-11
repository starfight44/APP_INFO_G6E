<?php $title = 'Modifier mes informations'; ?>

<?php ob_start(); ?>

    <div id="registration_container"> <!-- Cadre contenant le formulaire -->

        <form action="index.php?action=modifyUserInformations" method="POST"> <!--  formulaire d'inscription  -->

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
            <?php if(isset($warning_message)){ ?> <p class="warning"><?= $warning_message ?></p> <?php ;} ?>

            <input type="submit" id='submit' value="Confirmer les modifications" >

        </form>
    </div>

<?php $formContent = ob_get_clean(); ?>

<?php require('formTemplate.php'); ?>