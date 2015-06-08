<?php

include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');


function generateRandomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if ( ! $_POST['email'] )
{
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['oldinput']      = $_POST;
    header("Location: $BASE_URL".'pages/users/recovery_password.php');
    exit;
}

$email = $_POST['email'];
$password = generateRandomPassword();

$hashedPassword = sha1($password);


try
{
    updatePassword($email, $hashedPassword);

    $to = $email;

    $subject = 'QAHub - Password Reset';

    $headers = "From: qahub@fe.up.pt\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $msg = 'Your password has been reset successfully.<br><br>';
    $msg = $msg . '<span style="color: green;">Your new password: </span> '. $password . "<br><br>";
    $msg = $msg . '<a href="http://gnomo.fe.up.pt/~lbaw1461/melo/pages/users/login.php">Login now!</a>';

    mail($to, $subject, $msg, $headers);
}
catch (PDOException $e)
{

    if (strpos($e->getMessage(), 'users_pkey') !== false)
    {
        $_SESSION['error_messages'][]         = 'Password could not be updated.';
    }
    else
    {
        $_SESSION['error_messages'][] = 'Error updating password';
    }

    $_SESSION['oldinput'] = $_POST;
    header("Location: $BASE_URL".'pages/users/recovery_password.php');
    exit;
}

try{
    $user = getUserByEmail($email);
    addPasswordToHistory($user['id'], $password);
} catch( PDOException $e) {
    error_log($e . '\n', 3, $BASE_DIR . "/logs/log.txt");
}

$_SESSION['success_messages'][] = 'User password reset successfully';
header("Location: $BASE_URL" . 'pages/users/login.php');
?>
