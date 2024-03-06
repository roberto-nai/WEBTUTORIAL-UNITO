<?php
/*
* Model 
*/
?>

<?php

function event_save($projectID, $sessionID, $pageName, $pageOrder, $pagePara, $event, $duration, $lang)
{
	include "connectDB.php";
	$stmt = "";
	$query = "INSERT INTO events (`projectID`, `sessionID`, `pageName`, `pageOrder`, `pagePara`, `event`, `duration`, `lang`) ";
	$query .= "VALUES ";
	$query .= "(?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID, $sessionID, $pageName, $pageOrder, $pagePara, $event, $duration, $lang]);
	$count = $stmt->rowCount();
	echo $count;
}

function event_get($projectID)
{
	include "connectDB.php";
	$query = "SELECT *, CONCAT(SUBSTRING(sessionID, 1, 5),\"...\") AS sessionIDMin ";
	$query .= "FROM events ";
	$query .= "WHERE projectID = ?;";
	// $query .= "ORDER BY idEvent DESC;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID]);
	$results = $stmt->fetchAll(); 
	$json = json_encode($results, JSON_INVALID_UTF8_SUBSTITUTE); // json_encode trasforma le righe estratte in json
	echo $json;
}

?>