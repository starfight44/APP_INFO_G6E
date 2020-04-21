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
    $requete = $bdd->prepare('SELECT account_type,content FROM message WHERE id_user=? ORDER BY sending_date LIMIT 10');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_ASSOC);
}
