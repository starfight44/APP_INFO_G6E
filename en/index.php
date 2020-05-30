<?php
require('controller/visitorAction.php');
require('controller/userAction.php');
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
    elseif ($_GET['action'] == 'homeUser') {
        homeUser();
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
    elseif ($_GET['action'] == 'manageFAQ') {
        manageFAQ();
    }
    elseif ($_GET['action'] == 'deleteQuestion') {
        deleteQuestion($_GET['id_question']);
    }
    elseif ($_GET['action'] == 'addQuestion') {
        addquestion();
    }
    elseif ($_GET['action'] == 'userChat') {
        printUserChat();
    }
    elseif ($_GET['action'] == 'managerChat') {
        printManagerChat();
    }
    elseif ($_GET['action'] == 'newUserMessage') {
        newUserMessage();
    }
    elseif ($_GET['action'] == 'managerChatChoice') {
        managerChatChoice();
    }
    elseif ($_GET['action'] == 'goToChat') {
        goToChat($_GET['id_user']);
    }
    elseif ($_GET['action'] == 'newManagerMessage') {
        newManagerMessage();
    }
    elseif ($_GET['action'] == 'deleteMessages') {
        deleteMessages();
    }
    elseif ($_GET['action'] == 'numberOfVisitors') {
        numberOfVisitors();
    }
    elseif ($_GET['action'] == 'executeTest') {
        executeTest();
    }
    elseif ($_GET['action'] == 'resultDetails') {
        resultDetail($_GET['id_result']);
    }
    elseif ($_GET['action'] == 'loadTest') {
        loadTest();
    }


}
else {
    mainPage();
}