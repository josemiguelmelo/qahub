<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/comments.php');

checkIfLoggedIn();

if (!$_POST['commentContent']) {
    $_SESSION['error_messages'][] = 'Comment required.';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$comment = $_POST['commentContent'];

try{
    if($_POST['answerId']) {
        $answerId = $_POST['answerId'];
        insertComment($comment, $answerId, 2);
    } else if($_POST['questionId']) {
        $questionId = $_POST['questionId'];
        insertComment($comment, $questionId, 1);
    }

} catch (PDOException $e) {
    die(var_dump($e));
    $_SESSION['error_messages'][] = 'Error adding comment';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/questions/view_question.php?id=' . $_POST['questionId']);
    exit;
}
$_SESSION['success_messages'][] = 'Comment added successfully';
header("Location: " . $BASE_URL. 'pages/questions/view_question.php?id=' . $_POST['questionId']);

?>