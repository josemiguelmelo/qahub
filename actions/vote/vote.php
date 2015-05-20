<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/votes.php');

$contentId = $_POST['content_id'];
$value = $_POST['value'];

header('Content-Type: application/json');
echo json_encode(vote($contentId , $value));