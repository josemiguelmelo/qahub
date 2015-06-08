<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

try{
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);
} catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $smarty->display('errors/unexpected_error.tpl');
    exit;
}

$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('questions/manage_question.tpl');

