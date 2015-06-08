<?php

include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

checkIfLoggedIn();

if (!$_POST['name'] || !$_POST['email'] || !$_POST['email_confirmation']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
    exit;
}

$name = strip_tags($_POST['name']);
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$email = $_POST['email'];
$email_confirmation = $_POST['email_confirmation'];

if ($password != $password_confirmation) {
    $_SESSION['error_messages'][] = 'Password and password confirmation are not equal.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
    exit;
}

// check if password different from last 3 passwords
if($password != "")
{
    try{

        $lastThreePasswords = getLastThreePasswords($_SESSION['user']['id']);
    }catch (PDOException $e) {
        error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
        $_SESSION['error_messages'][] = 'Error changing password';

        header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
        exit;
    }

    foreach($lastThreePasswords as $lastPassword){
        if($lastPassword['password'] == sha1($password)){
            $_SESSION['error_messages'][] = 'Password must be different from last 3 passwords.';
            $_SESSION['form_values'] = $_POST;
            header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
            exit;
        }
    }
}

if ($email != $email_confirmation) {
    $_SESSION['error_messages'][] = 'Email and email confirmation are not equal.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
    exit;
}


/** IMGUR avatar image upload */
$img = $_FILES["avatar"];
$imageURL = "";

if($img['name']!='') {
    $filename = $img['tmp_name'];
    $client_id = "2bcb963ff23fe19";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close($curl);
    $pms = json_decode($out, true);
    $imageURL = $pms['data']['link'];
    if ($imageURL != "") {

    } else {
        $_SESSION['error_messages'][] = 'Error upload image.';
    }
}

$avatar = $imageURL;

try {
    $userId = $_SESSION['user']['id'];
    updateUser($userId, $name, $email, $password, $avatar);

} catch (PDOException $e) {

    if (strpos($e->getMessage(), 'users_pkey') !== false) {
        $_SESSION['error_messages'][] = 'Duplicate email';
        $_SESSION['field_errors']['email'] = 'Email already exists';
    }
    else $_SESSION['error_messages'][] = 'Error updating user';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/edit_profile.php');
    exit;
}

try{
    if($password != "")
    {
        addPasswordToHistory($_SESSION['user']['id'], $password);
    }
} catch (PDOException $e) {
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
}


    $_SESSION['user'] = getUserById($userId);

$_SESSION['success_messages'][] = 'User profile updated successfully';
header("Location: $BASE_URL" . 'pages/users/edit_profile.php');