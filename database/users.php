<?php
include_once($BASE_DIR.'database/questions.php');
  
    function createUser($username, $email, $password) {
        global $conn;

function createUser($username, $email, $password)
{
	global $conn;
        $role=1;
        $referal ="";
        $cash = 0;
        $last_access = date("Y-m-d H:i:s");
        $created_when = date("Y-m-d H:i:s");
        $avatar = "http://heintendsvictory.org/wp-content/uploads/default-avatar.png";

	$role = 1;
	$referal = "";
	$cash = 0;
	$last_access = date("Y-m-d H:i:s");
	$created_when = date("Y-m-d H:i:s");
	$avatar = "http://heintendsvictory.org/wp-content/uploads/default-avatar.png";
        $stmt = $conn->prepare("INSERT INTO \"User\" (name,email,password,ROLE,referral,cash,last_acess,avatar,created_when) VALUES (?, ?, ?, ?,?,?,?,?,?)");
        $stmt->execute(array($username, $email, sha1($password), $role, $referal, $cash, $last_access, $avatar, $created_when));
    }

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

function isLoginCorrect($email, $password)
{
	global $conn;
	$stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE email = ? AND password = ?");
	$stmt->execute(array($email, sha1($password)));
    function isLoginCorrect($email, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT *
                                FROM \"User\"
                                WHERE email = ? AND password = ?");
        $stmt->execute(array($email, sha1($password)));
        return $stmt->fetch();
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

    function updateUser($userId, $name, $email, $password,$avatar)
    {

        $inputArray = array();

        $query = "UPDATE \"User\"
                                SET name = ?";

        $inputArray[] = $name;

        if($_SESSION['user']['email'] != $email) {
            $query = $query . ", email = ?";
            $inputArray[] = $email;
        }

        if($password != ""){
            $query = $query . ", password = ?";
            $inputArray[] = sha1($password);
        }
        if($avatar != ""){
            $query = $query .", avatar = ?";
            $inputArray[] = $avatar;
        }

        $inputArray[] = $userId;

        $query = $query . "WHERE id = ?";

        global $conn;
        $stmt = $conn->prepare($query);
        $stmt->execute($inputArray);
    
    }

function getAllUsers()
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM \"User\"");
	$stmt->execute();

	return $stmt->fetchAll();
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

		$stmt = $conn->prepare("DELETE FROM Reply where content_id = ?");
		$stmt->execute(array($content['id']));


		$stmt = $conn->prepare("DELETE FROM Content where id = ?");
		$stmt->execute(array($content['id']));
	}

	$stmt = $conn->prepare("DELETE FROM \"User\" where id = ?");
	$stmt->execute(array($id));

}