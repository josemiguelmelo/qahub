<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');

if ( ! $_POST['email'] || ! $_POST['password'])
{
	$_SESSION['error_messages'][] = 'Invalid login';
	$_SESSION['oldinput']      = $_POST;
	header("Location: ".$BASE_URL.'pages/users/login.php');
	exit;
}

$email    = $_POST['email'];
$password = $_POST['password'];

if ($user = isLoginCorrect($email, $password))
{
	$_SESSION['user']               = $user;
	$_SESSION['success_messages'][] = 'Login successful';
}
else
{
	$_SESSION['oldinput']      = $_POST;
	$_SESSION['error_messages'][] = 'Login failed';
	header("Location: ".$BASE_URL.'pages/users/login.php');
	exit;
}

header('Location: '.$BASE_URL.'pages/questions/view_questions.php');
?>
