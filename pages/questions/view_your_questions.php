<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'Paginator.php');

checkIfLoggedIn();

$questions = getAllUserQuestions($_SESSION['user']['id']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);


$paginator = new Paginator($questions);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('all_user_questions', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));

$smarty->display('questions/view_your_questions.tpl');


