<?php
/*
* Model 
*/
?>

<?php

// question level 1
$questions[1][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[1][1] = "NetLogo is a tool for teaching children to design turtles";
$questions[1][2] = "In ABM, agents interact with each other and with the environment"; // right answer
$questions[1][3] = "Simulations are too difficult to build";
$questions[1][$questions[1][0]+1] = 2; // contains the rigth answer (position [level][n+1])


// question level 2
$questions[2][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[2][1] = "variables"; 
$questions[2][2] = "tricks"; 
$questions[2][3] = "inferences";
$questions[2][$questions[2][0]+1] = 1; // contains the rigth answer (position [level][n+1])


// question level 3
$questions[3][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[3][1] = "fd 0.1";
$questions[3][2] = "create-people 1 [ ... ]"; 
$questions[3][3] = "rt random 60";
$questions[3][$questions[3][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 4
$questions[4][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[4][1] = "orange color wall";
$questions[4][2] = "set wall orange"; 
$questions[4][3] = "set color orange";
$questions[4][$questions[4][0]+1] = 3; // contains the rigth answer (position [level][n+1])


// question level 5
$questions[5][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[5][1] = "<code>if not any? walls-on patch-ahead 1</code>";
$questions[5][2] = "<code>if any? other people-on patch-ahead 1</code>"; 
$questions[5][3] = "<code>if not member? myself contact-with</code>";
$questions[5][$questions[5][0]+1] = 2; // contains the rigth answer (position [level][n+1])

// question level 6
$questions[6][0] = 3; // contains the number of questions (from [1] to [n]) for this level
$questions[6][1] = "Count links allows you to count the number of walls";
$questions[6][2] = "To advance of one the time in the simulation, it is necessary to write set tick tick + 1"; 
$questions[6][3] = "The simulation allows to introduce variability and to analyze the results of different scenarios (scenario analysis)";
$questions[6][$questions[6][0]+1] = 3; // contains the rigth answer (position [level][n+1])

function quiz_check($page_level, $answer)
{
    global $questions;
    
    if (intval($answer) == $questions[$page_level][$questions[$page_level][0]+1]){
        echo "1";
        $new_level = intval($_SESSION['page_level_reached']) + 1;
        $_SESSION['page_level_reached'] = $new_level;
    }
    else{
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