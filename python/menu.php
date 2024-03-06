<?php
    $page_name = basename($_SERVER['PHP_SELF']); // file name on the URL
    // echo $_SESSION['lang']; // debug

    if ($page_name == "page-box.php")
        echo "<h6>Livello raggiunto: " . (intval($_SESSION['page_level_reached'])-1). "</h6>";
    else
    {
        if (intval($_SESSION['page_level_reached']) == $last_level)
            echo "<h6>Livello raggiunto: " . (intval($_SESSION['page_level_reached'])-1)."</h6>";
        else
        echo "<h6>Livello raggiunto: " . intval($_SESSION['page_level_reached'])."</h6>";
    }

    function generate_menu($input_menu, $page_name, $page_level)
    {
        foreach($input_menu as $menu_entry) 
        {
            $sub_page_name = substr($menu_entry['file'],0,4); // get the subname to check if page or quiz
            if ($sub_page_name=="quiz") // skip the quiz
                continue;
            if ($menu_entry['file']=="page-box.php") // skip the page box
                continue;
            if ($menu_entry['file']=="page-survey.php") // skip the page survey
                continue;
            echo "<li class=\"nav-item\" >";
            // $a = ;
            if (intval($_SESSION['page_level_reached']) < intval($menu_entry['order']))
            {
                echo "<a href=\"#\" ";
            }
            echo "<a href=\"./".$menu_entry['file']."\"";
            if ($page_name == $menu_entry['file'] || $page_level == intval($menu_entry['order']))
            {
                // echo "class=\"nav-link px-2 link-success\"";  // class="nav-link px-2 link-success"
                echo "class=\"nav-link active\"";
            }
            else
            {
                // echo "class=\"nav-link px-2\"";
                echo "class=\"nav-link\"";
            }
            echo ">"; // close the <a> tag
            echo $menu_entry['order'] . ".";
            echo $menu_entry['title'];
            echo "</a>";
            echo "</li>";
        }
    }
?>

<!-- <ul class="nav col-13 col-md-auto mb-2 justify-content-center mb-md-0" style="text-align:left"> -->

<nav class="navbar navbar-expand-sm bg-light navbar-light">
<div class="container-fluid">
    <ul class="navbar-nav">

<?php

$json = file_get_contents('menu.json');
  
// Decode the JSON file
$json_data = json_decode($json,true);
  
// Display data (debug)
// print_r($json_data);

$main_menu = $json_data['menu_1'];

generate_menu($main_menu, $page_name, $page_level); // $page_level from the container page

if (isset($_SESSION["sub_menu"]))
{   
    $sub_menu = $json_data[$_SESSION["sub_menu"]]; // submenu can be menu_2, menu_3, menu_4
    generate_menu($sub_menu, $page_name, $page_level);
}
else // generate empty items for layout purposes
{
    echo "<li class=\"nav-item\">";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "</li>";
}
   
?>

</ul>
</div>
</nav>