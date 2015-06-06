<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');


checkIfLoggedIn();



$questions = getFavouriteQuestionsOfUser($_SESSION['user']['id']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);


$smarty->assign('all_favourite_questions', $questions);

$smarty->display('questions/view_your_favourite_questions.tpl');


