<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/users.php');

if(checkAdmin($_SESSION['user']['id'])) {
	$_SESSION['user']['role'] = 2;
}

header("Location: $BASE_URL/pages/questions/view_questions.php");
