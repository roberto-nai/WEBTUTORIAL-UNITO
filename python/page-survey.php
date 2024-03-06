<?php
 include "settings.php";
 include "session.php";
 include "functions.php";

 if (!isset($_SESSION["sub_menu"]))
  $menu_name = $default_submenu;
 else
  $menu_name = $_SESSION["sub_menu"]; 

 $page_name = basename($_SERVER['PHP_SELF']); // filename
 $page_next = page_next_file($page_name, $menu_name);    // get the next file to be shown
 $page_level = page_order($page_name, $menu_name);       // get the order (level) of the page
 $page_title = page_title($page_name, $menu_name);       // get the title of the page
 $page_order = "0".$page_level;

 session_update($page_level, $language_default, $quiz_mandatory);

 // page_level_check($page_level);

 $lang = $_SESSION['lang'];

 // echo "livello raggiunto: ". $_SESSION['page_level_reached'];
?>

<?php
  include "./model/surveyDB.php"; // specific for survey page
?>

<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include "head.php"; ?>
  <script defer type="text/javascript" src="./view/surveySave.js"></script> <!-- specific events for quiz -->

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include "header_left.php"; ?>

      <br /><br />
      
      <?php include_once('menu.php'); ?>

      <?php // include "header_right.php"; ?>

    </header>
  </div>

  <!-- CONTENUTO STATICO DELLA PAGINA -->
  <?php
    include "page-survey-content.php";
  ?>

  <div class="b-divider"></div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>