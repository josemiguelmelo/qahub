<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$users = getAllUsers();
$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('all_users',$users);
$smarty->display('users/view_users.tpl');
