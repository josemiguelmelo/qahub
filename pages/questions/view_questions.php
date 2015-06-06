<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'database/users.php');




$questions = getAllQuestions();
$userAdmin = checkAdmin($_SESSION['user']['id']);

$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('all_questions',$questions);
$smarty->assign('subtitle', 'The most popular questions right now.');
$smarty->assign('admin',$userAdmin);
$smarty->assign('numberOfMessages',$numberOfMessages);


if ($_SESSION['user']['role'] == 2)
{
	$smarty->display('questions/admin_questions.tpl');
}
else
{
	$smarty->display('questions/view_questions.tpl');
}



