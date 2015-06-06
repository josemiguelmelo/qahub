<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();
if(!checkIfQuestionCreator($_SESSION['user']['id'],$_GET['id'])) {
	header("Location: " . $BASE_URL. 'pages/questions/view_your_questions.php');
	}

$question = getQuestionById($_GET['id']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('question', $question);

$smarty->display('questions/edit_question.tpl');

