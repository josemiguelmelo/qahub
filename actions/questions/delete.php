<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

checkIfLoggedIn();
checkIfAdmin();

deleteQuestion($_POST['id']);

header('Location: '.$BASE_URL.'pages/questions/view_questions.php');