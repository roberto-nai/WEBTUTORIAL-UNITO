<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a page-xx
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session
  }

  include "./model/quizDB.php";

  session_update($page_level, $language_default);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
  
?>
<!doctype html>
<html lang="en">
  
  <?php include "head.php"; ?>
  <script defer type="text/javascript" src="./view/quizSave.js"></script> <!-- specific events for quiz -->

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include "header_left.php"; ?>
      
      <?php include_once('menu.php'); ?>
      
      <?php include "header_right.php"; ?>

    </header>
  </div>

  <div class="container" id='quiz-00'>
    <img src="../assets/images/quiz.png" alt="quiz" />
  </div>
  <br />
  <div class="container" id='quiz-01'>
    <h2 class="text-primary">#6. Simulation</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>To proceed please answer the question:</p>
        </div>
    </div>
  </div>
  <br />
  <div class="container" id='quiz-02'>
    <p>Which of the following questions is incorrect?</p>
  <?php
      $n = $questions[$page_level][0]; // the number of questions for this level
      for ($i=1; $i<=$n; $i++){
        echo "<div class=\"form-check\"> \n";
        echo "<input class=\"form-check-input\" type=\"radio\" name=\"quizRadios\" id=\"answer-".$i. "\" value=\"".$i."\"> \n";
        echo "<label class=\"form-check-label\" for=\"answer-".$i. "\"> \n";
        echo $questions[$page_level][$i] ."\n";
        echo "</label> \n";
        echo "</div> \n";
      }
  ?>
  <br />
  <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
  <br /><br />
  <div id="answer_correct" class="alert alert-success">
    <strong>Correct answer!</strong> You can proceed on the next level.
  </div>
  <div id="answer_wrong" class="alert alert-danger">
    <strong>On no!</strong> Your answer is wrong, try again.
  </div>
  <div id="answer_empty" class="alert alert-warning">
    <strong>Attention!</strong> Your answer is empty, try again.
  </div>
  </div>

  

  <div class="b-divider"></div>

  <div class="container text-center">
    <!-- <a href="./page-0<?php echo $page_level++;?>.php" id="aNext"><button type="button" class="btn btn-secondary btn-lg" id="btnNext">NEXT ❯</button></a> -->
    <a href="#" id="aNext"><button type="button" class="btn btn-secondary btn-lg" id="btnNext">NEXT ❯</button></a>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>