<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/tweets.php');

$smarty->display('users/view_profile.tpl');
