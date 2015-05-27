<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');

$users = getAllUsers();

$smarty->assign('all_users',$users);
$smarty->display('users/view_users.tpl');
