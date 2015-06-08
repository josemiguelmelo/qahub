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
try{

    $users = getUsersByString($_POST['search']);
}catch (PDOException $e) {
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error searching user';

    header("Location: $BASE_URL" . 'pages/users/view_users.php');
    exit;
}

$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$smarty->assign('admin',$userAdmin);
$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('all_users',$users);
$smarty->display('users/view_users.tpl');


