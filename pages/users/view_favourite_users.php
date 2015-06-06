<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');

$favouriteUsers = array();

$favouriteUsersIds = getAllFavouritesOfUser($_SESSION['user']['id']);

foreach($favouriteUsersIds as $id)
{
    $favouriteUsers[] = getUserById($id['favourite_id']);
}

$smarty->assign('favourite_users', $favouriteUsers);

$smarty->display('users/view_favourite_users.tpl');
