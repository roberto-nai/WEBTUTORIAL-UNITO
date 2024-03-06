<?php
 include "settings.php";
 include "session.php";
 include "functions.php";

 $menu_name = $default_menu; // <- INPUT

 $page_name = basename($_SERVER['PHP_SELF']); // filename
 
 $page_next = page_next_file($page_name, $menu_name);    // get the next file to be shown
 $page_level = page_order($page_name, $menu_name);       // get the order (level) of the page
 $page_title = page_title($page_name, $menu_name);       // get the title of the page
 $page_order = "0".$page_level;

 session_update($page_level, $language_default, $quiz_mandatory);

 page_level_check($page_level);

 $lang = $_SESSION['lang'];

 // echo "livello raggiunto: ". $_SESSION['page_level_reached'];
?>
<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script>

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
    <?php include_once("header_left.php"); ?>

    <br /><br />
      
      <?php include_once('menu.php'); ?>
      
      <?php // include_once("header_right.php"); ?>

    </header>
  </div>

  <br /> <br />

  <!-- CONTENUTO STATICO DELLA PAGINA -->

  <?php
    include "page-03-content.php";
  ?>

  <div class="container text-center">
      <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>