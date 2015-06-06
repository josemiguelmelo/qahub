<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');



$question = getQuestionById($_GET['id']);
$favourite = isFavouriteQuestionOfUser($_SESSION['user']['id'], $question['question']['questionid']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('question', $question);
$smarty->assign('favourite', $favourite);

$smarty->display('questions/view_question.tpl');

