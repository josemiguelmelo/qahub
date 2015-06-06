<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$favouriteUsers = array();

$favouriteUsersIds = getAllFavouritesOfUser($_SESSION['user']['id']);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);

foreach($favouriteUsersIds as $id)
{
    $favouriteUsers[] = getUserById($id['favourite_id']);
}

$smarty->assign('favourite_users', $favouriteUsers);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('users/view_favourite_users.tpl');
