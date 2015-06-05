<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'database/questions.php');

$userId = $_GET['id'];

$user = getUserById($userId);
$userQuestions = getAllUserQuestions($userId);

$user['questions'] = $userQuestions;

$smarty->assign('user', $user);

$smarty->display('users/view_profile.tpl');
