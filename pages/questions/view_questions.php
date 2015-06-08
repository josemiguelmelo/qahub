<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'database/questions.php');
include_once($BASE_DIR.'database/messages.php');
include_once($BASE_DIR.'database/users.php');
include_once($BASE_DIR.'Paginator.php');

$questions = getAllQuestions();
$userAdmin = checkAdmin($_SESSION['user']['id']);

$numberOfMessages = getUserMessages($_SESSION['user']['id']);
$allSponsoredQuestions = array();
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

$paginator = new Paginator($questions);

$smarty->assign('sponsored_questions', $sponsoredQuestions);
$smarty->assign('all_questions', ($_GET['limit'] && $_GET['position']) ? $paginator->getData($_GET['limit'], $_GET['position']) : $paginator->getData());
$smarty->assign('pagination_links', $paginator->createLinks(5, "pagination pagination-sm"));
$smarty->assign('subtitle', 'The most popular questions right now.');
$smarty->assign('admin',$userAdmin);
$smarty->assign('numberOfMessages',$numberOfMessages);


if ($_SESSION['user']['role'] == 2)
{
	$smarty->display('questions/admin_questions.tpl');
}
else
{
	$smarty->display('questions/view_questions.tpl');
}



