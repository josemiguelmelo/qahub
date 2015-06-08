<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

checkIfAdmin();

try{
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);
}catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $numberOfMessages = 0;
}
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('questions/admin_questions.tpl');
