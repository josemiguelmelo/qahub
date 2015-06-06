<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');


checkIfLoggedIn();

$questions = getTagQuestions($_GET['tag']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('tag_string', $_GET['tag']);
$smarty->assign('tag_questions', $questions);

$smarty->display('questions/view_tag_questions.tpl');