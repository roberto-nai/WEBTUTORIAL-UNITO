<?php
/*
* Model 
*/
?>

<?php

// question level 1
$questions[1][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[1][1] = "Un serpente che vive sulle Alpi";
$questions[1][2] = "Un linguaggio di programazione facile e versatile"; // right answer
$questions[1][3] = "Un gruppo comico inglese degli anni Ottanta";
$questions[1][$questions[1][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 2
$questions[2][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[2][1] = "istruzioni"; 
$questions[2][2] = "variabili"; 
$questions[2][3] = "locazioni di memoria";
$questions[2][$questions[2][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 3
$questions[3][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[3][1] = "LAMPADINA";
$questions[3][2] = "DINA LAMPA"; 
$questions[3][3] = "LAMPA DINA";
$questions[3][$questions[3][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 4
$questions[4][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[4][1] = "MarioFalse";
$questions[4][2] = "True"; 
$questions[4][3] = "False";
$questions[4][$questions[4][0]+1] = 3; // contains the rigth answer (position [level][n+1])

// question level 5
$questions[5][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[5][1] = "1";
$questions[5][2] = "2"; 
$questions[5][3] = "6";
$questions[5][$questions[5][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 6
$questions[6][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[6][1] = "10";
$questions[6][2] = "9"; 
$questions[6][3] = "0";
$questions[6][$questions[6][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 7
$questions[7][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[7][1] = "1";
$questions[7][2] = "2"; 
$questions[7][3] = "3";
$questions[7][$questions[7][0]+1] = 3; // contains the rigth answer (position [level][n+1])

// question level 8
$questions[8][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[8][1] = 'Ligue1["PSG"]';
$questions[8][2] = 'Ligue1.keys("PSG")'; 
$questions[8][3] = 'Ligue1.values("PSG")';
$questions[8][$questions[8][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 9 
$questions[9][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[9][1] = "";
$questions[9][2] = ""; 
$questions[9][3] = "";
$questions[9][$questions[9][0]+1] = 2; // contains the rigth answer (position [level][n+1])


function quiz_check($page_level, $answer, $quiz_mandatory)
{
    global $questions;
    
    if (intval($answer) == $questions[$page_level][$questions[$page_level][0]+1]) // right answer
	{
        echo "1";
        $new_level = intval($_SESSION['page_level_reached']) + 1;
        $_SESSION['page_level_reached'] = $new_level;
    }
    else // wrong answer
	{
		if (intval($quiz_mandatory) == 0) // check if quiz is mandatory
		{
			echo "qui:".$quiz_mandatory;
			$new_level = intval($_SESSION['page_level_reached']) + 1;
			$_SESSION['page_level_reached'] = $new_level;
		}
        echo "0";
    }
}

function quiz_save($projectID, $sessionID, $pageName, $pageOrder, $answerNum, $answerCorrect, $lang)
{
	include "connectDB.php";
	$stmt = "";
	$query = "INSERT INTO quiz (`projectID`, `sessionID`, `lang`, `pageName`, `pageOrder`, `answer`, `answerCorrect`) ";
	$query .= "VALUES ";
	$query .= "(?, ?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID, $sessionID, $lang, $pageName, $pageOrder, $answerNum, $answerCorrect]);
	$count = $stmt->rowCount();
	echo $count;
}

function quiz_get($projectID)
{
	include "connectDB.php";
	$query = "SELECT *, CONCAT(SUBSTRING(sessionID, 1, 5),\"...\") AS sessionIDMin ";
	$query .= "FROM quiz ";
	$query .= "WHERE projectID = ?;";
	// $query .= "ORDER BY idEvent DESC;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID]);
	$results = $stmt->fetchAll(); 
	$json = json_encode($results, JSON_INVALID_UTF8_SUBSTITUTE); // json_encode trasforma le righe estratte in json
	echo $json;
}
?>