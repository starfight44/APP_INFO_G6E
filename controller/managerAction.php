<?php

function managerConnect(){
    session_start();
    if(!isset($_POST['email'])){ /*si le formulaire n'a pas été rempli on demande de le remplir*/
        require('view/managerConnectView.php');
    }else {
        require("model/modelManager.php");
        $donnees = getManagerConnectionInfos($_POST['email']);

        if(isset($donnees['email']) AND password_verify($_POST['password'],$donnees['password'])) {
            $_SESSION['ID'] = $donnees['id'];
            $_SESSION['manager'] = true;
            $content = '<section><strong>Bonjour, vous êtes bien connecté sur votre compte manager !</strong></section>';
            require('view/managerSpaceView.php');
        }
        else
        {
            $warning_message='email ou mot de passe incorrect';
            require('view/managerConnectView.php');
        }
    }
}


function printUsers(){
if(isManagerLog()){
    $content = printUsers();
    require('view/managerSpaceView.php');
}
else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function isManagerLog(){
    session_start();
    if($_SESSION['manager']) { /*on vérifie si la session n'a pas expiré */
        return true;
    }
    else{
        return false;
    }
}