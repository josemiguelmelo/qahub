<?php
include_once($BASE_DIR.'database/questions.php');

function createUser($username, $email, $password)
{
	global $conn;

	$role = 1;
	$referal = "";
	$cash = 0;
	$last_access = date("Y-m-d H:i:s");
	$created_when = date("Y-m-d H:i:s");
	$avatar = "http://heintendsvictory.org/wp-content/uploads/default-avatar.png";
	$stmt = $conn->prepare("INSERT INTO \"User\" (name,email,password,ROLE,referral,cash,last_acess,avatar,created_when) VALUES (?, ?, ?, ?,?,?,?,?,?)");
	$stmt->execute(array(
			$username,
			$email,
			sha1($password),
			$role,
			$referal,
			$cash,
			$last_access,
			$avatar,
			$created_when
		));
}

function addReward($user_id,$badge_id) {

    global $conn;

    $stmt = $conn->prepare("SELECT name FROM badge WHERE id = ?");
    $stmt->execute(array($badge_id));

    $name = $stmt->fetch()['name'];

    $stmt = $conn->prepare("SELECT id, reward FROM reward WHERE reward.name = ?");
    $stmt->execute(array($name));
    $reward = $stmt->fetch();
    $reward_id = $reward['id'];
    $reward_ammount = $reward['reward'];

    $stmt = $conn->prepare("INSERT INTO reward_user VALUES (?,?)");
    $stmt->execute(array($reward_id,$user_id));

    addAmount($user_id,$reward_ammount);

    return $reward_ammount;
}

function addAmount($userId, $amount)
{
    global $conn;

    $inputArray = array();
    $user = getUserById($userId);

    $query = "UPDATE \"User\" SET cash = ? WHERE id = ?";
    $amount = $user['cash'] + $amount;
    $inputArray[] = intval($amount);
    $inputArray[] = $userId;

    $stmt = $conn->prepare($query);
    $stmt->execute($inputArray);

    $stmt = $conn->prepare("INSERT INTO transaction (user_id, amount, date, description, type) VALUES (?, ?, NOW(), ?, ?)");
    $stmt->execute(array($userId, $amount, $amount . "dollars added to account", 1));
}

function removeAmount($userId, $amount)
{
    global $conn;

    $inputArray = array();
    $user = getUserById($userId);

    $query = "UPDATE \"User\" SET cash = ? WHERE id = ?";
    $amount = $user['cash'] - $amount;

    $inputArray[] = intval($amount);
    $inputArray[] = $userId;

    $stmt = $conn->prepare($query);
    $stmt->execute($inputArray);

    $stmt = $conn->prepare("INSERT INTO transaction (user_id, amount, date, description, type) VALUES (?, ?, NOW(), ?, ?)");
    $stmt->execute(array($userId, $amount, $amount . "dollars removed from account", 2));
}

function isLoginCorrect($email, $password)
{
	global $conn;
	$stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE email = ? AND password = ?");
	$stmt->execute(array($email, sha1($password)));

	return $stmt->fetch();
}

function favouriteUser($followerId, $userToFollowId)
{
    global $conn;

    try
    {
        $stmt = $conn->prepare("INSERT INTO favouriteusers (user_id, favourite_id) VALUES (?, ?)");
        $stmt->execute(array($followerId, $userToFollowId));
    }
    catch (PDOException $e)
    {
        http_response_code(400);

        return ['error' => true];
    }

    return ['error'=>false, 'value'=>false];
}

function unfavouriteUser($followerId, $userFollowedId)
{
    global $conn;

    try
    {
        $stmt = $conn->prepare("DELETE FROM favouriteusers WHERE user_id = ? AND favourite_id = ?");
        $stmt->execute(array($followerId, $userFollowedId));
    }
    catch (PDOException $e)
    {
        http_response_code(400);



        return ['error' => true];
    }

    return ['error' => false, 'value'=>true];
}

