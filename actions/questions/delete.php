<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

checkIfLoggedIn();
checkIfAdmin();

try{
    deleteQuestion($_POST['id']);
}catch (PDOException $e){
    $_SESSION['error_messages'][] = 'Error deleting question';

    header("Location: $BASE_URL" . 'pages/questions/view_questions.php');
    exit;
}

header('Location: '.$BASE_URL.'pages/questions/view_questions.php');