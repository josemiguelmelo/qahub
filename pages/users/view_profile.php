<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/questions.php');

$userId = $_GET['id'];

$user = getUserById($userId);
$userQuestions = getAllUserQuestions($userId);
$userBadges = getUserBadges($userId);


if( $_SESSION['user'] ) {
    $isFollowing = isFollowing($_SESSION['user']['id'], $userId);
    $user['followed'] = $isFollowing;
}
$user['questions'] = $userQuestions;
$user['badges'] = $userBadges;

$smarty->assign('user', $user);

$smarty->display('users/view_profile.tpl');
