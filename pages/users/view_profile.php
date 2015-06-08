<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');

checkIfLoggedIn();

$userId = $_GET['id'];

try{
    $user = getUserById($userId);
    $userQuestions = getAllUserQuestions($userId);
    $userBadges = getUserBadges($userId);
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);


    if( $_SESSION['user'] ) {
        $isFollowing = isFavourite($_SESSION['user']['id'], $userId);
        $user['followed'] = $isFollowing;
    }

}catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error retrieving user info';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


$user['questions'] = $userQuestions;
$user['badges'] = $userBadges;

$smarty->assign('user', $user);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->display('users/view_profile.tpl');
