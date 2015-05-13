<?php
  
  function createUser($username, $email, $password) {
    global $conn;

      $role=1;
      $referal ="";
      $cash = 0;
      $last_access = date("Y-m-d H:i:s");
      $created_when = date("Y-m-d H:i:s");
        $avatar = "http://heintendsvictory.org/wp-content/uploads/default-avatar.png";

      $stmt = $conn->prepare("INSERT INTO \"User\" (name,email,password,ROLE,referral,cash,last_acess,avatar,created_when) VALUES (?, ?, ?, ?,?,?,?,?,?)");
    $stmt->execute(array($username, $email, sha1($password), $role, $referal, $cash, $last_access, $avatar, $created_when));
  }

  function isLoginCorrect($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"User\"
                            WHERE email = ? AND password = ?");
    $stmt->execute(array($email, sha1($password)));
    return $stmt->fetch();
  }

    function getUserById($id){
        global $conn;
        $stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE id = $id");
        $stmt->execute();
        return $stmt->fetch();
    }
?>
