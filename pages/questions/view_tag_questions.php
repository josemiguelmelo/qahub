<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'Paginator.php');


checkIfLoggedIn();

try{

    $questions = getTagQuestions($_GET['tag']);
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);

}catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error retrieving tag';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


$paginator = new Paginator($questions);


$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('tag_string', $_GET['tag']);

$smarty->assign('tag_questions', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));

$smarty->display('questions/view_tag_questions.tpl');