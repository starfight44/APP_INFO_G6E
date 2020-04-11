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