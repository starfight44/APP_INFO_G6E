<?php

function printUserInformations(){
    if(isLoginOk()){
        require('model/modelUser.php');
        $donnees = getUserInfos($_SESSION['ID']);
        require('view/informationsView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function modifyUserInformations(){
    if(isLoginOk()){
        require('model/modelUser.php');
        $connectionDatas = getUserConnectionInfos($_SESSION['pseudo']);
        $userDatas = getUserInfos($_SESSION['ID']);

        if(isset($_POST['password'])) {
            if (password_verify($_POST['password'],$connectionDatas['password'])) {

                    if (strlen($_POST['newPassword']) > 0) {
                        updatePassword($_POST['newPassword'], $connectionDatas['ID']);
                    }

                    updateUserInfos($_POST['lastName'], $_POST['firstName'], $_POST['height'], $_POST['weight'], $connectionDatas['ID']);
                    $warning_message = 'modifications réussies, reconnectez vous !';
                    header('Location:index.php?action=userInformations');

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

function homeUser(){
    if(isLoginOk()) {
        require('view/homeUserView.php');
    }
    else{
            $warning_message = 'Reconnectez vous';
            require('view/connectView.php');
        }
}



function makeATest(){
    if(isLoginOk()){
        require('model/modelUser.php');
        $donnees = getSensorsChoice($_SESSION['ID']);
        ob_start();
        foreach($donnees as $key => $value) {
            echo '<a href="index.php?action=removeSensor&id_sensor='.$value['id'].'"><p><strong>' . ($key + 1) . ' : </strong>' . $value['type'] .'</p></a>';
        }
        $sensorsChoice = ob_get_clean();
        require('view/makeATestView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function deleteSensorChoice($id_sensor){
    if(isLoginOk()) {
        require('model/modelUser.php');
        deleteSensor($_SESSION['ID'], $id_sensor);
        header('Location:index.php?action=makeATest');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function addSensorChoice(){
    if(isLoginOk()){
        require('model/modelUser.php');
        $donnees = getSensorsChoice($_SESSION['ID']);
        foreach($donnees as $key => $value) { /*On recherche si le choix n'est pas déja dans la table, sinon on le supprime et on le replace en derniere position*/
            if($value['id'] == $_POST['id_sensor']){
                deleteSensor($_SESSION['ID'],$_POST['id_sensor']);
            }
        }
        addSensor($_SESSION['ID'], $_POST['id_sensor']);
        header('Location:index.php?action=makeATest');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}



function userResults(){
    if(isLoginOk()){
        require('view/resultsView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}


function userHistory(){
    if(isLoginOk()){
        require('view/historyView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function printUserChat(){
    if(isLoginOk()){
        require('model/modelUser.php');
        $donnees = getChatDatas($_SESSION['ID']);
        ob_start();
        foreach($donnees as $elt) {
            echo '<h4';
            if($elt['account_type']=='manager'){echo ' id="manager">Manager';}else{echo ' id=user>Vous';}
            echo '</h4>
                    <p id="content">'.$elt['content'].'</p>';
        }
        $chatDatas = ob_get_clean();
        require('view/userChatView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }

}

function newUserMessage(){
    if(isLoginOk()){
        require('model/modelUser.php');
        sendMessage($_POST['message'],$_SESSION['ID']);
        header('Location:index.php?action=userChat');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function executeTest(){
    if(isLoginOk()){
        require('model/modelUser.php');
        in_array(1,getSensorsChoiceID($_SESSION['ID'])) ? $cardiacFrequency=150 : $cardiacFrequency=null ;
        in_array(2,getSensorsChoiceID($_SESSION['ID'])) ? $temperature = 37 : $temperature = null;
        in_array(3,getSensorsChoiceID($_SESSION['ID'])) ? $visualStimulus=100 : $visualStimulus =null;
        in_array(4,getSensorsChoiceID($_SESSION['ID'])) ? $soundStimulus = 100 : $soundStimulus =null;
        if(in_array(5,getSensorsChoiceID($_SESSION['ID']))){
            $minFrequencyRecognition=20;
            $maxFrequencyRecognition=20000;
        }
        else{
            $minFrequencyRecognition=null;
            $maxFrequencyRecognition=null;
        }

        addToResults($_SESSION['ID'],$cardiacFrequency,$temperature,$visualStimulus,$soundStimulus,$minFrequencyRecognition,$maxFrequencyRecognition);
        header('Location:index.php?action=userHistory');
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

function logout()
{
    // On appelle la session
    session_start();
    // On écrase le tableau de session
    $_SESSION = array();
    // On détruit la session
    session_destroy();
    header('Location: index.php');
}