<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

$questions = getAllQuestions();

$smarty->assign('all_questions', $questions);
$smarty->assign('subtitle', 'The most popular questions right now.');

$smarty->display('questions/view_questions.tpl');


