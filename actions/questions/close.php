<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');


checkIfLoggedIn();

$questionId = $_GET['id'];


try {
    closeQuestion($questionId);
} catch (PDOException $e) {
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error closing question';

    header("Location: $BASE_URL" . 'pages/questions/view_your_questions.php');
    exit;
}
$_SESSION['success_messages'][] = 'Question closed successfully';
header("Location: " . $BASE_URL. 'pages/questions/view_your_questions.php');

