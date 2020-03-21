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
    $requete = $bdd->prepare('SELECT mot_de_passe,pseudo,ID FROM utilisateurs WHERE pseudo= ?');
    $requete->execute(array($pseudo));

    return $requete->fetch();
}


function getUserInfos($ID){
    $bdd = bddConnect();

    $requete = $bdd->prepare('SELECT pseudo Pseudo,nom Nom ,prenom Prénom,email eMail,taille Taille,poids Poids,sexe Sexe,pays Pays FROM utilisateurs WHERE id=?');
    $requete->execute(array($ID));
    return $requete->fetch(PDO::FETCH_ASSOC);;
}

function setUserInfos($pseudo,$nom,$prenom,$email,$mot_de_passe,$taille,$poids,$sexe,$pays){
    $bdd = bddConnect();


    $requete = $bdd->prepare('INSERT INTO utilisateurs(pseudo,nom,prenom,email,mot_de_passe,taille,poids,sexe,pays,date_inscription) VALUES(:pseudo,:nom,:prenom,:email,:mot_de_passe,:taille,:poids,:sexe,:pays,NOW())');
    $requete->execute(array(
        'pseudo' => $pseudo,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'mot_de_passe' => password_hash($mot_de_passe, PASSWORD_DEFAULT),
        'taille' => $taille,
        'poids' => $poids,
        'sexe' => $sexe,
        'pays' => $pays,
    ));
}