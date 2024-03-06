<?php
/*
* Controller 
*/
?>

<?php

session_start();

include '../model/eventsDB.php'; // --> model

include '../model/quizDB.php';

include '../model/surveyDB.php';

$action = "event_save";

if (isset($_POST['action']))
{
  $action = $_POST['action'];
}

switch ($action)
{
    case "event_save":
        // caller: savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang)
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $pageName = $_POST['pageName'];
        $pageOrder = $_POST['pageOrder']; 
        $pagePara = $_POST['pagePara']; 
        $event = $_POST['event'];  
        $duration = $_POST['duration'];  
        $lang = $_POST['lang'];
        event_save($projectID, $sessionID, $pageName, $pageOrder, $pagePara, $event, $duration, $lang);
    break;

    case "quiz_save":
        // caller: quizSave(projectID, sessionID, pageName, pageOrder, answerNum, answerCorrect, lang)
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $pageName = $_POST['pageName'];
        $pageOrder = $_POST['pageOrder']; 
        $answerNum = intval($_POST['answerNum']); 
        $answerCorrect = intval($_POST['answerCorrect']);  
        $lang = $_POST['lang'];
        quiz_save($projectID, $sessionID, $pageName, $pageOrder, $answerNum, $answerCorrect, $lang);
    break;

    case "quiz_check":
        // caller: quizCheck(pageLevel, answer)
        $page_level = $_POST['page_level']; 
        $answer = $_POST['answer'];
        $quiz_mandatory = $_POST['quiz_mandatory']; 
        quiz_check($page_level, $answer, $quiz_mandatory);
    break;

    case "survey_save":
        // caller: surveySave()
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $lang = $_POST['lang'];
        $answer_1 = intval($_POST['survey-1']);
        $answer_2 = intval($_POST['survey-2']);
        $answer_3 = intval($_POST['survey-3']);
        $answer_4 = intval($_POST['survey-4']);
        $answer_5 = intval($_POST['survey-5']);
        $answer_6 = intval($_POST['survey-6']);
        $answer_7 = intval($_POST['survey-7']);
        $answer_8 = intval($_POST['survey-8']);
        $answer_9 = intval($_POST['survey-9']);
        $answer_10 = intval($_POST['survey-10']);
        $answer_11 = intval($_POST['survey-11']);

        survey_save($projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11);

    break;

    

}