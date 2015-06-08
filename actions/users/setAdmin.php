<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

checkIfAdmin();
try{
    setUserAsAdmin($_POST['id']);
}catch (PDOException $e) {
    error_log($e . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error setting user as admin question';

    header("Location: $BASE_URL" . 'pages/users/view_users.php');
    exit;
}

header('Location: '.$BASE_URL.'pages/users/view_users.php');