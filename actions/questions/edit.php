<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');

if (!$_POST['title'] || !$_POST['question']) {
	$_SESSION['error_messages'][] = 'Title and Question fields cannot be blank';
	$_SESSION['form_values'] = $_POST;
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}

$title = $_POST['title'];
$question = $_POST['question'];

try {
	editQuestion($title, "", $question, 1, $_POST['questionId']);
} catch (PDOException $e) {
	die(var_dump($e));
	$_SESSION['error_messages'][] = 'Error editing question';

	$_SESSION['form_values'] = $_POST;
	header("Location: $BASE_URL" . 'pages/questions/edit_question.php?id=' + $_POST['questionId']);
	exit;
}
$_SESSION['success_messages'][] = 'Question edited successfully';
header("Location: " . $BASE_URL. 'pages/questions/view_questions.php');
