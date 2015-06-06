<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');


if (!$_GET['search']) {
	$_SESSION['error_messages'][] = 'Invalid search';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}

$search = $_GET['search'];

try {
	$questions = search($search);

} catch (PDOException $e) {
	die(var_dump($e));
	header("Location: $BASE_URL");
	exit;
}

$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('all_questions', $questions);
$smarty->assign('subtitle', 'Search results');

$smarty->display('questions/view_questions.tpl');

