<?php
include_once($BASE_DIR.'database/users.php');
/** Question -> 1
 * Answer -> 2
 * Comment -> 3
 * */
function createQuestion($title, $tags, $question, $priority)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO question (title,content,priority) VALUES (?, ?, ?)");
    $stmt->execute(array($title, $question, $priority));

    $stmt = $conn->prepare("SELECT MAX(id) as id FROM question");
    $stmt->execute();

    $questionId = $stmt->fetch()['id'];

    $created_when = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO content (user_id, created_when, table_id, content_type) VALUES (?, ?, ?,?) RETURNING id");
    $stmt->execute(array($_SESSION['user']['id'], $created_when, $questionId, 1));
    $content_id = $stmt->fetch()['id'];
    //add tags
    $tags_array = explode(",", $tags);

    foreach ($tags_array as $tag) {
        $tag_id = insertTag($tag);
        insertQuestionTag($content_id,$tag_id);
    }

    addUserBadges($_SESSION['user']['id']);

}

function addUserBadges($user_id) {
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(id) as question_count FROM content WHERE content.content_type = 1 AND content.user_id = ?");
    $stmt->execute(array($user_id));
    $question_count = $stmt->fetch()['question_count'];

    if($question_count == 3) {
        $stmt = $conn->prepare("INSERT INTO userbadges (user_id,badge_id) VALUES(?,?)");
        $stmt->execute(array($user_id,1));
        $amount = addReward($user_id,1);
        $_SESSION['user']['cash'] = $_SESSION['user']['cash'] + $amount;
    }

}

function insertQuestionTag($questionId, $tag_id) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO contenttag (content_id, tag_id) VALUES (?, ?)");
    $stmt->execute(array($questionId, $tag_id));
}

function insertTag($tag)
{
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM tag WHERE name = ?");
    $stmt->execute(array($tag));

    $tag_id = $stmt->fetch();

    if(!$tag_id) {
        $stmt = $conn->prepare("INSERT INTO tag (name) VALUES (?) RETURNING id");
        $stmt->execute(array($tag));
        $tag_id = $stmt->fetch();
    }

    return $tag_id['id'];

}

function getContentIdOfQuestion($question_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM content WHERE table_id = ?");
    $stmt->execute(array($question_id));
    $content_id = $stmt->fetch()['id'];

    return $content_id;

}

function editQuestion($title, $tags, $question, $priority, $id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM content WHERE table_id = ?");
    $stmt->execute(array($id));
    $content_id = $stmt->fetch()['id'];

    removeQuestionTags($content_id);

    //add tags
    $tags_array = explode(",", $tags);

    foreach ($tags_array as $tag) {
        $tag_id = insertTag($tag);
        insertQuestionTag($content_id,$tag_id);
    }

    $stmt = $conn->prepare("UPDATE question SET title = ?,content = ?,priority = ? WHERE question.id = $id");
    $stmt->execute(array($title, $question, $priority));

}

function removeQuestionTags($id) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM contenttag WHERE content_id = ?");
    $stmt->execute(array($id));
}


function deleteAllRepliesFromQuestion($question_id)
{
    global $conn;

    $contentId = getContentIdOfQuestion($question_id);

    $stmt = $conn->prepare("DELETE FROM reply WHERE content_id = ?");
    $stmt->execute(array($contentId));
}

function deleteQuestion($id)
{
    global $conn;

    removeQuestionTags($id);

    deleteAllRepliesFromQuestion($id);

    removeAllFavouriteQuestionWithId($id);

    $stmt = $conn->prepare("DELETE FROM Content where content_type = 1 AND table_id = ?");
    $stmt->execute(array($id));

    $stmt = $conn->prepare("DELETE FROM Question where id = ? ");
    $stmt->execute(array($id));
}

function insertAnswer($content, $questionId)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO answer (content) VALUES (?)");
    $stmt->execute(array($content));


    $stmt = $conn->prepare("SELECT MAX(id) as id FROM answer");
    $stmt->execute();

    $answerId = $stmt->fetch()['id'];

    $created_when = date("Y-m-d H:i:s");


    $stmt = $conn->prepare("INSERT INTO content (user_id, created_when, table_id, content_type) VALUES (?, ?, ?,?)");
    $stmt->execute(array($_SESSION['user']['id'], $created_when, $answerId, 2));


    $stmt = $conn->prepare("SELECT MAX(id) as id FROM content");
    $stmt->execute();

    $contentReplyId = $stmt->fetch()['id'];


    $stmt = $conn->prepare("SELECT id FROM content WHERE table_id = ? and content_type=1");
    $stmt->execute(array($questionId));
    $contentId = $stmt->fetch();


    $stmt = $conn->prepare("INSERT INTO reply (content_id, reply_id) VALUES (?, ?)");
    $stmt->execute(array($contentId['id'], $contentReplyId));

}

