<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/messages.php');

$contentId = $_POST['content_id'];

header('Content-Type: application/json');
echo json_encode(deleteMessage($contentId));