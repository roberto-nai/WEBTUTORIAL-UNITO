<?php
/*
* Model 
*/
?>

<?php

// $lang = $_SESSION['lang'];

// survey questions
$questions["en"][0] = 11; // number of question
$questions["en"][1] = "How much do you feel you have improved your knowledge about NetLogo?";
$questions["en"][2] = "Did you like this tutorial?";
$questions["en"][3] = "I found the web tutorial easy to understand:";
$questions["en"][4] = "I think you need expert support to be able to use the tutorial:";
$questions["en"][5] = "I find the usability of the site as a whole to be adequate:";
$questions["en"][6] = "I believe that the tutorial requires too much mental effort:";
$questions["en"][7] = "I find the colors used to be appropriate:";
$questions["en"][8] = "I feel that the tutorial is too long to do:";
$questions["en"][9] = "I imagine that most people would learn to use the NetLogo tool very quickly:";
$questions["en"][10] = "Gender";
$questions["en"][11] = "Age (completed years, in 2022):";

$questions["it"][0] = 14; // number of questions
$questions["it"][1] = "Quanto ritiene di aver migliorato la sua conoscenza di Python?";
$questions["it"][2] = "Ti e' piaciuto questo tutorial?";
$questions["it"][3] = "Ho trovato il tuotrial semplice da capire:";
$questions["it"][4] = "E' necessario il supporto di un esperto per seguire il tutorial:";
$questions["it"][5] = "Trovo che l'usabilità del sito nel suo complesso sia adeguata:";
$questions["it"][6] = "Credo che il tutorial richieda uno sforzo mentale eccessivo:";
$questions["it"][7] = "Ho trovato i colori approprieti:";
$questions["it"][8] = "Ritengo che il tutorial sia troppo lungo da seguire:";
$questions["it"][9] = "Immagino che la maggior parte delle persone imparerebbe a usare Python molto rapidamente:";
$questions["it"][10] = "Quali argomento e' stato più difficile da capire?";
$questions["it"][11] = "Quali argomento e' stato più facile da capire?";
$questions["it"][12] = "Genere";
$questions["it"][13] = "Eta' (anni compiuti, nel 2023):";
$questions["it"][14] = "Riaffronteresti gli argomenti nello stesso ordine?";


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
$questions_type[10] = "radio-bis";
$questions_type[11] = "radio-bis";
$questions_type[12] = "select";
$questions_type[13] = "number";
$questions_type[14] = "radio-ter";

// question answer radio
$questions_answer["radio"][0] = 4; // number of choices
$questions_answer["en"]["radio"][1] = "Not at all";
$questions_answer["en"]["radio"][2] = "Poor";
$questions_answer["en"]["radio"][3] = "Enough";
$questions_answer["en"]["radio"][4] = "A lot";

$questions_answer["it"]["radio"][1] = "Per niente";
$questions_answer["it"]["radio"][2] = "Poco";
$questions_answer["it"]["radio"][3] = "Abbastanza";
$questions_answer["it"]["radio"][4] = "Molto";

// question answer select
$questions_answer["select"][0] = 3; // number of choices
$questions_answer["en"]["select"][1] = "Male";
$questions_answer["en"]["select"][2] = "Female";
$questions_answer["en"]["select"][3] = "Prefer not to answer";

$questions_answer["it"]["select"][0] = 4;
$questions_answer["it"]["select"][1] = "...";
$questions_answer["it"]["select"][2] = "Maschio";
$questions_answer["it"]["select"][3] = "Femmina";
$questions_answer["it"]["select"][4] = "Preferisco non rispondere";

// question answer number
$questions_answer["number"][0] = 2;
$questions_answer["number"][1] = 14; // min
$questions_answer["number"][2] = 99; // max

// question answer radio-bis (for different values)
$questions_answer["radio-bis"][0] = 5; // number of choices
$questions_answer["it"]["radio-bis"][1] = "Variabili";
$questions_answer["it"]["radio-bis"][2] = "Tipi di dato e conversioni";
$questions_answer["it"]["radio-bis"][3] = "Istruzioni condizionali (if) e cicli (for)";
$questions_answer["it"]["radio-bis"][4] = "Liste e dizionari";
$questions_answer["it"]["radio-bis"][5] = "Funzioni";


$questions_answer["radio-ter"][0] = 4; // number of choices
$questions_answer["it"]["radio-ter"][1] = "Si";
$questions_answer["it"]["radio-ter"][2] = "No, sceglierei prima tipi di dato / conversioni";
$questions_answer["it"]["radio-ter"][3] = "No, sceglierei prima liste / dizionari";
$questions_answer["it"]["radio-ter"][4] = "No, sceglierei prima if / for";


function survey_save($projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11, $answer_12, $answer_13, $answer_14)
{
	include "connectDB.php";
	$stmt = "";
	// INSERT INTO `netlogo`.`survey` (`idSurvey`, `projectID`, `sessionID`, `lang`, `answer-1`, `answer-2`, `answer-3`, `answer-4`, `answer-5`, `answer-6`, `answer-7`, `answer-8`, `answer-9`, `answer-10`, `answer-11`) VALUES ('1', '1', '1', '1', '1', '1', '2', '3', '4', '5', '6', '7', '8', '9', '9');

	$query = "INSERT INTO survey (`projectID`, `sessionID`, `lang`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `answer_10`, `answer_11`, `answer_12`, `answer_13`, `answer_14`) ";
	$query .= "VALUES ";
	$query .= "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11, $answer_12, $answer_13, $answer_14]);
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