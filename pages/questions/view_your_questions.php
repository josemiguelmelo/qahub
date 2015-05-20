<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

$questions = getAllUserQuestions($_SESSION['user']['id']);

$smarty->assign('all_user_questions', $questions);

$smarty->display('questions/view_your_questions.tpl');


