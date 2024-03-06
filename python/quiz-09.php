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

 quiz_level_check($page_level, $_SESSION['page_level_reached'], $page_next);

 $lang = $_SESSION['lang'];

 // echo "livello raggiunto: ". $_SESSION['page_level_reached'];
?>
<?php 
  include "./model/quizDB.php";
?>  
<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include "head.php"; ?>
  <script defer type="text/javascript" src="./view/quizSave.js"></script> <!-- specific events for quiz -->

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include "header_left.php"; ?>

      <br /><br />
      
      <?php include_once('menu.php'); ?>
      
      <?php // include "header_right.php"; ?>

    </header>
  </div>

  <div class="container" id='quiz-00'>
    <img src="../assets/images/quiz.png" alt="quiz" />
  </div>
  <br />
  <div class="container" id='quiz-01'>
    <h2 class="text-primary">DIZIONARIO</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            Dato il seguente dizionario:<br />
            <code>
            Ligue1 = {"Lyon": 18, "Reims": 20 ,"PSG": 22}<br />
            
          </code>
            <br />
          </p>
        </div>
    </div>
  </div>
  <br />
  <div class="container" id='quiz-02'>
    <p>Quale istruzione mi permette di ottenere 22 ? </p>
  <?php
      $n = $questions[$page_name][0]; // the number of questions for this level
      for ($i=1; $i<=$n; $i++){
        echo "<div class=\"form-check\"> \n";
        echo "<input class=\"form-check-input\" type=\"radio\" name=\"quizRadios\" id=\"answer-".$i. "\" value=\"".$i."\"> \n";
        echo "<label class=\"form-check-label\" for=\"answer-".$i. "\"> \n";
        echo $questions[$page_name][$i] ."\n";
        echo "</label> \n";
        echo "</div> \n";
      }
  ?>
  <br />
  <button type="button" class="btn btn-primary" id="btnSubmit"><?php echo $gui_text[2][$lang];?></button>
  <br /><br />
 <div id="answer_correct" class="alert alert-success">
    <strong>Risposta corretta!</strong> Prosegui al prossimo livello
  </div>
  <div id="answer_wrong" class="alert alert-danger">
    <strong>On no!</strong> La risposta non é corretta :-(
  </div>
  <div id="answer_empty" class="alert alert-warning">
    <strong>Attenzione!</strong> Inserire una risposta, per favore
  </div>
  </div>

  

  <br />

  <div class="container text-center">
    <!-- <a href="./page-0<?php echo $page_level++;?>.php" id="aNext"><button type="button" class="btn btn-secondary btn-lg" id="btnNext">NEXT ❯</button></a> -->
    <a href="#" id="aNext"><button type="button" class="btn btn-secondary btn-lg" id="btnNext"><?php echo $gui_text[1][$lang];?> ❯</button></a>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>