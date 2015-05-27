<?php

/** Question -> 1
 * Answer -> 2
 * Comment -> 3
 * */

function insertComment($content, $parentId, $type){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO comment (content) VALUES (?)");
    $stmt->execute(array($content));


    $stmt = $conn->prepare("SELECT MAX(id) as id FROM comment");
    $stmt->execute();
    $commentId = $stmt->fetch()['id'];

    $created_when = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO content (user_id, created_when, table_id, content_type) VALUES (?, ?, ?,?)");
    $stmt->execute(array($_SESSION['user']['id'], $created_when, $commentId, 3));


    $stmt = $conn->prepare("SELECT MAX(id) as id FROM content");
    $stmt->execute();

    $contentReplyId = $stmt->fetch()['id'];

    if($type == 1) {
        $stmt = $conn->prepare("SELECT content.id FROM content, question WHERE question.id = $parentId AND content.table_id = question.id");
        $stmt->execute();
        $contentId = $stmt->fetch();

    } else if($type == 2) {
        $contentId['id'] = $parentId;
        /*
        $stmt = $conn->prepare("SELECT content.id FROM content, answer WHERE answer.id = $tableId AND content.table_id = answer.id");
        $stmt->execute();
        $contentId = $stmt->fetch();
        */
    }
    

    $stmt = $conn->prepare("INSERT INTO reply (content_id, reply_id) VALUES (?, ?)");
    $stmt->execute(array($contentId['id'], $contentReplyId));
}