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
    $next_level = $page_level + 1;
  }

  session_update($page_level, $language_default);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>
<!doctype html>
<html lang="en">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script>

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>
      
      <?php include_once('menu.php'); ?>
      
      <?php include_once("header_right.php"); ?>

    </header>
  </div>

  <div class="b-divider"></div>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">#6. Simulation</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Time settings</h2>
          <p>
                            Let's introduce the reset-ticks command in the setup of the model.
                            <br />
                            Code:
                            <br />
                            <code>
                                to setup
                                <br />
                                &nbsp;&nbsp;ca ;; clear all
                                <br />
                                &nbsp;&nbsp;setup-people ;; initialize agents "people"
                                <br />
                                &nbsp;&nbsp;setup-world ;; initialize the environment
                                <br />
                                &nbsp;&nbsp;<b>reset-ticks</b>
                                <br />
                                end
                            </code>
                            <br />
                            Insert the tick command to advance of one step during the simulation run (in the GO button).
                            <br />
                            Code:
                            <br />
                            <code>
                                to go
                                <br />
                                &nbsp;&nbsp;if ticks = 1000 ;; stop condition or count links = count people [ stop ]
                                <br />
                                &nbsp;&nbsp;<b>tick</b>
                                <br />
                                &nbsp;&nbsp;move-agents
                                <br />
                                &nbsp;&nbsp;check-behaviour
                                <br />
                                end
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Variability</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                            Let's introduce some variability in the model to perform scenario analysis.
                            <br /><br />
                            Initialize a local variable with the number of the #walls slider
                            <br /><br />
                            <img src="./images-tutorial/random-walls.png" alt="Random walls" class="center">
                            <br /><br />
                            If the slider random-#walls? is set On (means True), then set n-walls with a random value (random between 0 and #walls)
                            <br /><br />
                            Creates a number of walls equal to n-walls
                            <br />
                            Code:
                            <br />
                            <code>
                                to setup-world ;; setup world
                                <br />
                                &nbsp;&nbsp;let n-walls #Walls ;; create up to #Walls
                                <br />
                                &nbsp;&nbsp;if random-#walls?
                                <br />
                                &nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;set n-walls random #walls
                                <br />
                                &nbsp;&nbsp;]
                                <br />
                                &nbsp;&nbsp;ask n-of n-walls patches
                                <br />
                                &nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;create-a-wall
                                <br />
                                &nbsp;&nbsp;]
                                <br />
                                end
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Monitoring the performance (Key Performance Indicators - KPIs)</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <img src="./images-tutorial/monitor_people.png" alt="Monitor people" class="center" />
        <br /> <br />
        <p>In Interface, we can add some Monitors and calculate:
                            <br />
                            - the number of walls: Walls (#walls)
                            <br />
                            - the number of agents (count people)
                            <br />
                            - the number of links between agents (count links)
                        </p>
        <img src="./images-tutorial/monitors.png" alt="Monitor" class="center" />
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container text-center">
      <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>