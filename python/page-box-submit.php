<?php

include "session.php";

if (isset($_POST["btn_submit"]))
{
  if (isset($_POST["menu_value"]) && isset($_POST["page_value"]))
  {
    $_SESSION["sub_menu"] = $_POST["menu_value"];
    $_SESSION["page_box_passed"] = 1; // set the page passed to not be shown again
    // echo $_SESSION["sub_menu"]; // debug
    $newURL = $_POST["page_value"]; // redirect in JS
    $_SESSION["page_box_page"] = $_POST["page_value"]; // save in session the page chosen
    header('Location: '. $newURL);
    die();
  }
}

?>