function getAllQuestions()
{
    global $conn;
    $stmt = $conn->prepare("SELECT content.created_when, question.id, question.title, question.content, question.priority FROM content, question WHERE content.content_type = 1 AND content.table_id = question.id ORDER BY question.id DESC");
    $stmt->execute();
    return $stmt->fetchAll();

}

function getAllUserQuestions($user_id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT content.created_when, question.id, question.title, question.content, question.priority, question.closed
                            FROM content, question WHERE content.content_type = 1 AND content.table_id = question.id AND content.user_id = ? ORDER BY question.id DESC");
    $stmt->execute(array($user_id));
    return $stmt->fetchAll();
}

function getQuestionById($id){
    global $conn;
    $stmt = $conn->prepare("SELECT content.created_when, content.id AS contentid, question.id AS questionId, question.title, question.content, question.priority,question.closed , \"User\".*
                            FROM content, question, \"User\" WHERE content.content_type = 1 AND content.table_id = question.id AND content.table_id = $id AND \"User\".id = content.user_id");
    $stmt->execute();
    $question =  $stmt->fetch();

    $contentid = $question['contentid'];

    $stmt = $conn->prepare("SELECT \"User\".*, content.id as contentId, content.created_when, content.user_id, answer.content
                            FROM content, answer, reply, \"User\" WHERE content.content_type = 2 AND content.table_id = answer.id AND reply.content_id = $contentid AND reply.reply_id = content.id AND \"User\".id = content.user_id");
    $stmt->execute();
    $answers =  $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT SUM(classification) AS classification FROM Vote WHERE content_id = $contentid");

    // question votes
    $stmt->execute();
    $questionVotes = $stmt->fetch();
    if($questionVotes['classification']!=null) {
        if ($questionVotes['classification'] > 0)
            $questionVotes['classification'] = '+' . $questionVotes['classification'];
    } else {
        $questionVotes['classification'] = '0';
    }


    $answersContentId = array();
    foreach($answers as $answer){
        $answersContentId[] = $answer['contentid'];
    }

    if(count($answers) != 0) {
        //answers votes
        $qMarks = str_repeat('?,', count($answersContentId) - 1) . '?';

        $stmt = $conn->prepare("SELECT sum(vote.classification) as classification , vote.content_id FROM vote WHERE vote.content_id IN ($qMarks) GROUP BY vote.content_id");
        $stmt->execute($answersContentId);
        $answersVotes = $stmt->fetchAll();


        for ($i = 0; $i < count($answers); $i++) {
            $answers[$i]['classification'] = 0;
            foreach ($answersVotes as $vote) {
                if ($answers[$i]['contentid'] == $vote['content_id']) {
                    $answers[$i]['classification'] = ($vote['classification'] >= 0) ? ('+' . $vote['classification']) : $vote['classification'];
                }
            }
        }

    }
    $question_comments = getQuestionComments($contentid);
    $question['comments'] = $question_comments;

    getAnswersComments($answers);

    //get question tags
    $tags = getQuestionTags($question['questionid']);
    $tags_array = explode(",",$tags);

    return [
        'question' => $question,
        'tags'  => $tags,
        'tags_array' => $tags_array,
        'answers' => $answers,
        'questionVotes' => $questionVotes['classification'],
    ];
}

function getQuestionTags($questionId) {
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM content WHERE table_id = ? AND content_type = 1");
    $stmt->execute(array($questionId));
    $content_id = $stmt->fetch()['id'];


    $stmt = $conn->prepare("SELECT tag.name FROM tag, contenttag WHERE contenttag.content_id = ? AND tag.id = contenttag.tag_id");
    $stmt->execute(array($content_id));

    $tags_array = $stmt->fetchAll();
    $tags_string = "";

    for($i = 0; $i < sizeof($tags_array); $i++) {
        if($i != 0) {
            $tags_string = $tags_string . ",";
        }

        $tags_string = $tags_string . $tags_array[$i]['name'];
    }
    return $tags_string;
}

function closeQuestion($questionId)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE question
                            SET closed = TRUE WHERE question.id = ?");
    $stmt->execute(array($questionId));
}


