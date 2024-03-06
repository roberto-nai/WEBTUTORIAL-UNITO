<?php
/*
* Model 
*/
?>

<?php

$lang = $_SESSION['lang'];

// survey questions
$questions[$lang][0] = 11; // number of question
$questions[$lang][1] = "How much do you feel you have improved your knowledge about NetLogo?";
$questions[$lang][2] = "Did you like this tutorial?";
$questions[$lang][3] = "I found the web tutorial easy to understand:";
$questions[$lang][4] = "I think you need expert support to be able to use the tutorial:";
$questions[$lang][5] = "I find the usability of the site as a whole to be adequate:";
$questions[$lang][6] = "I believe that the tutorial requires too much mental effort:";
$questions[$lang][7] = "I find the colors used to be appropriate:";
$questions[$lang][8] = "I feel that the tutorial is too long to do:";
$questions[$lang][9] = "I imagine that most people would learn to use the NetLogo tool very quickly:";
$questions[$lang][10] = "Gender";
$questions[$lang][11] = "Age (completed years, in 2022):";

// question types
$questions_type[1] = "radio";
$questions_type[2] = "radio";
$questions_type[3] = "radio";
$questions_type[4] = "radio";
$questions_type[5] = "radio";
$questions_type[6] = "radio";
$questions_type[7] = "radio";
$questions_type[8] = "radio";
$questions_type[9] = "radio";
$questions_type[10] = "select";
$questions_type[11] = "number";

// question answer
$questions_answer["radio"][0] = 4; // number of choice
$questions_answer["radio"][1] = "Not at all";
$questions_answer["radio"][2] = "Poor";
$questions_answer["radio"][3] = "Enough";
$questions_answer["radio"][4] = "A lot";

$questions_answer["select"][0] = 3;
$questions_answer["select"][1] = "Male";
$questions_answer["select"][2] = "Female";
$questions_answer["select"][3] = "Prefer not to answer";

$questions_answer["number"][0] = 2;
$questions_answer["number"][1] = 14; // min
$questions_answer["number"][2] = 99; // max



function survey_save($projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11)
{
	include "connectDB.php";
	$stmt = "";
	// INSERT INTO `netlogo`.`survey` (`idSurvey`, `projectID`, `sessionID`, `lang`, `answer-1`, `answer-2`, `answer-3`, `answer-4`, `answer-5`, `answer-6`, `answer-7`, `answer-8`, `answer-9`, `answer-10`, `answer-11`) VALUES ('1', '1', '1', '1', '1', '1', '2', '3', '4', '5', '6', '7', '8', '9', '9');

	$query = "INSERT INTO survey (`projectID`, `sessionID`, `lang`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `answer_10`, `answer_11`) ";
	$query .= "VALUES ";
	$query .= "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11]);
	$count = $stmt->rowCount();
	echo $count;
}

function survey_get($projectID)
{
	include "connectDB.php";
	$query = "SELECT *, CONCAT(SUBSTRING(sessionID, 1, 5),\"...\") AS sessionIDMin ";
	$query .= "FROM survey ";
	$query .= "WHERE projectID = ?;";
	// $query .= "ORDER BY idEvent DESC;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID]);
	$results = $stmt->fetchAll(); 
	$json = json_encode($results, JSON_INVALID_UTF8_SUBSTITUTE); // json_encode trasforma le righe estratte in json
	echo $json;
}
?>