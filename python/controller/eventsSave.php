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
        // caller: savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu)
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $pageName = $_POST['pageName'];
        $pageOrder = $_POST['pageOrder']; 
        $pagePara = $_POST['pagePara']; 
        $event = $_POST['event'];  
        $duration = $_POST['duration'];  
        $lang = $_POST['lang'];
        $pageTitle = $_POST['pageTitle'];
        $pageMenu = $_POST['pageMenu'];
        event_save($projectID, $sessionID, $pageName, $pageOrder, $pagePara, $event, $duration, $lang, $pageTitle, $pageMenu);
    break;

    case "quiz_save":
        // caller: quizSave(projectID, sessionID, pageName, pageOrder, answerNum, answerCorrect, lang, pageTitle, pageMenu)
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $pageName = $_POST['pageName'];
        $pageOrder = $_POST['pageOrder']; 
        $answerNum = intval($_POST['answerNum']); 
        $answerCorrect = intval($_POST['answerCorrect']);  
        $lang = $_POST['lang'];
        $pageTitle = $_POST['pageTitle'];
        $pageMenu = $_POST['pageMenu'];
        quiz_save($projectID, $sessionID, $pageName, $pageOrder, $answerNum, $answerCorrect, $lang, $pageTitle, $pageMenu);
    break;

    case "quiz_check":
        // caller: quizCheck(pageLevel, answer)
        $page_level = $_POST['page_level']; 
        $answer = $_POST['answer'];
        $quiz_mandatory = $_POST['quiz_mandatory']; 
        $page_name = $_POST['page_name']; 
        quiz_check($page_level, $answer, $quiz_mandatory, $page_name);
    break;

    case "survey_save":
        // caller: surveySave()
        $projectID = $_POST['projectID'];
        $sessionID = $_POST['sessionID'];
        $lang = $_POST['lang'];

        if (isset($_POST['survey-1']))
            $answer_1 = intval($_POST['survey-1']);
        else
            $answer_1 = null;

        if (isset($_POST['survey-2']))
            $answer_2 = intval($_POST['survey-2']);
        else
            $answer_2 = null;
        
        if (isset($_POST['survey-3']))
            $answer_3 = intval($_POST['survey-3']);
        else
            $answer_3 = null;
        
        if (isset($_POST['survey-4']))
            $answer_4 = intval($_POST['survey-4']);
        else
            $answer_4 = null;

        if (isset($_POST['survey-5']))
            $answer_5 = intval($_POST['survey-5']);
        else
            $answer_5 = null;

        if (isset($_POST['survey-6']))
            $answer_6 = intval($_POST['survey-6']);
        else
            $answer_6 = null;

        if (isset($_POST['survey-7']))
            $answer_7 = intval($_POST['survey-7']);
        else
            $answer_7 = null;
        
        if (isset($_POST['survey-8']))
            $answer_8 = intval($_POST['survey-8']);
        else
            $answer_8 = null;

        if (isset($_POST['survey-9']))
            $answer_9 = intval($_POST['survey-9']);
        else
            $answer_9 = null;
        
        if (isset($_POST['survey-10']))
            $answer_10 = intval($_POST['survey-10']);
        else
            $answer_10 = null;
    
        if (isset($_POST['survey-11']))
            $answer_11 = intval($_POST['survey-11']);
        else
            $answer_11 = null;

        if (isset($_POST['survey-12']))
            $answer_12 = intval($_POST['survey-12']);
        else
            $answer_12 = null;

        if (isset($_POST['survey-13']))
            $answer_13 = intval($_POST['survey-13']);
        else
            $answer_13 = null;

        if (isset($_POST['survey-14']))
            $answer_14 = intval($_POST['survey-14']);
        else
            $answer_14 = null;

        survey_save($projectID, $sessionID, $lang, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8, $answer_9, $answer_10, $answer_11, $answer_12, $answer_13, $answer_14);

        $new_level = intval($_SESSION['page_level_reached']) + 1;
		$_SESSION['page_level_reached'] = $new_level;


    break;

    

}