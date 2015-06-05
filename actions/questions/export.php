<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/questions.php');


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=questions.csv');

$questions=getAllQuestions();

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'title', 'content','password','priority','state'));


// loop over the rows, outputting them
foreach($questions as $question)
{
	fputcsv($output,$question);
}

