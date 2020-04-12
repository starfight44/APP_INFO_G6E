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
            $content = '<section><strong>Bonjour, vous êtes bien connecté sur votre compte manager !</strong></section>';
            require('view/managerSpaceView.php');
        }
        else
        {
            $warning_message='email ou mot de passe incorrect';
            require('view/managerConnectView.php');
        }
    }
}


function printUsers(){
    if(isManagerLog()){
        require('model/modelManager.php');
        $donnees = getUsersList();
        ob_start();
        echo '<section>
                   <h3>liste des utilisateurs</h3>
                   <article>
                   <table>
                           <tr>
                               <th>ID</th>
                               <th>Pseudo</th>
                               <th>Prénom</th>
                               <th>Nom</th>
                               <th>Email</th>
                               <th>Taille</th>
                               <th>Poids</th>
                               <th>Sexe</th>
                               <th>Pays</th>
                               <th>Date d\'inscritpion</th>
                           </tr>';
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

        echo '</table>
                </article>
                </section>';
        $content = ob_get_clean();
        require('view/managerSpaceView.php');
    }
    else{
            $warning_message = 'Reconnectez vous';
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