<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=users.csv');

$users=getAllUsers();

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'name', 'email','password','role','referral','cash','last_access','avatar','created_when'));


// loop over the rows, outputting them
foreach($users as $user)
{
	fputcsv($output,$user);
}

