<?php
/*
* Controller 
*/
?>

<?php

session_start();

include '../model/eventsDB.php'; // --> model
include '../model/quizDB.php'; // --> model
include '../model/surveyDB.php'; // --> model

$action = "event_get";

if (isset($_POST['action']))
{
  $action = $_POST['action'];
}

switch ($action)
{
    case "event_get":
      // caller: loadEvents(table)
        event_get($_POST['project_id']);
    break;

    case "quiz_get":
      quiz_get($_POST['project_id']);
    break;

    case "survey_get":
      survey_get($_POST['project_id']);
    break;
}