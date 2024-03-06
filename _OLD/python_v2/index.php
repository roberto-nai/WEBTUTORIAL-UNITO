<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  if ($page_name == "index.php")
  {
    $page_order = "0";
    $page_level = intval($page_order);
    $next_level = $page_level + 1;

  }
  else
  {
    $parts_1 = explode("-", $page_name); // separate from the filename the number (page-01.php -> 01.php)
    if (count($parts_1) == 2) // is a page-xx
    { 
      $parts_2 = explode(".", $parts_1[1]); // 01.php --> 01
      $page_order = $parts_2[0];
      $page_level = intval($page_order); // for page level in session (the int version of $page_order)
      $next_level = $page_level + 1;
    }
  }
 
  session_update($page_level, $language_default, $quiz_mandatory);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>
<?php

function randomGen($min, $max, $quantity) 
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$box_array = randomGen(1,3,3); //generates 3 unique random numbers

?>

<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <!-- <script defer type="text/javascript" src="./view/eventsSave.js"></script> --> <!-- specific events for page -->
  
  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>
      
      <?php include_once("header_right.php"); ?>

    </header>
  </div>

  <div class="container" id='paragrafo-01'>
    <div class="box_container">
        <div class="box" id='box-01'><?php $file_name = "box_".$box_array[0].".php"; include_once($file_name);?></div>
        <div class="box" id='box-02'><?php $file_name = "box_".$box_array[1].".php"; include_once($file_name);?></div>
        <div class="box" id='box-03'><?php $file_name = "box_".$box_array[2].".php"; include_once($file_name);?></div>
    </div>
  </div>


  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>