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


}
else {
    mainPage();
}