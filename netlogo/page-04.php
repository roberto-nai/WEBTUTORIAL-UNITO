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
    <h2 class="text-primary">#4. World Setup</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Create some walls</h2>
          <p>
                            Let's create some blocks or 'walls' in the environment
                        </p>
                        <img src="./images-tutorial/n-walls.png" alt="NetLogo&#39;s Interface" class="center">
                        <br /> <br />
                        <p>Code to initialize the world in the setup procedure:
                        <br />
                            <code>to setup
                            <br />
                                &nbsp;&nbsp;ca
                                <br />
                                &nbsp;&nbsp;setup-people
                                <br />
                                &nbsp;&nbsp;setup-world
                                <br />
                                end
                            </code>
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Create some walls</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                            The corresponding procedure:
                            <br />
                            <code>
                                to setup-world
                                <br />
                                &nbsp;&nbsp;ask n-of n-walls patches
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;[ create-a-wall ]
                                <br />
                                end
                            </code>
                            <br /><br />
                            The corresponding procedure "create-a-wall":
                            <br />
                            <code>
                                to create-a-wall
                                <br />
                                &nbsp;&nbsp;sprout-walls 1
                                <br />
                                &nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;set color orange
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;set shape "square"
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;set heading 90
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
    <h2>Syntax</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          <code>n-of x</code>: a number equal of x<br />
          <code>sprout-&lt; </code>: create an agent on a patch<br />
          <code>heading</code>: the direction of the agent<br />
        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Create some puddles</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                            <code>
                                ask patches
                                <br />
                                [
                                <br />
                                &nbsp;&nbsp;set name ""
                                <br />
                                &nbsp;&nbsp;if random 100 = 1
                                <br />
                                &nbsp;&nbsp;[create-a-puddle]
                                <br />
                                ]
                                <br />
                                to create-a-puddle
                                <br />
                                &nbsp;&nbsp;ask one-of patches
                                <br />
                                &nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;ifelse not any? walls-here
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;[
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set pcolor sky
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set name "puddle"
                                <br />
                                &nbsp;&nbsp;&nbsp;&nbsp;][create-a-puddle]
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

  <div class="container text-center">
      <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>