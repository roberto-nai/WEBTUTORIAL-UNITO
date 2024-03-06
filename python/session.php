<?php

    if (session_status() !== PHP_SESSION_ACTIVE) 
    {
        session_start();
        $_SESSION['main_menu'] = "menu_1";   // constant
        // $_SESSION['sub_menu'] = "menu_2"; 
    }

    function session_update($page_level, $language_default, $quiz_mandatory) // $page_level actual visiting page, $_SESSION['page_level_reached'] last visited page
    {
        // check page level earned and update it
            
        if (!isset($_SESSION['page_level_reached']) || empty($_SESSION['page_level_reached']))
        {
            $_SESSION['page_level_reached'] = 1; // 18/02/2023: to be used with "order" from menu.json
        }

        if (!isset($_SESSION['lang']) || empty($_SESSION['lang']))
        {
            $_SESSION['lang'] = $language_default;
        }

        if (!isset($_SESSION['quiz_mandatory']) || empty($_SESSION['quiz_mandatory']))
        {
            $_SESSION['quiz_mandatory'] = $quiz_mandatory;
        }
    }
?>