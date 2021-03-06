<?php

function getAllMessages($id)
{
	global $conn;
	$stmt = $conn->prepare("SELECT message.id,\"User\".name, message.content, message.created_at, message.subject FROM message, \"User\"  where message.to_id = ? AND message.from_id = \"User\".id");
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function deleteMessage($id)
{
	global $conn;

	try
	{
		$stmt = $conn->prepare("DELETE FROM message where id = ? and to_id = ?");
        $stmt->execute(array($id,$_SESSION['user']['id']));
	}
	catch (PDOException $e)
	{
		http_response_code(400);

		return ['error' => true];
	}

	return ['error' => false];
}


function createMessage($message)
{
	$to_id = $message['to_id'];
	$subject = $message['subject'];
	$content = $message['message'];

	global $conn;

	try
	{
		$stmt = $conn->prepare("SELECT id FROM \"User\" WHERE email = ?");
		$stmt->execute([$to_id]);
		$userId = $stmt->fetch()['id'];

		$stmt = $conn->prepare("INSERT INTO message (from_id,to_id,subject,content,seen,created_at) VALUES (?, ?, ?,?,?,?)");
		$stmt->execute(array($_SESSION['user']['id'],$userId,$subject,$content,NULL, date("Y-m-d H:i:s")));
	}
	catch (PDOException $e)
	{
		http_response_code(400);

		return ['error' => true,'exception' => $e];
	}

	$_SESSION['SUCCESS_MESSAGES'] = "Your message was successfully sent";

	return ['error' => false];

}

function getUserMessages($id)
{
	global $conn;
	$stmt = $conn->prepare("SELECT count(*) FROM Message WHERE to_id = ?");
	$stmt->execute(array($id));
	$count = $stmt->fetch();
	return $count['count'];
}

function checkIfQuestionCreator($userId,$messageId)
{
	global $conn;
	$stmt = $conn->prepare("SELECT user_id FROM Content WHERE table_id = ? AND content_type = 1");
	$stmt->execute(array($messageId));
	$creator_id = $stmt->fetch();
	if($userId==$creator_id['user_id']) {
		return true;
	} else {
		return false;
	}
}

