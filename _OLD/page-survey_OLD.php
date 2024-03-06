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

  <div class="container" id='survey-00'>
    <img src="../assets/images/survey.png" alt="survey" />
  </div>
  <br />
  <div class="container" id='survey-01'>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2 class="text-primary"><?php echo $gui_text[4][$lang]; ?></h2>
          <br />
          <i><?php echo $gui_text[5][$lang]; ?></i>
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
  <input type="hidden" name="menu" id="menu" value="" />
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
            echo "<input class=\"form-check-input\" type=\"radio\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" value=\"".$j."\">\n";
            echo "<label class=\"form-check-label\" for=\"answer-".$j. "\"> \n";
            echo $questions_answer[$lang][$question_type][$j] . "\n";
            echo "</label> \n";
            echo "</div> \n";
          }
        }

        // radio
        if ($question_type == "radio-bis")
        {
          $m = $questions_answer[$question_type][0]; // number of choices
          for ($j=1; $j<=$m; $j++)
          {
            echo "<div class=\"form-check\"> \n";
            echo "<input class=\"form-check-input\" type=\"radio\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" value=\"".$j."\">\n";
            echo "<label class=\"form-check-label\" for=\"answer-".$j. "\"> \n";
            echo $questions_answer[$lang][$question_type][$j] . "\n";
            echo "</label> \n";
            echo "</div> \n";
          }
        }

         // radio
         if ($question_type == "radio-ter")
         {
           $m = $questions_answer[$question_type][0]; // number of choices
           for ($j=1; $j<=$m; $j++)
           {
             echo "<div class=\"form-check\"> \n";
             echo "<input class=\"form-check-input\" type=\"radio\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" value=\"".$j."\">\n";
             echo "<label class=\"form-check-label\" for=\"answer-".$j. "\"> \n";
             echo $questions_answer[$lang][$question_type][$j] . "\n";
             echo "</label> \n";
             echo "</div> \n";
           }
         }

         // checkbox
         if ($question_type == "checkbox")
         {
           $m = $questions_answer[$question_type][0]; // number of choices
           for ($j=1; $j<=$m; $j++)
           {
             echo "<div class=\"form-check\"> \n";
             echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" value=\"".$j."\">\n";
             echo "<label class=\"form-check-label\" for=\"answer-".$j. "\"> \n";
             echo $questions_answer[$lang][$question_type][$j] . "\n";
             echo "</label> \n";
             echo "</div> \n";
           }
         }

        // select
        if ($question_type == "select")
        {
          // echo "<div class=\"form-check\"> \n";
          echo "<select name=\"survey-".$i. "\" id=\"survey-".$i. "\">";
          $m = $questions_answer[$question_type][0]; // number of choices
          for ($j=1; $j<=$m; $j++)
          {
            echo "<option value=\"".$j."\">".$questions_answer[$lang][$question_type][$j]."</option>";  
          }
          echo "</select>";
          // echo "</div> \n";
          echo "<br />";
        }

         // number
        if ($question_type == "number")
        {
          echo "<input type=\"number\" name=\"survey-".$i. "\" id=\"survey-".$i. "\" min=\"".$questions_answer[$question_type][1]."\" max=\"".$questions_answer[$question_type][2]."\" maxlength=\"2\" size=\"10\">";
          echo "<br />";
        }

        echo "<br />";
      }
  ?>
  <br />
  <?php
  // check if survey already
    if (intval($_SESSION['page_level_reached']) <= $last_level)
    {
      echo "<button type=\"submit\" class=\"btn btn-primary\" id=\"btnSubmit\">";
      echo $gui_text[2][$lang];
      echo "</button>";
    }
  ?>
  </form>
  <br />
  <div id="answer_correct" class="alert alert-success">
    <strong><?php echo $gui_text[6][$lang]; ?>! </strong><?php echo $gui_text[7][$lang]; ?>.
  </div>
  <div id="answer_wrong" class="alert alert-danger">
    <strong><?php echo $gui_text[8][$lang]; ?>! </strong> <?php echo $gui_text[8][$lang]; ?>.
  </div>
  <div id="answer_empty" class="alert alert-warning">
    <strong><?php echo $gui_text[10][$lang]; ?>! </strong> <?php echo $gui_text[11][$lang]; ?>.
  </div>
  </div>

  <div class="b-divider"></div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>