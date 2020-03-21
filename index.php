<?php
require('controller/visitorAction.php');
require('controller/UserAction.php');

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
        userInformations();
    }
    elseif ($_GET['action'] == 'makeATest') {
        makeATest();
    }
    elseif ($_GET['action'] == 'userResults') {
        userResults();
    }
    elseif ($_GET['action'] == 'userHistoric') {
        userHistoric();
    }

}
else {
    mainPage();
}