<?php

/** Question -> 1
 * Answer -> 2
 * Comment -> 3
 * */
function vote($contentId, $classification) {
    global $conn;


    $stmt = $conn->prepare("INSERT INTO vote (user_id, content_id, classification) VALUES (?, ?, ?)");
    $stmt->execute(array($_SESSION['user']['id'], $contentId, $classification));

}

function getVotes($contentId) {

}
