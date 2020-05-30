<!-- contenu de la page principale utilisant template.php -->
<?php $title = 'Manager space'; ?>

<?php ob_start(); ?>  <!-- Menu de la page info utilisateur -->
<nav>
    <ul id="navigation">

        <li><a href="index.php?action=printUsers" >Users</a></li>
        <li><a href="index.php?action=listNonActivatedAccounts" >Activate accounts</a></li>
        <li><a href="index.php?action=manageFAQ">F.A.Q.</a></li>
        <li><a href="index.php?action=managerChatChoice">Chat</a></li>
        <li><a href="index.php?action=numberOfVisitors">Datas</a></li>
        <div class ="rightLogo">
            <li><a href="index.php?action=logout" class="connect">Logout</a></li>
        </div>
    </ul>
</nav>
<?php $nav = ob_get_clean();?>



<?php $footer_link =''; ?>
<?php $label_footer_link =""; ?>

<?php include('mainTemplate.php'); ?>
<?php
