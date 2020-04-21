<!-- contenu de la page principale utilisant template.php -->
<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>  <!-- Menu de la page info utilisateur -->
<nav>
    <ul id="navigation">

        <li><a href="index.php?action=userInformations" ><?php echo $_SESSION['pseudo'];?></a></li>
        <li><a href="index.php?action=makeATest" >Test</a></li>
        <li><a href="index.php?action=userResults" >Résultats</a></li>
        <li><a href="index.php?action=userHistoric" >Historique</a></li>
        <li><a href="index.php?action=" >Messagerie</a></li>


        <div class ="rightLogo">
            <li><a href="index.php?action=logout" class="connect">Déconnexion</a></li>
        </div>
    </ul>
</nav>
<?php $nav = ob_get_clean();?>


<?php $footer_link ='index.php?action=CGU'; ?>
<?php $label_footer_link ="conditions générales d'utilisation"; ?>

<?php include('mainTemplate.php'); ?>