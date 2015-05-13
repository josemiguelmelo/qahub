<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

if (!$_POST['title'] || !$_POST['question']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$title = $_POST['title'];
$question = $_POST['question'];

try {
    createQuestion($title, "", $question, 1);

} catch (PDOException $e) {
    die(var_dump($e));
    $_SESSION['error_messages'][] = 'Error adding question';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/create_question.php');
    exit;
}
$_SESSION['success_messages'][] = 'Question created successfully';
header("Location: " . $BASE_URL. 'pages/questions/view_questions.php');
?>
