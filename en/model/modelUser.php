<?php
function bddConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=APP_INFO;charset=utf8', 'root', 'root');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getUserConnectionInfos($pseudo){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT password,pseudo,ID,active_account FROM users WHERE pseudo= ?');
    $requete->execute(array($pseudo));

    return $requete->fetch();
}


function getUserInfos($ID){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT pseudo Pseudo,lastName Nom ,firstName Prénom,email Mail,height Taille,weight Poids,sex Sexe,country Pays FROM users WHERE ID=?');
    $requete->execute(array($ID));
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function setUserInfos($pseudo,$lastName,$firstName,$email,$password,$height,$weight,$sex,$country){
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO users(pseudo,lastName,firstName,email,password,height,weight,sex,country,registration_date) VALUES(:pseudo,:lastName,:firstName,:email,:password,:height,:weight,:sex,:country,NOW())');
    $requete->execute(array(
        'pseudo' => strtolower($pseudo),
        'lastName' => $lastName,
        'firstName' => $firstName,
        'email' => strtolower($email),
        'password' => password_hash ($password,PASSWORD_DEFAULT),
        'height' => $height,
        'weight' => $weight,
        'sex' => $sex,
        'country' => $country,
    ));
}

function updateUserInfos($lastName,$firstName,$height,$weight,$id){
    $bdd = bddConnect();
    $requete = $bdd->prepare(' UPDATE users SET lastName=:lastName,firstName=:firstName,height=:height,weight=:weight WHERE ID=:ID');
    $requete->execute(array(
        'lastName' => $lastName,
        'firstName' => $firstName,
        'height' => $height,
        'weight' => $weight,
        'ID' => $id,
    ));
}

function updatePassword($newPassword,$userID){
    $bdd = bddConnect();
    $requete = $bdd->prepare(' UPDATE users SET password= :password WHERE ID= :ID');
    $requete->execute(array(
        'password' => password_hash ($newPassword,PASSWORD_DEFAULT),
        'ID' => $userID));
}


function isUserInDatabase($pseudo,$email){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT COUNT(*) AS nbr FROM users WHERE pseudo = :pseudo OR email = :email');
    $requete->execute(array(
        'pseudo' => strtolower($pseudo),
        'email' => strtolower($email),
    ));
    $result = $requete -> fetch(PDO::FETCH_ASSOC);
    if($result['nbr'] > 0){
        return true;
    }
    else{
        return false;
    }
}

function getSensorsChoice($id_user){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT sensor.type, sensor.id FROM sensorsChoice choice INNER JOIN sensor ON choice.id_sensor = sensor.id WHERE choice.id_user=?');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_ASSOC);
}


function deleteSensor($id_user,$id_sensor){
    $bdd = bddConnect();

    $requete = $bdd->prepare('DELETE FROM sensorsChoice WHERE id_user=? AND id_sensor=?');
    $requete->execute(array($id_user,$id_sensor));
}

function addSensor($id_user,$id_sensor){
    $bdd = bddConnect();

    $requete = $bdd->prepare('INSERT INTO sensorsChoice (id_user,id_sensor) VALUES (?,?)');
    $requete->execute(array($id_user,$id_sensor));
}

function getChatDatas($id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT account_type,content FROM message WHERE id_user=? ORDER BY sending_date DESC LIMIT 20');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_ASSOC);
}

function sendMessage($message,$id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO message (content,sending_date,id_user,account_type)VALUES(?,NOW(),?,?)');
    $requete->execute(array($message,$id_user,'user'));

}

function addToResults($id_user,$cardiacFrequency=NULL,$temperature=NULL,$visualStimulus=NULL,$soundStimulus=NULL,$minFrequencyRecognition=NULL,$maxFrequencyRecognition=NULL){
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO `results` (`id`, `id_user`, `added_date`, `cardiac_frequency`, `temperature`, `visual_stimulus`, `sound_stimulus`, `min_frequency_recognition`, `max_frequency_recognition`) 
                            VALUES (NULL,?,NOW(), ?, ?, ?, ?, ?, ?)');
    $requete->execute(array($id_user,$cardiacFrequency,$temperature,$visualStimulus,$soundStimulus,$minFrequencyRecognition,$maxFrequencyRecognition));
}

function getSensorsChoiceID($id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT id_sensor FROM sensorsChoice WHERE id_user=?');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_COLUMN);
}

function getListResults($id_user){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT id,DATE_FORMAT(added_date,"%e") as day,DATE_FORMAT(added_date,"%c") as month,DATE_FORMAT(added_date,"%Y") as year,DATE_FORMAT(added_date,"%T") as hour FROM `results` WHERE `id_user` = ? ORDER BY id DESC');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_ASSOC);
}

function getResultDetails($id_result){
    $bdd = bddConnect();
    if ($id_result==-1){
        $requete = $bdd->prepare('SELECT id,DATE_FORMAT(added_date,"%e") as day,DATE_FORMAT(added_date,"%c") as month,DATE_FORMAT(added_date,"%Y") as year,DATE_FORMAT(added_date,"%T") as hour,
                                        cardiac_frequency, temperature,visual_stimulus,sound_stimulus,min_frequency_recognition,max_frequency_recognition FROM `results` ORDER BY id DESC LIMIT 1');
        $requete->execute(array());
    }
    else{$requete = $bdd->prepare('SELECT id,DATE_FORMAT(added_date,"%e") as day,DATE_FORMAT(added_date,"%c") as month,DATE_FORMAT(added_date,"%Y") as year,DATE_FORMAT(added_date,"%T") as hour,
                                        cardiac_frequency, temperature,visual_stimulus,sound_stimulus,min_frequency_recognition,max_frequency_recognition FROM `results` WHERE `id` = ?');
        $requete->execute(array($id_result));
    }

    return $requete->fetch(PDO::FETCH_ASSOC);
}

function getAverageResult($id_user,$sensor){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT AVG('.$sensor.') as average FROM results WHERE id_user=?');
    $requete->execute(array($id_user));
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function updateManagerPassword($newPassword, $mail){
    $bdd = bddConnect();
    $requete = $bdd->prepare('UPDATE manager SET password=? WHERE email=?');
    $requete->execute(array(password_hash($newPassword,PASSWORD_DEFAULT),$mail));
}