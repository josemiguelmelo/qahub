<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/questions.php');

$questions = getAllQuestions();

$smarty->assign('all_questions',$questions);
$smarty->assign('subtitle', 'The most popular questions right now.');

if ($_SESSION['user']['role'] == 2)
{
	$smarty->display('questions/admin_questions.tpl');
}
else
{
	$smarty->display('questions/view_questions.tpl');
}



