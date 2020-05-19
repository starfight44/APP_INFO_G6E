<?php

function mainPage(){
    require('model/modelmanager.php');
    session_start();


    if (isset($_SESSION['ID'])) {
        $connection_state = $_SESSION['pseudo'];
    } elseif (isset($_SESSION['IDmanager'])) {
        $connection_state = 'Espace manager';
    } else {
        addVisitor(); //on incrémente le nombre de visiteur
        $connection_state = 'Se connecter';
    }


    $donnees = getFAQ();
    ob_start();
    foreach ($donnees as $elt)
    echo '
    <div class="parent">
            <p class="question">'.$elt['question'].'</p>
            <div class="enfant">
                <p class="reponse">'.$elt['response'].'</p>
            </div>
    </div>';
    $FAQ = ob_get_clean();



    require('view/homeView.php');

}

function CGU(){
    require('view/cguView.php');
}

function contact(){
    if(!isset($_POST['email'])){ /*si le formulaire n'a pas été rempli on demande de le remplir*/
        require('view/contactView.php');
    }
    else{/*sinon on envoie le mail*/
        require ('controller/mail.php');
        $mailDestination = 'infinite.measures.g6e@gmail.com';
        $subject = 'Contact / '. $_POST['email'];
        $body= $_POST['message'];
        if(sendMail($mailDestination,$subject,$body)){
            $warning_message="Votre message à bien été envoyé !
                                    <br>
                                    <a href=\"index.php\">Retourner à l'acceuil</a>";
            require('view/contactView.php');
        }
        else{
            $warning_message='il y a eu une erreur veuillez réessayer !';
            require('view/contactView.php');
        }
    }
}



function connect(){
    session_start();
    if(isset($_SESSION['ID'])){
        header('Location: index.php?action=homeUser');
    }
    elseif (isset($_SESSION['IDmanager'])){
        header('Location: index.php?action=printUsers');
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
                    header('Location: index.php?action=homeUser');
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
            require('controller/mail.php');
            $subject ='Validation compte utilisateur / Pseudo : '.$_POST['pseudo'];
            $body="Un <strong>nouvel utilisateur</strong> s'est inscrit sur le site Infinite Measures, Veuillez confirmer son compte.
            <br>
            <strong>Informations utilisateur :</strong>
            <br>
            <br>
            Pseudo : ".$_POST['pseudo']."<br>
            Nom : ".$_POST['lastName']." <br>
            Prénom : ".$_POST['firstName']."<br>
            Email : ".$_POST['email']."";
            sendMail('infinite.measures.g6e@gmail.com',$subject,$body);
            $warning_message = "inscription réalisée avec succès, vous devez maintenant attendre qu'un manager valide votre compte \n
                                Vous recevrez un mail lorsque cette action sera réalisée !";
            require('view/connectView.php');
        }
    }
}