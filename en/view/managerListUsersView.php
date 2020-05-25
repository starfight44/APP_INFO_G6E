<?php ob_start(); ?>
<section>
    <h3>liste des utilisateurs actifs</h3>

    <article>
        <form action="index.php?action=searchUser" method="POST">
            <input type="text" placeholder="pseudo utilisateur" name="pseudo" required>
            <input type="submit" id='submit' value='Rechercher' >
        </form>
        <?php if(isset($_GET['message'])){ ?> <p class="warning"> <?php echo $_GET['message'];?></p> <?php ;} ?>
        <div id ="membres">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Taille</th>
                    <th>Poids</th>
                    <th>Sexe</th>
                    <th>Pays</th>
                    <th>Date d'inscritpion</th>
                </tr>

                <?= $listUsers ?>

            </table>
        </div>
    </article>
</section>


<?php $content = ob_get_clean();

require('view/managerSpaceView.php');?>
