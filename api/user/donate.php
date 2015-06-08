<?php
include_once('../../config/init.php');

include_once($BASE_DIR .'database/users.php');

checkIfLoggedIn();

$toId = $_POST['to_id'];
$amount = $_POST['amount'] * 100;
$currentUserId = $_SESSION['user']['id'];

header('Content-Type: application/json');

if($toId == $currentUserId)
{
    echo json_encode(['error'=>true, 'type'=>'NVD', 'msg'=>'Cannot donate to your own account.']);
    exit;
}


if( ($_SESSION['user']['cash'] - $amount) < 0){
    echo json_encode(['error' => true, 'type'=>'IF', 'msg' => 'Insufficient funds.']);
    exit;
}


echo json_encode(donateToUser($currentUserId , $toId , $amount));
$_SESSION['user']['cash'] = $_SESSION['user']['cash'] - $amount;


