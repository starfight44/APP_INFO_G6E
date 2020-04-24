<!-- contenu de la page principale utilisant template.php -->
<?php $title = 'Espace manager'; ?>

<?php ob_start(); ?>  <!-- Menu de la page info utilisateur -->
<nav>
    <ul id="navigation">

        <li><a href="index.php?action=printUsers" >Lister les utilisateurs</a></li>
        <li><a href="index.php?action=listNonActivatedAccounts" >Activer des comptes</a></li>
        <li><a href="index.php?action=manageFAQ">Gérer la F.A.Q.</a></li>
        <li><a href="index.php?action=managerChatChoice">Messagerie</a></li>
        <div class ="rightLogo">
            <li><a href="index.php?action=logout" class="connect">Déconnexion</a></li>
        </div>
    </ul>
</nav>
<?php $nav = ob_get_clean();?>



<?php $footer_link =''; ?>
<?php $label_footer_link =""; ?>

<?php include('mainTemplate.php'); ?>
<?php
