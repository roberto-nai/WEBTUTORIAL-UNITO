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
    <h2 class="text-primary">#2. Model Ingredients</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <ul>
            <li>Agents are active entities (people) moving in the environment, which includes some static objects/entities (obstacles such as walls, puddles)</li>
            <li>Variables and procedures define the behavior of the model (agent/environment interactions)</li>
            <li>Relationships: connections (links) between entities in the model</li>
            <li>Indicators to measure the performance/results of the simulation</li>
          </ul>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Patches</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Agents move on a grid of cells (called "patches" in NetLogo's language). At each time unit of the simulation, each agent is on a specific cell ("patch").</p>
          <img src="./images-tutorial/patches.png" alt="Patches" />
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Buttons</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Different types of buttons can be added in the interface (right-click on the white area, or press the +ADD button in the menu). For example, you can add procedures, monitors, sliders.</p>
          <img src="./images-tutorial/netlogo-widget-buttons.gif" alt="Buttons" />
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Sintax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <div class="col-12 p-3 mb-2 bg-secondary text-white">
        <code>breed</code> (types of objects or agents)
        <br />
        <code>people</code>are active entities (agents) of people / person
        <br />
        <code>walls</code> are static entities of walls / wall
        <br />
        <code>puddles</code> are a kind of cells (patches) of the floor with a variable name (we will call "puddle" some of them)
        <br />
        </div>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-05'>
    <h2></h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>In the code part, we add two different breeds and we create the variable name for the puddles with the following instructions:</p>
        <p><code>breed [ people person ]</code></p>
        <p><code>breed [ walls wall ]</code></p>
        <p><code>patches-own [ <br/> &nbsp;&nbsp;&nbsp; name <br/>]</code></p>
        <br />
        <p><img src="./images-tutorial/code02.png" alt="Code part" /></p>
        <p>Save the current file before to proceed with the tutorial (e.g., 'Agents_Tutorial.nlogo').</p>
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