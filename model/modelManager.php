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

function getManagerConnectionInfos($email){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT email,password,id FROM manager WHERE email= ?');
    $requete->execute(array($email));

    return $requete->fetch();
}

function getUsersList(){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT ID,pseudo,firstName,lastName,email,height,weight,sex,country,registration_date FROM users WHERE active_account=1');
    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function deleteAccount($id){
    $bdd = bddConnect();
    $requete = $bdd->prepare('DELETE FROM users WHERE ID=?');
    $requete->execute(array($id));
}

function resetPassword($id,$newPassword){
    $bdd = bddConnect();
    $requete = $bdd->prepare('UPDATE users SET password=? WHERE ID=?');
    $requete->execute(array($newPassword,$id));
}

function getNonActivatedAccounts(){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT ID,pseudo,firstName,lastName,email FROM users WHERE active_account=0 ORDER BY registration_date');
    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function activateUserAccount($id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('UPDATE users SET active_account=1 WHERE ID=?');
    $requete->execute(array($id_user));
}

function addManager($firtName,$lastName,$email,$password,$country){
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO manager (firstName,lastName,email,password,country) VALUES (?,?,?,?,?)');
    $requete->execute(array($firtName,$lastName,$email,$password,$country));
}

function getUserConnectionInfos($ID){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT password,pseudo,ID,active_account FROM users WHERE id= ?');
    $requete->execute(array($ID));

    return $requete->fetch(PDO::FETCH_ASSOC);
}


function getUserInfos($ID){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT pseudo Pseudo,lastName Nom ,firstName Prénom,email Mail,height Taille,weight Poids,sex Sexe,country Pays FROM users WHERE id=?');
    $requete->execute(array($ID));
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function getFAQ(){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT id,question,response FROM FAQ ORDER BY id DESC');
    $requete->execute(array());
    return $requete->fetchAll();
}

function deleteFAQ($id_question){
    $bdd = bddConnect();

    $requete = $bdd->prepare('DELETE FROM FAQ WHERE id=?');
    $requete->execute(array($id_question));
}

function addFAQ($question,$response){
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO FAQ (question,response)VALUES(?,?)');
    $requete->execute(array($question,$response));
}

function getActiveChats(){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT DISTINCT u.pseudo,u.email,u.ID FROM users u INNER JOIN message m ON u.ID = m.id_user');
    $requete->execute(array());
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getChatDatas($id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('SELECT account_type,content FROM message WHERE id_user=? ORDER BY sending_date DESC LIMIT 20');
    $requete->execute(array($id_user));
    return $requete->fetchALL(PDO::FETCH_ASSOC);
}

function sendMessage($message,$id_user)
{
    $bdd = bddConnect();
    $requete = $bdd->prepare('INSERT INTO message (content,sending_date,id_user,account_type)VALUES(?,NOW(),?,?)');
    $requete->execute(array($message, $id_user, 'manager'));
}

function deleteMessageDatas($id_user){
    $bdd = bddConnect();
    $requete = $bdd->prepare('DELETE FROM message WHERE id_user=?');
    $requete->execute(array($id_user));
}