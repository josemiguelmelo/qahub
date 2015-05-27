<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');

if ( ! $_POST['username'] || ! $_POST['email'] || ! $_POST['password'])
{
	$_SESSION['error_messages'][] = 'All fields are mandatory';
	$_SESSION['oldinput']      = $_POST;
	header("Location: $BASE_URL".'pages/users/register.php');
	exit;
}

$username = strip_tags($_POST['username']);
$password = $_POST['password'];
$email    = $_POST['email'];

try
{
	createUser($username, $email, $password);

}
catch (PDOException $e)
{

	if (strpos($e->getMessage(), 'users_pkey') !== false)
	{
		$_SESSION['error_messages'][]         = 'Duplicate username';
		$_SESSION['field_errors']['username'] = 'Username already exists';
	}
	else
	{
		$_SESSION['error_messages'][] = 'Error creating user';
	}

	$_SESSION['oldinput'] = $_POST;
	header("Location: $BASE_URL".'pages/users/register.php');
	exit;
}
$_SESSION['success_messages'][] = 'User registered successfully';
header("Location: $BASE_URL");
?>
