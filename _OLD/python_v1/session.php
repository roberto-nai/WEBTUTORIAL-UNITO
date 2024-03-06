<?php

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    function session_update($page_level, $language_default, $quiz_mandatory) // $page_level actual visiting page, $_SESSION['page_level_reached'] last visited page
    {
        // check page level earned and update it
            
        if (!isset($_SESSION['page_level_reached']) || empty($_SESSION['page_level_reached']))
        {
            $_SESSION['page_level_reached'] = 1;
        }
        else
        {
            /*
            if ($page_level >  intval($_SESSION['page_level_reached'])) // update the level only if it's a new page level (no rollback) --> moved on quiz
            {
                $_SESSION['page_level_reached'] = $page_level;
            }
            */
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

    function page_level_check($page_level)
    {
        if ($page_level > intval($_SESSION['page_level_reached']))
        {
            if (intval($_SESSION['page_level_reached']) >= 10)
            {
                $newURL = "./page-" . $_SESSION['page_level_reached'] . ".php";
            }
            else
            {
                $newURL = "./page-0" . $_SESSION['page_level_reached'] . ".php";
            }
            
            header('Location: '. $newURL);
            die();
        }
        
    }

    

?>