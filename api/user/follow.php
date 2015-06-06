<?php
include_once('../../config/init.php');

include_once($BASE_DIR .'database/users.php');

checkIfLoggedIn();

$follow = $_POST['follow'];

$followId = $_POST['user_follow_id'];
$currentUserId = $_SESSION['user']['id'];

header('Content-Type: application/json');

if($follow == 'true'){
    echo json_encode(favouriteUser($currentUserId , $followId));
}else{
    echo json_encode(unfavouriteUser($currentUserId , $followId));
}


