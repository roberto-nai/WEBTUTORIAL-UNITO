<?php

$project_id = 1; // <-- INPUT (1: NetLogo, 2: Python, 3: ...)

$project_name = "NetLogo"; // <-- INPUT

$page_level = 1; // <-- INPUT: initial page level when session starts

$page_level_reached = 1; // <-- INPUT: page level reached by user when session starts

$language_default = "EN"; // default language (EN)

$last_level = 8; // last level (the page $last_level-1 is the last one - survey or not -)

$quiz_mandatory = 0; // <-- INPUT: 1, the quiz is blocking, 0 is not blocking

$env = 0; //// <-- INPUT: environment 0 staging (local development), 1 production (online)

// echo print $_SERVER['SCRIPT_FILENAME'];

?>