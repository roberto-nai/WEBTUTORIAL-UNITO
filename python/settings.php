<?php

include_once "settings_environment.php";

$project_id = 2; // <-- INPUT (1: NetLogo, 2: Python, 3: ...)

$project_name = "Python"; // <-- INPUT

$page_level = 1; // <-- INPUT: initial page level

$page_level_reached = 1; // <-- INPUT: page level reached by user at session_start

$language_default = "it"; // // <-- INPUT default language (it or en)

$last_level = 11; // <-- INPUT: last level (the page $last_level - 1 is the last one - if you wante the survey as page-10 set $last_level = 11 -)

$quiz_mandatory = 1;  // <-- INPUT: 1, the quiz is blocking, 0 is not blocking

$default_menu = "menu_1";

$default_submenu = "menu_2";

$tutorial_url = "https://webtutorial.altervista.org/python";

// 2024-03-05: Google Form
// https://docs.google.com/forms/d/e/1FAIpQLSeMRzDcqpUkkQgR6gHioTCJVctjqH23IrI-mnyVsy75OxX-yA/viewform?usp=pp_url&entry.438196924=@SESSIONID
$google_form = "https://docs.google.com/forms/d/e/1FAIpQLSeMRzDcqpUkkQgR6gHioTCJVctjqH23IrI-mnyVsy75OxX-yA/viewform?usp=pp_url&entry.438196924=";
$google_form_target = "_self"; // if the page should open in the same or a new window

// echo print $_SERVER['SCRIPT_FILENAME'];

// 18:02/2023: use the menu.json

// GUI texts

$gui_text[1]["it"] = "AVANTI";
$gui_text[2]["it"] = "Consegna";
$gui_text[3]["it"] = "Rispondi a tutte le domande";
$gui_text[4]["it"] = "Per favore rispondi alle seguenti domande"; 
$gui_text[5]["it"] = "Per ogni domanda e' richiesta una risposta"; 
$gui_text[6]["it"] = "Grazie"; 
$gui_text[7]["it"] = "Le tue risposte sono state salvate"; 
$gui_text[8]["it"] = "Errore"; 
$gui_text[9]["it"] = "Le tue risposte non sono state salvate"; 
$gui_text[10]["it"] = "Attenzione"; 
$gui_text[11]["it"] = "Le tue risposte sono vuote, riprova";

$gui_text[1]["en"] = "Next";
$gui_text[2]["en"] = "Submit";
$gui_text[3]["en"] = "Answer to the questions";
$gui_text[4]["en"] = "Please answer the questions:"; 
$gui_text[5]["en"] = "An answer to each question is required"; 
$gui_text[6]["en"] = "Grazie"; 
$gui_text[7]["en"] = "Le tue risposte sono state salvate"; 
$gui_text[8]["en"] = "Errore"; 
$gui_text[9]["en"] = "Le tue risposte non sono state salvate"; 
$gui_text[10]["en"] = "Attenzione"; 
$gui_text[11]["en"] = "Le tue risposte sono vuote, riprova";


?>