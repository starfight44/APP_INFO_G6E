<?php

function mainPage(){
    require('view/homeView.php');

}

function CGU(){
    require('view/cguView.php');
}

function contact(){
    if(!isset($_POST['pseudo'])){ /*si le formulaire n'a pas été rempli on demande de le remplir*/
        require('view/contactView.php');
    }
    else{/*sinon on envoie le mail*/
        if(sendMailTo("")){
            require('view/homeView.php');
        }
        else{
            $warning_message='il y a eu une erreur veuillez réessayer !';
            require('view/contactView.php');
        }
    }
}

function sendMailTo($mail){
    return false;
}


function connect(){
    session_start();
    if(isset($_SESSION['ID'])){
        $content = '<section><strong>Comment allez vous '. $_SESSION['pseudo'].' ? </strong></section>';
        require('view/userSpaceView.php');
    }
    elseif (isset($_SESSION['IDmanager'])){
        $content = '<section><strong>Vous êtes bien connecté sur votre compte manager !</strong></section>';
        require('view/managerSpaceView.php');
    }
    else {
        if (!isset($_POST['pseudo'])) { /*si le formulaire n'a pas été rempli on demande de le remplir*/
            require('view/connectView.php');
        } else {
            require('model/modelUser.php');

            $donnees = getUserConnectionInfos($_POST['pseudo']);
            if (isset($donnees['pseudo']) AND password_verify($_POST['password'], $donnees['password'])) {
                if(isset($donnees['active_account']) AND $donnees['active_account']==1){
                    $_SESSION['ID'] = $donnees['ID'];
                    $_SESSION['pseudo'] = $donnees['pseudo'];
                    $content = '<section><strong>Bonjour, vous êtes bien connecté sur votre compte utilisateur ' . $_SESSION['pseudo'] . ' ! </strong></section>';
                    require('view/userSpaceView.php');
                } else {
                    $warning_message = 'Votre compte n\'est pas encore activé, vous devez attendre qu\'un manager l\'active !';
                    require('view/connectView.php');
                }
            }
            else{
                $warning_message = 'pseudo ou mot de passe incorrect';
                require('view/connectView.php');
            }
        }
    }
}

function register(){
    if(!isset($_POST['pseudo'])){
        require('view/registerView.php');
    }
    elseif ($_POST['password'] != $_POST['confirmPassword'] OR strlen($_POST['password']) !=  strlen($_POST['confirmPassword'])){
        $warning_message='Saisie invalide dans "confirmer le mot de passe"';
        require('view/registerView.php');

    }
    else {
        require('model/modelUser.php');
        if(isUserInDatabase(strtolower($_POST['pseudo']),strtolower($_POST['email']))){
            $warning_message='Pseudo ou email déjà utilisé !';
            require('view/registerView.php');
        }
        else {
            setUserInfos(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['height']), htmlspecialchars($_POST['weight']), htmlspecialchars($_POST['sex']), htmlspecialchars($_POST['country']));
            sendMailTo("");
            $warning_message = 'inscription réalisée avec succès vous devez maintenant attendre qu\'un manager valide votre compte';
            require('view/connectView.php');
        }
    }
}