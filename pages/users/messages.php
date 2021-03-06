<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'Paginator.php');

try{

    $messages = getAllMessages($_SESSION['user']['id']);
}catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error retrieving messages';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$SUCCESS_MESSAGES = $_SESSION['SUCCESS_MESSAGES'];

checkIfLoggedIn();


$paginator = new Paginator($messages);


$smarty->assign('SUCCESS_MESSAGES',$SUCCESS_MESSAGES);

$smarty->assign('all_messages', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));

$_SESSION['SUCCESS_MESSAGES'] = null;

$smarty->display('users/messages.tpl');