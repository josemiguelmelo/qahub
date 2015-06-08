<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

checkIfAdmin();

$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('questions/admin_questions.tpl');