function search($content)
{
	global $conn;
	$stmt = $conn->prepare("SELECT content.created_when, question.id, question.title, question.content, question.priority
                            FROM content, question WHERE content.content_type = 1 AND content.table_id = question.id AND to_tsvector(title||' '||content) @@ plainto_tsquery(?);");
	$stmt->execute(array($content));
	return $stmt->fetchAll();

}

function getQuestionComments($contentid) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT \"User\".*, content.id as contentId, content.created_when, content.user_id, comment.content
                            FROM content, comment, reply, \"User\" WHERE content.content_type = 3 AND content.table_id = comment.id AND reply.content_id = $contentid AND reply.reply_id = content.id AND \"User\".id = content.user_id");
    $stmt->execute();
    $comments =  $stmt->fetchAll();
    
    return $comments;
}

function getAnswersComments(&$answers) {
    global $conn;
    
    foreach($answers as &$answer) {
        $contentid = $answer['contentid'];
        
        $stmt = $conn->prepare("SELECT \"User\".*, content.id as contentId, content.created_when, content.user_id, comment.content
                            FROM content, comment, reply, \"User\" WHERE content.content_type = 3 AND content.table_id = comment.id AND reply.content_id = $contentid AND reply.reply_id = content.id AND \"User\".id = content.user_id");
        $stmt->execute();
        $comments =  $stmt->fetchAll();
 
        $answer['comments'] = $comments;
    }
}



function getFavouriteQuestionsOfUser($userId) {
    global $conn;


    $stmt = $conn->prepare("SELECT \"User\".id as userId,\"User\".name as userName, \"User\".email as userEmail  , content.id as contentId, content.created_when, question.id as questionId, question.content, question.title
                            FROM favouritequestions, content, question, \"User\" WHERE content.content_type = 1 AND favouritequestions.user_id = ? AND question.id = favouritequestions.question_id AND content.table_id = question.id  AND \"User\".id = content.user_id ORDER BY question.id DESC");
    $stmt->execute(array($userId));
    $favouriteQuestions =  $stmt->fetchAll();


    return $favouriteQuestions;
}

function isFavouriteQuestionOfUser($userId, $questionId)
{
    global $conn;

    $stmt = $conn->prepare("SELECT *
                            FROM favouritequestions WHERE favouritequestions.user_id = ? AND favouritequestions.question_id = ?");
    $stmt->execute(array($userId, $questionId));
    $favouriteQuestions =  $stmt->fetchAll();

    return $favouriteQuestions;
}

function removeFavourite($userId, $questionId)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM favouritequestions where question_id = ? AND user_id = ?");
    $stmt->execute(array($questionId, $userId));
}

function removeAllFavouriteQuestionWithId($question_id)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM favouritequestions where question_id = ?");
    $stmt->execute(array($question_id));
}

function setAsFavourite($userId, $questionId) {
    global $conn;

    try {
        // if already favourite, removes from favourites
        if (count(isFavouriteQuestionOfUser($userId, $questionId)) != 0) {
            removeFavourite($userId, $questionId);
            $value = 0;
        } else {
            $stmt = $conn->prepare("INSERT INTO favouritequestions (user_id, question_id) VALUES (?, ?)");
            $stmt->execute(array($userId, $questionId));
            $value = 1;
        }
    }catch (PDOException $e) {
        http_response_code(400);

        return ['error' => true];
    }

	return ['error' => false, 'value' => $value ];
}


function getTagQuestions($tag) {
    global $conn;


    $stmt = $conn->prepare("SELECT \"User\".id as userId,\"User\".name as userName, \"User\".email as userEmail  , content.id as contentId, content.created_when, question.id as questionId, question.content, question.title
                            FROM tag, contenttag, question, \"User\", content
                            WHERE tag.name = ? AND contenttag.tag_id = tag.id AND content.id = contenttag.content_id AND content.content_type = 1 AND content.table_id = question.id AND \"User\".id = content.user_id ORDER BY question.id DESC");
    $stmt->execute(array($tag));
    $tagQuestions =  $stmt->fetchAll();


    return $tagQuestions;
}

function promoteQuestion($questionId)
{
    global $conn;

    $stmt = $conn->prepare("UPDATE question SET priority = ? WHERE question.id = ?");
    $stmt->execute(array(2, $questionId ));

}


function getQuestionsByString($string)
{
	global $conn;

	$string = "%".$string."%";
	$stmt = $conn->prepare("SELECT * FROM Question where LOWER(title) LIKE LOWER(?) OR LOWER(content) like LOWER(?)");
	$stmt->execute(array($string,$string));
	return $stmt->fetchAll();
}