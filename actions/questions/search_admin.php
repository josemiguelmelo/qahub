<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');


checkIfLoggedIn();

$questions = getQuestionsByString($_POST['search']);

$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('all_questions',$questions);
$smarty->assign('subtitle', 'The most popular questions right now.');
$smarty->assign('admin',$userAdmin);

$smarty->display('questions/admin_questions.tpl');


