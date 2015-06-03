<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');


$question = getQuestionById($_GET['id']);
$favourite = isFavouriteQuestionOfUser($_SESSION['user']['id'], $question['question']['questionid']);


$smarty->assign('question', $question);
$smarty->assign('favourite', $favourite);

$smarty->display('questions/view_question.tpl');

