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
    $requete = $bdd->prepare('SELECT ID,pseudo,firstName,lastName,email,height,weight,sex,country,registration_date FROM users');
    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}