<?php
include_once('../../config/init.php');

include_once($BASE_DIR .'database/questions.php');

checkIfLoggedIn();

$question_id = $_POST['question_id'];
$value = $_POST['value'];

header('Content-Type: application/json');
echo json_encode(setAsFavourite($_SESSION['user']['id'], $question_id));

