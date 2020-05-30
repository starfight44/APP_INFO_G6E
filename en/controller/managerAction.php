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
            header('Location:index.php?action=printUsers');
        }
        else
        {
            $warning_message='Incorrect email or password';
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
            $warning_message = 'Reconnect';
            require('view/managerConnectView.php');
        }
}

function searchUser(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $donnees = getUserInfosByPseudo($_POST['pseudo']);
        if(isset($donnees['Pseudo'])){
            ob_start();

            foreach($donnees as $key => $value) {
                echo '<td>'. $value .'</td>';
            }

            $userInformations = ob_get_clean();

            $_SESSION['idUser'] = $donnees['id_user'];
            require('view/managerModifyUserView.php');
        }
        else{
            $warning_message=urlencode('user not found, please enter a valid username');
            $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
            header($url);
        }
    }
    else{
            $warning_message = 'Reconnect';
            require('view/managerConnectView.php');
        }
    }

function deleteUserAccount(){
    if(isManagerLog()) {
        require("model/modelManager.php");
        deleteAccount($_SESSION['idUser']);
        $warning_message=urlencode('Profile successfully deleted');
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }
else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function resetUserPassword(){
    if(isManagerLog()) {
        require("model/modelManager.php");
        require("controller/mail.php");
        $newPassword = generate_password();
        $subject="Reset your Infinite Measures password";
        $body="
        Hello,<br>
        following your request, your password for accessing your Infinite Measures account has been changed.
        <br>
        <br>
        <strong>New Password : </strong>".$newPassword." 
        <br>
        <br>
        cordially,<br>
        Infinite Measures";
        sendMail(getUserInfos($_SESSION['idUser'])['Mail'],$subject,$body);

        $warning_message=urlencode('New password linked to user ID ').$_SESSION['idUser'].' well reseted';
        $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
        resetPassword($_SESSION['idUser'],$newPassword);
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function listNonActivatedAccounts(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $donnees = getNonActivatedAccounts();
       if(count($donnees)==0){
           $listUsers = '<strong><p>There are no accounts to validate</p></strong>';
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
                    <td><a href="index.php?action=activateAccount&id_user=' . $elt['ID'] . '"><input type="button" value="Activate account"></a></td>
                    <td><a href="index.php?action=deleteNonActivatedUser&id_user=' . $elt['ID'] . '"><input type="button" value="Delete account" onclick="return(confirm(\'Are you sure you want to delete the account ?\'))"></a></td>

                 </tr>';
        }
        $listUsers = ob_get_clean();
    }
        require('view/managerListNonActivatedUsersView.php');
    }else{
        $warning_message = 'Reconnect';
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
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function activateAccount(){
    if(isManagerLog()) {
        $id_user = $_GET['id_user'];
        require('model/modelManager.php');
        require('controller/mail.php');
        activateUserAccount($id_user);
        $donnees = getUserInfos($id_user);
        $subject="Your Infinite Measures account is activated !";
        $body="
        Hello ".$donnees['Pseudo'].", <br>
        Your Infinite Measures account is finally activated! <br>
        Go to the Infinite Measures website to access your personal space.
        <br>
        <br>
        cordially,<br>
        The Infinite Measures team";
        sendMail($donnees['Mail'],$subject,$body);
        header('Location:index.php?action=listNonActivatedAccounts');

    }else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function makeManager(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $userInfos=getUserInfos($_SESSION['idUser']);
        $userConnectionInfos=getUserConnectionInfos($_SESSION['idUser']);
        addManager($userInfos['Nom'],$userInfos['Prénom'],$userInfos['Mail'],$userConnectionInfos['password'],$userInfos['Pays']);
        $warning_message=urlencode('Manager account created successfully');
        $url = 'Location:index.php?action=printUsers&message=' . $warning_message;
        header($url);
    }else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function manageFAQ(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $donnees = getFAQ();
        if (count($donnees) == 0) {
            $FAQ = '<strong><p>There are no questions in the FAQ </p></strong>';
        } else {
            ob_start();
            echo '<tr>                 
                    <th>Question</th>
                    <th>Response</th>
                </tr>';
            foreach ($donnees as $elt) {
                echo '<tr>
                    <td>' . $elt['question'] . '</td> 
                    <td>' . $elt['response'] . '</td>                   
                    <td><a href="index.php?action=deleteQuestion&id_question=' . $elt['id'] . '"><input type="button" value="Delete question"></a></td>                 
                 </tr>';
            }
        }
        $FAQ = ob_get_clean();
        require('view/managerFAQ.php');

    }
    else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function deleteQuestion($id_question){
    require('model/modelManager.php');
    deleteFAQ($id_question);
    header('Location: index.php?action=manageFAQ');
}

function addQuestion(){
    require('model/modelManager.php');
    addFAQ(htmlspecialchars($_POST['question']),htmlspecialchars($_POST['response']));
    header('Location: index.php?action=manageFAQ');
}

function managerChatChoice(){
    if(isManagerLog()) {
        require('model/modelManager.php');
        $donnees = getActiveChats();
        if(count($donnees)==0){
            $userChatList = '<strong><p>There are no active chats</p></strong>';
        }
        else{
            ob_start();
            echo '<tr>
                    <th>Id</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                </tr>';
            foreach ($donnees as $elt) {
                echo '<tr>
                    <td>' . $elt['ID'] . '</td> 
                    <td>' . $elt['pseudo'] . '</td> 
                    <td>' . $elt['email'] . '</td>                 
                    <td><a href="index.php?action=goToChat&id_user=' . $elt['ID'] . '"><input type="button" value="See the chat"></a></td>                 
                 </tr>';
            }
            $userChatList = ob_get_clean();
        }
        require('view/managerChatChoice.php');
    }
    else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}


function goToChat($id_user){
    if(isManagerLog()) {
        $_SESSION['id_user'] = $id_user;
        require('model/modelManager.php');
        $donnees = getChatDatas($id_user);
        ob_start();
        foreach($donnees as $elt) {
            echo '<h4';
            if($elt['account_type']=='manager'){echo ' id="manager">Manager';}else{echo ' id=user>User';}
            echo '</h4>
                    <p id="content">'.$elt['content'].'</p>';
        }
        $chatDatas = ob_get_clean();
        require('view/managerChatView.php');
    }
    else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function newManagerMessage(){
    if(isManagerLog()){
        require('model/modelManager.php');
        sendMessage($_POST['message'],$_SESSION['id_user']);
        $url = 'Location:index.php?action=goToChat&id_user='.$_SESSION['id_user'];
        header($url);
    }
    else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}

function deleteMessages(){
    if(isManagerLog()){
        require('model/modelManager.php');
        deleteMessageDatas($_SESSION['id_user']);
        header('Location:index.php?action=managerChatChoice');
    }
    else{
        $warning_message = 'Reconnect';
        require('view/managerConnectView.php');
    }
}


function numberOfVisitors(){
    if(isManagerLog()){
        require('model/modelManager.php');
        $nbOfLogPerDay = array();
        for($day = 0 ; $day <= 6; $day++){
            array_push($nbOfLogPerDay,getNumberOfLogsPerDay($day)['tot']);
        }

        $menProportion = getProportion('Homme')['percentage'];
        $womenProportion = getProportion('Femme')['percentage'];
        require('view/managerVisitorsDatasView.php');
 }
else{
    $warning_message = 'Reconnect';
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

function generate_password($password_lenght = 7)
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