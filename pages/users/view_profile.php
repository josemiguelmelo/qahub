<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$userId = $_GET['id'];

$user = getUserById($userId);
$userQuestions = getAllUserQuestions($userId);
$userBadges = getUserBadges($userId);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);


if( $_SESSION['user'] ) {
    $isFollowing = isFavourite($_SESSION['user']['id'], $userId);
    $user['followed'] = $isFollowing;
}
$user['questions'] = $userQuestions;
$user['badges'] = $userBadges;

$smarty->assign('user', $user);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('users/view_profile.tpl');
