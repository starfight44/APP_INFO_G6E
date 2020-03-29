<?php

function printUserInformations(){
    if(isLoginOk()){
        require('model/model.php');
        $donnees = getUserInfos($_SESSION['ID']);

        ob_start();
        echo '<section>';
        echo '<h3>Mes informations : </h3>';

        echo '<article>';
        echo '<a href="index.php?action=modifyUserInformations"><input type="button" value="Modifier mes informations"> </a>';
        foreach($donnees as $key => $value) {
            echo '<p><strong>' . $key . ' : </strong><span class="info">'. $value . '</span></p>';
        }

        echo '</article>';

        echo '</section>';
        $content = ob_get_clean();
        require('view/userSpaceView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function modifyUserInformations(){
    if(isLoginOk()){
        require('model/model.php');
        $connectionDatas = getUserConnectionInfos($_SESSION['pseudo']);
        $userDatas = getUserInfos($_SESSION['ID']);
        if(isset($_POST['pseudo'])) {
            if (password_verify($_POST['password'],$connectionDatas['mot_de_passe'])) {
                if(strlen($_POST['newPassword']) > 0){
                    updatePassword($_POST['newPassword'],$connectionDatas['ID']);
                }
                updateUserInfos($_POST['pseudo'], $_POST['lastName'], $_POST['firstName'], $_POST['email'], $_POST['height'], $_POST['weight'],$connectionDatas['ID']);
                $warning_message = 'modifications réussies, reconnectez vous !';
                require('view/connectView.php');

            } else {
                $warning_message = 'Echec, mot de passe incorrect, réessayez';
                require('view/modifyUserInformationsView.php');
            }
        }
        else{
            require('view/modifyUserInformationsView.php');
        }
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function userResults(){
    if(isLoginOk()){

    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function makeATest(){
    if(isLoginOk()){

    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function userHistoric(){
    if(isLoginOk()){

    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }

}

function isLoginOk(){
    session_start();
    if(isset($_SESSION['ID']) AND isset($_SESSION['pseudo'])) { /*on vérifie si la session n'a pas expiré */
        return true;
    }
    else{
        return false;
    }
}

function logout(){
    // On appelle la session
    session_start();
    // On écrase le tableau de session
    $_SESSION = array();
    // On détruit la session
    session_destroy();
    require('view/homeView.php');
}