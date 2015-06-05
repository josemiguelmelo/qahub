<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

$messages = getAllMessages($_SESSION['user']['id']);

$SUCCESS_MESSAGES = $_SESSION['SUCCESS_MESSAGES'];

$smarty->assign('all_messages', $messages);
$smarty->assign('SUCCESS_MESSAGES',$SUCCESS_MESSAGES);

$_SESSION['SUCCESS_MESSAGES'] = null;

$smarty->display('users/messages.tpl');