function isFavourite($followerId, $userFollowedId)
{
    global $conn;

    $queryArray = [$followerId, $userFollowedId];

    $stmt = $conn->prepare("SELECT *
                            FROM favouriteusers
                            WHERE user_id = ? AND favourite_id = ?");
    $stmt->execute($queryArray);
    $result = $stmt->fetchAll();

    if(count($result) > 0){
        return true;
    }
    return false;
}


function getAllFavouritesOfUser($userId)
{
    global $conn;

    $queryArray = [$userId];

    $stmt = $conn->prepare("SELECT *
                            FROM favouriteusers
                            WHERE user_id = ?");
    $stmt->execute($queryArray);
    return $stmt->fetchAll();
}

function getUserById($id)
{
	global $conn;
	$stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE id = $id");
	$stmt->execute();
	return $stmt->fetch();
}

function getUserByEmail($email)
{
    global $conn;
    $queryArray = [$email];

    $stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE email = ?");
    $stmt->execute($queryArray);
    return $stmt->fetch();
}

function updatePassword($email, $password)
{
    $inputArray = array();

    $query = "UPDATE \"User\" SET password = ? WHERE email = ?";

    $inputArray[] = $password;
    $inputArray[] = $email;

    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute($inputArray);

}


function addPasswordToHistory($userId, $password){
    global $conn;

    $passwordHistoryQuery = "INSERT INTO passwordhistory (user_id, password) VALUES (? , ?)";
    $passwordQueryArray = [$userId, sha1($password)];

    $stmt = $conn->prepare($passwordHistoryQuery);
    $stmt->execute($passwordQueryArray);
}

function getLastThreePasswords($userId){
    global $conn;

    $passwordHistoryQuery = "SELECT * FROM passwordhistory WHERE user_id = ? LIMIT 3";
    $passwordQueryArray = [$userId];

    $stmt = $conn->prepare($passwordHistoryQuery);
    $stmt->execute($passwordQueryArray);
    return $stmt->fetchAll();

}

function updateUser($userId, $name, $email, $password, $avatar)
{

	$inputArray = array();

	$query = "UPDATE \"User\"
                                SET name = ?";

	$inputArray[] = $name;

	if ($_SESSION['user']['email'] != $email)
	{
		$query = $query.", email = ?";
		$inputArray[] = $email;
	}

	if ($password != "")
	{
		$query = $query.", password = ?";
		$inputArray[] = sha1($password);


	}
	if ($avatar != "")
	{
		$query = $query.", avatar = ?";
		$inputArray[] = $avatar;
	}

	$inputArray[] = $userId;

	$query = $query."WHERE id = ?";

	global $conn;
	$stmt = $conn->prepare($query);
	$stmt->execute($inputArray);

}

function getAllUsers()
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM \"User\" WHERE id != ?");
	$stmt->execute(array($_SESSION['user']['id']));

	return $stmt->fetchAll();
}

function setUserAsAdmin($userId)
{
    global $conn;

    $inputArray = array();

    $query = "UPDATE \"User\" SET role = 2 WHERE id = ?";

    $inputArray[] = $userId;

    $stmt = $conn->prepare($query);
    $stmt->execute($inputArray);

}

function deleteUserId($id)
{
	global $conn;

	$stmt = $conn->prepare("SELECT * FROM Content where user_id = ?");
	$stmt->execute(array($id));
	$contents = $stmt->fetchAll();

	foreach ($contents as $content)
	{
		if ($content['content_type'] == 1)
		{
			$stmt = $conn->prepare("DELETE FROM Question where id = ?");
			$stmt->execute(array($content['table_id']));
		}

		$stmt = $conn->prepare("DELETE FROM Answer where id = ?");
		$stmt->execute(array($content['table_id']));

		if ($content['content_type'] == 3)
		{
			$stmt = $conn->prepare("DELETE FROM Comment where id = ?");
			$stmt->execute(array($content['table_id']));
		}

		$stmt = $conn->prepare("DELETE FROM Reply where reply_id = ?");
		$stmt->execute(array($content['id']));


		$stmt = $conn->prepare("DELETE FROM Content where id = ?");
		$stmt->execute(array($content['id']));
	}

	$stmt = $conn->prepare("DELETE FROM \"User\" where id = ?");
	$stmt->execute(array($id));

}

function checkAdmin($id)
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM \"User\" where id = ?");
	$stmt->execute(array($id));
	$user = $stmt->fetch();
	if($user['role'] == 2) {
		return true;
	} else {
		return false;
	}

}


function getUserBadges($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT badge.name
                            FROM badge, userbadges
                            WHERE badge.id = userbadges.badge_id AND userbadges.user_id = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function donateToUser($fromId, $toId, $amount)
{

    try
    {
        removeAmount($fromId, $amount);
    }
    catch (PDOException $e)
    {
        http_response_code(400);

        return ['error' => true];
    }

    try
    {
        addAmount($toId, $amount);
    }
    catch (PDOException $e)
    {
        http_response_code(400);

        return ['error' => true];
    }


    return ['error'=>false, 'value'=>false];


}

function getUsersByString($name)
{
	global $conn;

	$name = "%".$name."%";
	$stmt = $conn->prepare("SELECT * FROM \"User\" where (LOWER(name) LIKE LOWER(?) OR LOWER(email) like LOWER(?) ) and id != ?");
	$stmt->execute(array($name,$name,$_SESSION['user']['id']));
	return $stmt->fetchAll();
}