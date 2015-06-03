<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

$message = $_POST;

header('Content-Type: application/json');
echo json_encode(createMessage($message));