<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');


deleteUserId($_POST['id']);

header('Location: '.$BASE_URL.'pages/users/view_users.php');