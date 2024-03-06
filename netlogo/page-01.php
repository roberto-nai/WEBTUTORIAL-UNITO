<?php
  
  include "settings.php";

  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a page-xx
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session (the int version of $page_order)
    $next_level = $page_level + 1;
  }

  session_update($page_level, $language_default);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
  
?>
<!doctype html>
<html lang="en">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script> <!-- specific events for page -->
  
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
    <h2 class="text-primary">#1. Agent-Based modeling and NetLogo</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>This tutorial introduces Agent-Based Modeling (ABM) with a practical simulation example in the NetLogo programming environment.</p>
          <p>We propose an exercise called "Agents in motion". The model simulates interactions between individuals based on five parts (the following five tutorial web pages).</p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Agents in motion</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>The goal of "Agents in motion" is to investigate the spread of contacts between people who are moving through a space.</p>
          <p>The main 'research question' is: how long does it take people wandering to meet each other?</p>
          <p>The answer may vary depending on several factors, such as the number of people involved, the number of stops, and the number of obstacles they encounter in the environment. </p>
          <p>Different scenarios can be created to simulate how contacts between people can affect the spread of a piece of news (word of mouth), a virus, and so on.</p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Learning objectives</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>The learning objectives of this tutorial are:</p>
          <ul>
            <li>Programming with NetLogo (computational thinking)</li>
            <li>Introduce Agent-Based Modeling (agents)</li>
            <li>Interaction with the environment (patches)</li>
            <li>Creating relationships between agents (links)</li>
            <li>Analyze the simulation results (indicators)</li>
          </ul>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>The tool NetLogo</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>NetLogo is a free and open source software available at: <a href="https://ccl.northwestern.edu/netlogo" target="_blank">https://ccl.northwestern.edu/netlogo</a>.</p>
          <img alt="NetLogo" src="./images-tutorial/interface.png">
          <p>Three main NetLogo tabs are: Interface, Info and Code</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>Interface = Display the simulation results </p>
          <p>Info = A description of the program</p>
          <p>Code = Instructions and project code</p>
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