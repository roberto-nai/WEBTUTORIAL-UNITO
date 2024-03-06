<?php

function page_next_file($page_name, $menu_name)
{
     // given a file name (page_name), get the data about next page to be shown
     $json = file_get_contents('menu.json');
     $json_data = json_decode($json, true);    // decode the JSON file
     $menu_1 = $json_data[$menu_name];
     
     // get the page name
     // check the page number to decide if menu_1 or menu_x
    foreach($menu_1 as $menu_entry) 
    {
        if ($menu_entry['file'] == $page_name) // if the page is found, return the next one
        {
            return $menu_entry['nextFile'];
        }
    }
}

function page_order($page_name, $menu_name)
{
     // given a file name (page_name), get the data about order
     $json = file_get_contents('menu.json');
     $json_data = json_decode($json, true);    // decode the JSON file
     $menu_1 = $json_data[$menu_name];

     // get the page name
     foreach($menu_1 as $menu_entry) 
     {
         if ($menu_entry['file'] == $page_name) // if the page is found, return the next one
         {
             return $menu_entry['order'];
         }
     }
}

function page_title($page_name, $menu_name)
{
     // given a file name (page_name), get the data about title
     $json = file_get_contents('menu.json');
     $json_data = json_decode($json, true);    // decode the JSON file
     $menu_1 = $json_data[$menu_name];

     // get the page name
     foreach($menu_1 as $menu_entry) 
     {
         if ($menu_entry['file'] == $page_name) // if the page is found, return the next one
         {
             return $menu_entry['title'];
         }
     }
}

function page_level_check($page_level) // check the page level; if the actual page is > the page_level_reached send back to page 1
{
    // echo "Livello pagina: ". $page_level. " Livello sessione: " . $_SESSION['page_level_reached']; // debug
    if ($page_level > intval($_SESSION['page_level_reached']))
    {
        $newURL = "./page-01.php";
        header('Location: '. $newURL);
        die();
    }
}

function page_by_order($page_level) // given the page level (order), return the page file name
{
    if (intval($page_level) == 1 || intval($page_level) == 2 || intval($page_level) == 3)
    {
        $menu_name = 'menu_1';
    }
    else
    {
        $menu_name = $_SESSION['sub_menu'];
    }

    $json = file_get_contents('menu.json');
    $json_data = json_decode($json, true);    // decode the JSON file
    $menu_1 = $json_data[$menu_name];

    foreach($menu_1 as $menu_entry) 
     {
        if ($menu_entry['order'] == intval($page_level)) // if the page is found, return the next one
        {
            return $menu_entry['file'];
        }
     }
}

function quiz_by_order($page_level) // given the page level (order), return the quiz file name
{
    if (intval($page_level) == 1 || intval($page_level) == 2 || intval($page_level) == 3)
    {
        $menu_name = 'menu_1';
    }
    else
    {
        $menu_name = $_SESSION['sub_menu'];
    }

    $json = file_get_contents('menu.json');
    $json_data = json_decode($json, true);    // decode the JSON file
    $menu_1 = $json_data[$menu_name];

    foreach($menu_1 as $menu_entry) 
     {
        if ($menu_entry['order'] == intval($page_level)) // if the page is found, return the next one
        {
            $sub_page_name = substr($menu_entry['file'],0,4); // get the subname to check if page or quiz
            if ($sub_page_name=="page") // skip the page
                continue;
            return $menu_entry['file'];
        }
     }
}

function quiz_level_check($page_level, $page_level_reached, $page_next)  // check the quiz level; if the level reached is > the quiz level skip it
{
    if (intval($page_level_reached) > $page_level)
    {
        $newURL = $page_next;
        header('Location: '. $newURL);
        die();
    }
}

function http_check($page_name, $tutorial_url)
{
    $protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
    if ($protocol=='http')
    {
        $newURL = $tutorial_url."/".$page_name;
        header('Location: '. $newURL);
        die();
    }
}

function page_box_check()
{
    if (isset($_SESSION["page_box_passed"]))
    {
        if (intval($_SESSION["page_box_passed"]) == 1)
        {
            $newURL = $_SESSION["page_box_page"];
            header('Location: '. $newURL);
            die();
        }
    }
}


function randomGen($min, $max, $quantity) 
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

?>