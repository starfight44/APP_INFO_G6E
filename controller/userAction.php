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
                        updateManagerPassword($_POST['newPassword'], $userDatas['Mail']);
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
        require('model/modelUser.php');
        $averagecCardiacFrequency = round(getAverageResult($_SESSION['ID'],'cardiac_frequency')['average'],'0');
        $averageTemperture = round(getAverageResult($_SESSION['ID'],'temperature')['average'],'1');
        $averageVisualStimulus = round(getAverageResult($_SESSION['ID'],'visual_stimulus')['average'],'0');
        $averageSoundStimulus = round(getAverageResult($_SESSION['ID'],'sound_stimulus')['average'],'0');
        $averageMinFrequency = round(getAverageResult($_SESSION['ID'],'min_frequency_recognition')['average'],'0');
        $averageMaxFrequency = round(getAverageResult($_SESSION['ID'],'max_frequency_recognition')['average'],'0');
        require('view/resultsView.php');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}


function userHistory(){
    if(isLoginOk()){
            require('model/modelUser.php');
            $donnees = getListResults($_SESSION['ID']);
            if(count($donnees)==0){
                $resultList = '<strong><p>Vous n\'avez réalisé aucun test, rendez vous dans la rubrique test !</p></strong>';
            }
            else{
                ob_start();
                echo '<tr>
                   
                    <th>Date</th>
                    <th>Heure</th>
                </tr>';
                $test_nb=0;
                foreach ($donnees as $elt) {
                    $test_nb ++;
                    echo '<tr>
                  
                    <td>' . $elt['day'].'/'.$elt['month'].'/'.$elt['year'] . '</td> 
                    <td>' . $elt['hour'] . '</td> 
  
                    <td><a href="index.php?action=resultDetails&id_result='.$elt['id'].'"><input type="button" value="Informations"></a></td>                 
                 </tr>';
                }
                $resultList  = ob_get_clean();
            }
            require('view/historyView.php');
        }
        else{
            $warning_message = 'Reconnectez vous';
            require('view/connectView.php');
        }

    }

function resultDetail($id_result){
    if(isLoginOk()){
        require('model/modelUser.php');
        $donnees=getResultDetails($id_result);
        $title = 'Résultat du '. $donnees['day'].'/'.$donnees['month'].'/'.$donnees['year'] .' à ' . $donnees['hour'] .'  ';

        $cardiac_frequency = $donnees['cardiac_frequency'];
        $temperature = $donnees['temperature'];
        $visual_stimulus = $donnees['visual_stimulus'];
        $sound_stimulus = $donnees['sound_stimulus'];
        $min_frequency_recognition = $donnees['min_frequency_recognition'];
        $max_frequency_recognition = $donnees['max_frequency_recognition'];
        require('view/resultDetailsView.php');
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
        in_array(1,getSensorsChoiceID($_SESSION['ID'])) ? $cardiacFrequency=rand ( 100 , 200 ) : $cardiacFrequency=null ;
        in_array(2,getSensorsChoiceID($_SESSION['ID'])) ? $temperature = (rand ( 350 , 400))/10 : $temperature = null;
        in_array(3,getSensorsChoiceID($_SESSION['ID'])) ? $visualStimulus=rand ( 200 , 300): $visualStimulus =null;
        in_array(4,getSensorsChoiceID($_SESSION['ID'])) ? $soundStimulus = rand ( 200 , 300) : $soundStimulus =null;
        if(in_array(5,getSensorsChoiceID($_SESSION['ID']))){
            $minFrequencyRecognition=rand ( 20 , 5000 );
            $maxFrequencyRecognition=rand ( 15000 , 2000 );
        }
        else{
            $minFrequencyRecognition=null;
            $maxFrequencyRecognition=null;
        }

        addToResults($_SESSION['ID'],$cardiacFrequency,$temperature,$visualStimulus,$soundStimulus,$minFrequencyRecognition,$maxFrequencyRecognition);
        header('Location:index.php?action=loadTest');
    }
    else{
        $warning_message = 'Reconnectez vous';
        require('view/connectView.php');
    }
}

function loadTest(){
    if(isLoginOk()){
        require ('view/executingTestView.php');
}else{
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