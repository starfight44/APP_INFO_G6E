<?php ob_start();?>

<section>
    <article>
        <a href="index.php?action="><input type="button" value="Modifier Pseudo utilisateur" ></a>
        <a href="index.php?action="><input type="button" value="Modifier mail utilisateur"></a>
        <a href="index.php?action=resetPassword"><input type="button" value="Réinitialiser le mot de passe utilisateur" onclick="return(confirm('Êtes vous sur de vouloir réinitialiser le mot de passe utilisateur ?'))"></a>
        <a href="index.php?action=makeManager"><input type="button" value="Passer en administrateur" onclick="return(confirm('Voulez vous vraiment passer ce compte en manager ?'))"></a>
        <a href="index.php?action=deleteUser"><input type="button" value="Suppression du compte utilisateur" onclick="return(confirm('Êtes vous sur de vouloir supprimer cet utilisateur ?'))"> </a>
        <table>
            <tr>
                <th>Pseudo</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Taille</th>
                <th>Poids</th>
                <th>Sexe</th>
                <th>Pays</th>
            </tr><tr>

                <?= $userInformations ?>

            </tr></table>
    </article>
</section>

<?php $content = ob_get_clean();

require('view/managerSpaceView.php');?>
