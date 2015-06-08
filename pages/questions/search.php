<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'Paginator.php');



if (!$_GET['search']) {
	$_SESSION['error_messages'][] = 'Invalid search';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}

$search = $_GET['search'];

try {
	$questions = search($search);

} catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error searching';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
$sponsoredQuestions = array();

// get all sponsored questions
foreach($questions as $question){
    if($question['priority'] != 1) {
        $allSponsoredQuestions[] = $question;
    }
}

// select random sponsored questions
if(count($allSponsoredQuestions) <= 3){
    $sponsoredQuestions = $allSponsoredQuestions;
} else {
    // generate three different random positions
    $firstRandValue = rand(0, count($allSponsoredQuestions)-1);
    $secondRandValue = rand(0, count($allSponsoredQuestions)-1);
    $thirdRandValue = rand(0, count($allSponsoredQuestions)-1);

    while($secondRandValue == $firstRandValue)
    {
        $secondRandValue = rand(0, count($allSponsoredQuestions)-1);
    }

    while($thirdRandValue == $firstRandValue || $thirdRandValue== $secondRandValue)
    {
        $thirdRandValue = rand(0, count($allSponsoredQuestions)-1);
    }
    // assign sponsored questions to show
    $sponsoredQuestions[] = $allSponsoredQuestions[$firstRandValue];
    $sponsoredQuestions[] = $allSponsoredQuestions[$secondRandValue];
    $sponsoredQuestions[] = $allSponsoredQuestions[$thirdRandValue];
}

$smarty->assign('sponsored_questions', $sponsoredQuestions);
try{
    $numberOfMessages = getUserMessages($_SESSION['user']['id']);
} catch (PDOException $e){
    error_log($exception . '\n', 3, $BASE_DIR . "/logs/log.txt");
    $_SESSION['error_messages'][] = 'Error searching';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$paginator = new Paginator($questions);

$smarty->assign('sponsored_questions', $sponsoredQuestions);
$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$smarty->assign('numberOfMessages',$numberOfMessages);

$smarty->assign('all_questions', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));
$smarty->assign('subtitle', 'Search results');

$smarty->display('questions/view_questions.tpl');

