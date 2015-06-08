<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'Paginator.php');

checkIfLoggedIn();

$users = getAllUsers();
$numberOfMessages = getUserMessages($_SESSION['user']['id']);

$paginator = new Paginator($users);


$smarty->assign('numberOfMessages',$numberOfMessages);
$smarty->assign('all_users', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));

$smarty->display('users/view_users.tpl');
