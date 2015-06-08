<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');

include_once($BASE_DIR.'Paginator.php');

checkIfLoggedIn();

$questions = getQuestionsByString($_POST['search']);
$userAdmin = checkAdmin($_SESSION['user']['id']);

if(!$userAdmin) {
	echo('You know you are not an admin...');
	exit();
}

$paginator = new Paginator($questions);


$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('subtitle', 'The most popular questions right now.');
$smarty->assign('admin',$userAdmin);
$smarty->assign('all_questions', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));

$smarty->display('questions/admin_questions.tpl');


