<?php

/** Question -> 1
 * Answer -> 2
 * Comment -> 3
 * */
function vote($contentId, $classification) {
    global $conn;

    try {
        $stmt = $conn->prepare("DELETE FROM vote WHERE user_id = ? AND content_id = ?");
        $stmt->execute(array($_SESSION['user']['id'], $contentId));

        $stmt = $conn->prepare("INSERT INTO vote (user_id, content_id, classification) VALUES (?, ?, ?)");
        $stmt->execute(array($_SESSION['user']['id'], $contentId, $classification));
    }catch(PDOException $e){
        http_response_code (400);
        return ['error'=>true];
    }
    return getSumVotes($contentId);
}

function getSumVotes($contentId){
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT SUM(classification) AS classification FROM Vote WHERE content_id = ?");

        // question votes
        $stmt->execute(array($contentId));
        $questionVotes = $stmt->fetch();

        if($questionVotes['classification']!=null) {
            if ($questionVotes['classification'] > 0)
                $questionVotes['classification'] = '+' . $questionVotes['classification'];
        } else {
            $questionVotes['classification'] = '0';
        }


    }catch(PDOException $e){
        http_response_code (400);
        return ['error'=>true];
    }
    return ['error' => false, 'classification' => $questionVotes['classification']];
}

function getVotes($contentId) {

}
