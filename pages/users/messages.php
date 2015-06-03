<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

$messages = getAllMessages($_SESSION['user']['id']);


$smarty->assign('all_messages', $messages);
$smarty->display('users/messages.tpl');