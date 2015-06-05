<?php
include_once('../../config/init.php');

$_SESSION['user']['role'] = 1;

header("Location: $BASE_URL/pages/questions/view_questions.php");