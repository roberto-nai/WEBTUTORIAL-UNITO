<?php
/*
* Model 
*/
?>

<?php

// ATTENTION: alle the answer should be string "..."

// question level 1
$questions["quiz-01.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-01.php"][1] = "Un serpente che vive sulle Alpi";
$questions["quiz-01.php"][2] = "Un linguaggio di programazione facile e versatile"; // right answer
$questions["quiz-01.php"][3] = "Un gruppo comico inglese degli anni Ottanta";
$questions["quiz-01.php"][$questions["quiz-01.php"][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 2
$questions["quiz-02.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-02.php"][1] = "istruzioni"; 
$questions["quiz-02.php"][2] = "variabili"; 
$questions["quiz-02.php"][3] = "locazioni di memoria";
$questions["quiz-02.php"][$questions["quiz-02.php"][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 3
$questions["quiz-03.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-03.php"][1] = "100";
$questions["quiz-03.php"][2] = "20"; 
$questions["quiz-03.php"][3] = "a";
$questions["quiz-03.php"][$questions["quiz-03.php"][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 4
$questions["quiz-04.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-04.php"][1] = "MarioFalse";
$questions["quiz-04.php"][2] = "True"; 
$questions["quiz-04.php"][3] = "False";
$questions["quiz-04.php"][$questions["quiz-04.php"][0]+1] = 3; // contains the rigth answer (position [level][n+1])

// question level 5
$questions["quiz-06.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-06.php"][1] = "1";
$questions["quiz-06.php"][2] = "2"; 
$questions["quiz-06.php"][3] = "6";
$questions["quiz-06.php"][$questions["quiz-06.php"][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 6
$questions["quiz-05.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-05.php"][1] = "nstr = int(nval)";
$questions["quiz-05.php"][2] = "nstr = str(nval)"; 
$questions["quiz-05.php"][3] = "nstr = nval";
$questions["quiz-05.php"][$questions["quiz-05.php"][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 7
$questions["quiz-07.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-07.php"][1] = "200";
$questions["quiz-07.php"][2] = "100"; 
$questions["quiz-07.php"][3] = "10";
$questions["quiz-07.php"][$questions["quiz-07.php"][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 8
$questions["quiz-08.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-08.php"][1] = "1";
$questions["quiz-08.php"][2] = "2"; 
$questions["quiz-08.php"][3] = "3";
$questions["quiz-08.php"][$questions["quiz-08.php"][0]+1] = 3; // contains the rigth answer (position [level][n+1])

// question level 9
$questions["quiz-09.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-09.php"][1] = "Ligue1[\"PSG\"]";
$questions["quiz-09.php"][2] = "Ligue1.keys(\"PSG\")"; 
$questions["quiz-09.php"][3] = "Ligue1.values(\"PSG\")";
$questions["quiz-09.php"][$questions["quiz-09.php"][0]+1] = 1; // contains the rigth answer (position [level][n+1])

// question level 10 
$questions["quiz-10.php"][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions["quiz-10.php"][1] = "area(b,h)";
$questions["quiz-10.php"][2] = "area(base,altezza)"; 
$questions["quiz-10.php"][3] = "a(10,5)";
$questions["quiz-10.php"][$questions["quiz-10.php"][0]+1] = 2; // contains the rigth answer (position [level][n+1])


function quiz_check($page_level, $answer, $quiz_mandatory, $page_name)
{
    global $questions;
    
    if (intval($answer) == $questions[$page_name][$questions[$page_name][0]+1]) // right answer
	{
        echo "1";
		// add a new level 
        $new_level = intval($_SESSION['page_level_reached']) + 1;
        $_SESSION['page_level_reached'] = $new_level;
    }
    else // wrong answer
	{
		if (intval($quiz_mandatory) == 0) // check if quiz is mandatory
		{
			// echo "qui:".$quiz_mandatory;
			// 18/02/2023: also if mandatory, new page is reachable
			// $new_level = intval($_SESSION['page_level_reached']) + 1;
			// $_SESSION['page_level_reached'] = $new_level;
		}
        echo "0";
		// 18/02/2023: also if mandatory, new page is reachable
		$new_level = intval($_SESSION['page_level_reached']) + 1;
		$_SESSION['page_level_reached'] = $new_level;
    }
}

function quiz_save($projectID, $sessionID, $pageName, $pageOrder, $answerNum, $answerCorrect, $lang, $pageTitle, $pageMenu)
{
	include "connectDB.php";
	$stmt = "";
	$query = "INSERT INTO quiz (`projectID`, `sessionID`, `lang`, `pageName`, `pageTitle`, `menu`, `pageOrder`, `answer`, `answerCorrect`) ";
	$query .= "VALUES ";
	$query .= "(?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID, $sessionID, $lang, $pageName, $pageTitle, $pageMenu, $pageOrder, $answerNum, $answerCorrect]);
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