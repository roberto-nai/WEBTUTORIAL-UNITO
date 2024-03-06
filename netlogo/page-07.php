<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a quiz-xx 
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session
  }

   session_update($page_level, $language_default);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
 
  include "./model/surveyDB.php";
?>
<!doctype html>
<html lang="en">
  
  <?php include "head.php"; ?>
  <script defer type="text/javascript" src="./view/surveySave.js"></script> <!-- specific events for quiz -->

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include "header_left.php"; ?>
      
      <?php include_once('menu.php'); ?>
      
      <?php include "header_right.php"; ?>

    </header>
  </div>

  <div class="container" id='survey-00'>
    <img src="../assets/images/survey.png" alt="survey" />
  </div>
  <br />
  <div class="container" id='survey-01'>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2 class="text-primary">Please answer the questions:</h2>
          <br />
          <i>An answer to each question is required</i>
        </div>
    </div>
  </div>
  <br />
  <div class="container" id='survey-02'>
  <form method="post" id="survey_form" name="survey_form">
  <input type="hidden" name="action" id="action" value="survey_save" />
  <input type="hidden" name="projectID" id="projectID" value="" />
  <input type="hidden" name="sessionID" id="sessionID" value="" />
  <input type="hidden" name="lang" id="lang" value="" />
  <?php
      $n = $questions[$lang][0]; // the number of questions 
      for ($i=1; $i<=$n; $i++)
      {
        echo "<h4>" . $questions[$lang][$i] ."</h4> \n";
        
        echo "<br />";

        // get question type
        $question_type = $questions_type[$i];

        // radio
        if ($question_type == "radio")
        {
          $m = $questions_answer[$question_type][0]; // number of choices
          for ($j=1; $j<=$m; $j++)
          {
            echo "<div class=\"form-check\"> \n";
            echo "<input class=\"form-check-input\" type=\"radio\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" value=\"".$j."\" required>\n";
            echo "<label class=\"form-check-label\" for=\"answer-".$j. "\"> \n";
            echo $questions_answer[$question_type][$j] . "\n";
            echo "</label> \n";
            echo "</div> \n";
          }
        }

        // select
        if ($question_type == "select")
        {
          // echo "<div class=\"form-check\"> \n";
          echo "<select name=\"survey-".$i. "\" id=\"survey-".$i. "\" required>";
          $m = $questions_answer[$question_type][0]; // number of choices
          for ($j=1; $j<=$m; $j++)
          {
            echo "<option value=\"".$j."\">".$questions_answer[$question_type][$j]."</option>";  
          }
          echo "</select>";
          // echo "</div> \n";
          echo "<br />";
        }

         // number
        if ($question_type == "number")
        {
          echo "<input type=\"number\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" min=\"".$questions_answer[$question_type][1]."\" max=\"".$questions_answer[$question_type][2]."\" maxlength=\"2\" size=\"10\" required>";
          echo "<br />";
        }

        echo "<br />";
      }
  ?>
  <br />
  <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
  </form>
  <br /><br />
  <div id="answer_correct" class="alert alert-success">
    <strong>Thanks!</strong> Your answers were saved.
  </div>
  <div id="answer_wrong" class="alert alert-danger">
    <strong>Error!</strong> Your answers were not saved.
  </div>
  <div id="answer_empty" class="alert alert-warning">
    <strong>Attention!</strong> Your answer is empty, try again.
  </div>
  </div>

  <div class="b-divider"></div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>