<?php
   
?>

<?php



  
// Display data (debug)
// print_r($json_data);

$menu_1 = $json_data['menu_1'];
$menu_2 = $json_data['menu_2']; // submenu
$menu_3 = $json_data['menu_3']; // submenu
$menu_4 = $json_data['menu_4']; // submenu

foreach($menu_1 as $menu_entry) 
{
    echo "<li>";
    echo "<a href=\"./".$menu_entry['file']."\"";
    if (intval($_SESSION['page_level_reached']) > intval($menu_entry['order']))
    {
        echo "class=\"nav-link px-2 link-success\"";  // class="nav-link px-2 link-success"
    }
    else
    {
        echo "class=\"nav-link px-2\"";
    }
    echo ">"; // close the <a> tag
    echo $menu_entry['order'] . ".";
    echo $menu_entry['title'];
    echo "</a>";
    echo "</li>";
}

?>