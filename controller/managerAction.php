<?php

function managerConnect(){
    session_start();
    if(!isset($_POST['email'])){ /*si le formulaire n'a pas été rempli on demande de le remplir*/
        require('view/managerConnectView.php');
    }else {
        require("model/modelManager.php");
        $donnees = getManagerConnectionInfos($_POST['email']);

        if(isset($donnees['email']) AND password_verify($_POST['password'],$donnees['password'])) {
            $_SESSION['IDmanager'] = $donnees['id'];
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
        require('model/modelManager.php');
        $donnees = getUsersList();
        ob_start();
        foreach($donnees as $elt) {
            echo '<tr>
                    <td>' . $elt['ID'] .'</td> 
                    <td>' . $elt['pseudo']  .'</td>
                    <td>'. $elt['firstName'] . '</td>
                    <td>'. $elt['lastName'] . '</td>
                    <td>'. $elt['email'] . '</td>
                    <td>'. $elt['height'] . '</td>
                    <td>'. $elt['weight'] . '</td>
                    <td>'. $elt['sex'] . '</td>
                    <td>'. $elt['country'] . '</td>
                    <td>'. $elt['registration_date'] . '</td>
                 </tr>';
        }
        $listUsers = ob_get_clean();
        require('view/managerListUsersView.php');
    }
    else{
            $warning_message = 'Reconnectez vous';
            require('view/managerConnectView.php');
        }
}

function searchUser(){
    if(isManagerLog()) {
        require('model/modelUser.php');
        $donnees = getUserInfos($_POST['id']);
        if(isset($donnees['Pseudo'])){
            ob_start();
            foreach($donnees as $key => $value) {
                echo '<td>'. $value .'</td>';
            }
            $userInformations = ob_get_clean();

            $_SESSION['idUser'] = $_POST['id'];
            require('view/managerModifyUserView.php');
        }
        else{
            $warning_message=urlencode('utilisateur introuvable, veuillez saisir un id valide');
            $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
            header($url);
        }

    }
    else{
            $warning_message = 'Reconnectez vous';
            require('view/managerConnectView.php');
        }
    }

function deleteUserAccount(){
    if(isManagerLog()) {
        require("model/modelManager.php");
        deleteAccount($_SESSION['idUser']);
        $warning_message=urlencode('Profil supprimé avec succès');
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }
else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function resetUserPassword(){
    if(isManagerLog()) {
        require("model/modelManager.php");
        $newPassword = generate_passord();
        $warning_message=urlencode('Nouveau mot de passe lié à l\'ID utilisateur ').$_SESSION['idUser'].urlencode(' => ').$newPassword;
        $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
        resetPassword($_SESSION['idUser'],$newPassword);
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function listNonActivatedAccounts(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $donnees = getNonActivatedAccounts();
       if(count($donnees)==0){
           $listUsers = '<strong><p>Il n\'y a aucun compte à valider</p></strong>';
       }
        else{
        ob_start();
        echo '<tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>';
        foreach ($donnees as $elt) {
            echo '<tr>
                    <td>' . $elt['ID'] . '</td> 
                    <td>' . $elt['pseudo'] . '</td>
                    <td>' . $elt['firstName'] . '</td>
                    <td>' . $elt['lastName'] . '</td>
                    <td>' . $elt['email'] . '</td>
                    <td><a href="index.php?action=activateAccount&id_user=' . $elt['ID'] . '"><input type="button" value="Activer le compte"></a></td>
                    <td><a href="index.php?action=deleteNonActivatedUser&id_user=' . $elt['ID'] . '"><input type="button" value="Supprimer le compte" onclick="return(confirm(\'Êtes vous sur de vouloir supprimer le compte ?\'))"></a></td>

                 </tr>';
        }
        $listUsers = ob_get_clean();
    }
        require('view/managerListNonActivatedUsersView.php');
    }else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function deleteNonActivatedUser($id){
    if(isManagerLog()) {
        require("model/modelManager.php");
        deleteAccount($id);
        header('Location:index.php?action=listNonActivatedAccounts');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function activateAccount(){
    if(isManagerLog()) {
        $id_user = $_GET['id_user'];
        require('model/modelManager.php');
        activateUserAccount($id_user);
        header('Location:index.php?action=listNonActivatedAccounts');

    }else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}

function makeManager(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $userInfos=getUserInfos($_SESSION['idUser']);
        $userConnectionInfos=getUserConnectionInfos($_SESSION['idUser']);
        addManager($userInfos['Nom'],$userInfos['Prénom'],$userInfos['Mail'],$userConnectionInfos['password'],$userInfos['Pays']);
        $warning_message=urlencode('Compte manager créé avec succès');
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }else{
        $warning_message = 'Reconnectez vous';
        require('view/managerConnectView.php');
    }
}



function isManagerLog(){
    session_start();
    if(isset($_SESSION['IDmanager'])) { /*on vérifie si la session n'a pas expiré */
        return true;
    }
    else{
        return false;
    }
}

function generate_passord($password_lenght = 7)
{
    $password = "";

    $string = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
    $string_lenght = strlen($string);

    for($i = 1; $i <= $password_lenght ; $i++)
    {
        $random = mt_rand(0,($string_lenght-1));
        $password .= $string[$random];
    }

    return $password;
}
