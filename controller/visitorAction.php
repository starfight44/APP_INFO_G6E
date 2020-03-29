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
        if(sendMail()){
            require('view/homeView.php');
        }
        else{
            $warning_message='il y a eu une erreur veuillez réessayer !';
            require('view/contactView.php');
        }
    }
}

function sendMail(){
    return false;
}


function connect(){
    session_start();
    if(!isset($_POST['pseudo'])){ /*si le formulaire n'a pas été rempli on demande de le remplir*/
        require('view/connectView.php');
    }
    else{
        require('model/model.php');

        $donnees = getUserConnectionInfos($_POST['pseudo']);

        if(isset($donnees['pseudo']) AND password_verify($_POST['password'],$donnees['mot_de_passe'])) {
            $_SESSION['ID'] = $donnees['ID'];
            $_SESSION['pseudo'] = $donnees['pseudo'];
            $content = '<section><strong>Bonjour, vous êtes bien connecté sur votre compte utilisateur '. $_SESSION['pseudo'].' ! </strong></section>';
            require('view/userSpaceView.php');
        }
        else
        {
            $warning_message='pseudo ou mot de passe incorrect';
            require('view/connectView.php');
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
        require('model/model.php');

        setUserInfos($_POST['pseudo'],$_POST['lastName'],$_POST['firstName'],$_POST['email'],$_POST['password'],$_POST['height'],$_POST['weight'],$_POST['sex'],$_POST['country']);

        $warning_message='inscription réalisée avec succès veuillez vous connecter';
        require('view/connectView.php');
    }
}


