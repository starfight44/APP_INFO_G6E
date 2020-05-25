<!-- contenu de la page principale utilisant template.php -->
<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>  <!-- Menu de la page info utilisateur -->
<nav>
    <ul id="navigation">

        <li><a href="index.php?action=homeUser"><?php echo $_SESSION['pseudo'];?></a></li>
        <li><a href="index.php?action=userInformations" >My informations</a></li>
        <li><a href="index.php?action=makeATest" >Test</a></li>
        <li><a href="index.php?action=userResults" >Results</a></li>
        <li><a href="index.php?action=userHistory" >History</a></li>
        <li><a href="index.php?action=userChat" >Chat</a></li>


        <div class ="rightLogo">
            <li><a href="index.php?action=logout" class="connect">Logout</a></li>
        </div>
    </ul>
</nav>
<?php $nav = ob_get_clean();?>


<?php $footer_link ='index.php?action=contact'; ?>
<?php $label_footer_link ="Contact by email"; ?>

<?php include('mainTemplate.php'); ?>