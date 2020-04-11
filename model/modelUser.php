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
    $requete = $bdd->prepare('SELECT password,pseudo,ID FROM users WHERE pseudo= ?');
    $requete->execute(array($pseudo));

    return $requete->fetch();
}


function getUserInfos($ID){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT pseudo Pseudo,lastName Nom ,firstName Prénom,email Mail,height Taille,weight Poids,sex Sexe,country Pays FROM users WHERE id=?');
    $requete->execute(array($ID));
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function setUserInfos($pseudo,$lastName,$firstName,$email,$password,$height,$weight,$sex,$country){
    $bdd = bddConnect();

    $requete = $bdd->prepare('INSERT INTO users(pseudo,lastName,firstName,email,password,height,weight,sex,country,date_inscription) VALUES(:pseudo,:lastName,:firstName,:email,:password,:height,:weight,:sex,:country,NOW())');
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

function updateUserInfos($lastName,$firstName,$height,$weight,$userID){
    $bdd = bddConnect();
    $requete = $bdd->prepare(' UPDATE users SET lastName=:lastName,firstName=:firstName,height=:height,weight=:weight WHERE ID=:ID');
    $requete->execute(array(
        'lastName' => $lastName,
        'firstName' => $firstName,
        'height' => $height,
        'weight' => $weight,
        'ID' => $userID,
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