<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

$question = getQuestionById($_GET['id']);

$smarty->assign('question', $question);

$smarty->display('questions/edit_question.tpl');

