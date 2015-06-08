<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');


try{
    $question = getQuestionById($_GET['id']);
    $favourite = isFavouriteQuestionOfUser($_SESSION['user']['id'], $question['question']['questionid']);
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);
}catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error getting question';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('question', $question);
$smarty->assign('favourite', $favourite);

$smarty->display('questions/view_question.tpl');

