<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('questions/manage_question.tpl');

