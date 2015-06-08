<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$userAdmin = checkAdmin($_SESSION['user']['id']);
if(!$userAdmin) {
	echo('You know you are not an admin...');
	exit();
}

$users = getUsersByString($_POST['search']);

$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('admin',$userAdmin);
$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('all_users',$users);
$smarty->display('users/view_users.tpl');


