<?php
include_once('../../config/init.php');

include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR .'database/users.php');

checkIfLoggedIn();

$currentUser = $_SESSION['user'];
$questionId = $_POST['question_id'];
$promotePrice = 1 * 100;

if($currentUser['cash'] - $promotePrice < 0){
    echo json_encode(['error'=>true, 'type' => 'IF', 'msg' => 'Insufficient fund.']);
    exit;
}

header('Content-Type: application/json');
try{
    removeAmount($currentUser['id'], $promotePrice);
}catch (Exception $e){
    echo json_encode(['error'=>true, 'type' => 'IF', 'msg' => 'Insufficient fund.']);
    exit;
}
try {
    promoteQuestion($questionId);
} catch(Exception $e){
    echo json_encode(['error'=>true, 'type' => 'PQ', 'msg' => 'Error updating question priority.']);
    addAmount($currentUser['id'], $promotePrice);
    exit;
}

$_SESSION['user']['cash'] = $_SESSION['user']['cash'] - $promotePrice;
echo json_encode(['error'=>false]);

