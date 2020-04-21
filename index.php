<?php
require('controller/visitorAction.php');
require('controller/UserAction.php');
require('controller/managerAction.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'CGU') {
        CGU();
    }

    elseif ($_GET['action'] == 'contact') {
        contact();
    }

    elseif ($_GET['action'] == 'connect') {
        connect();
    }

    elseif ($_GET['action'] == 'register') {
        register();
    }

    elseif ($_GET['action'] == 'logout') {
        logout();
    }

    elseif ($_GET['action'] == 'userSpace') {
        userSpace();
    }

    elseif ($_GET['action'] == 'userInformations') {
        printUserInformations();
    }

    elseif ($_GET['action'] == 'makeATest') {
        makeATest();
    }

    elseif ($_GET['action'] == 'userResults') {
        userResults();
    }

    elseif ($_GET['action'] == 'userHistory') {
        userHistory();
    }

    elseif ($_GET['action'] == 'modifyUserInformations') {
        modifyUserInformations();
    }

    elseif ($_GET['action'] == 'manager') {
        managerConnect();
    }
    elseif ($_GET['action'] == 'printUsers') {
        printUsers();
    }
    elseif ($_GET['action'] == 'searchUser') {
        searchUser();
    }
    elseif ($_GET['action'] == 'deleteUser') {
        deleteUserAccount();
    }
    elseif ($_GET['action'] == 'resetPassword') {
        resetUserPassword();
    }
    elseif ($_GET['action'] == 'removeSensor') {
        deleteSensorChoice($_GET['id_sensor']);
    }
    elseif ($_GET['action'] == 'addTest') {
        addSensorChoice();
    }
    elseif ($_GET['action'] == 'listNonActivatedAccounts') {
        listNonActivatedAccounts();
    }
    elseif ($_GET['action'] == 'activateAccount') {
        activateAccount();
    }
    elseif ($_GET['action'] == 'deleteNonActivatedUser') {
        deleteNonActivatedUser($_GET['id_user']);
    }
    elseif ($_GET['action'] == 'makeManager') {
        makeManager();
    }
}
else {
    mainPage();
}