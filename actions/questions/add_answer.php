<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

checkIfLoggedIn();

if (!$_POST['answerContent']) {
    $_SESSION['error_messages'][] = 'Answer required.';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$answer = $_POST['answerContent'];
$questionId = $_POST['questionId'];

try {
    insertAnswer($answer, $questionId);

} catch (PDOException $e) {
    die(var_dump($e));
    $_SESSION['error_messages'][] = 'Error adding question';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/create_question.php');
    exit;
}
$_SESSION['success_messages'][] = 'Your answer was successfully created';
header("Location: " . $BASE_URL. 'pages/questions/view_question.php?id='.$questionId);
?>
